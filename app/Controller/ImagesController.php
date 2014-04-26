<?php
App::uses('AppController', 'Controller');
/**
 * Images Controller
 *
 * @property Image $Image
 */
class ImagesController extends AppController {
public $uses = array('Image','UniqueHash','ImageInformation', 'ImageTag', 'Tag');
/**
 * index method
 *
 * @return void
 */
  public function index() {
    $this->Image->recursive = 0;
    $data = $this->paginate();
    $this->set('images', $data);
  }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  // TODO
  public function view($id = null, $ajaxPreview = false) {
    if( $ajaxPreview )
    {
      $this->layout = 'ajax'; 
    }
    
    if (!$this->Image->exists($id)) {
      throw new NotFoundException(__('Invalid image'));
    }
    $options = array('conditions' => array('Image.' . $this->Image->primaryKey => $id),
        'contain'   => array('Album', 'ImagePosition','ImageTag.Tag', 'ImageTag.Tag.ImageTagProperty', 'ImageInformation')
        );
    $image = $this->Image->find('first', $options);
    
    if(! $this->isAvailable($image))
    {
      throw new ForbiddenException('Forbidden');
    }
    
    $this->set('image', $image);
    
     if( $ajaxPreview )
    {
     $this->render('ajaxPreview'); 
    }
  }

  public function untag($id)
  {
    $this->layout = 'ajax';
    if (!$this->Image->exists($id)) {
      throw new NotFoundException(__('Invalid image'));
    }
    if ($this->request->is('post') || $this->request->is('put'))
    {
      $tag = $this->ImageTag->find('first', array('conditions'=>array('imageid'=>$id, 'tagid' => $this->request->data['tagId'])));
      if(! $this->ImageTag->delete($tag['ImageTag']))
      {
//         throw new InternalErrorException(__('tag not saved'));
        echo 'NOT deleted';
      }
      else
      {
        echo 'deleted';
      }
    }
    $this->render('tag');
  }
  
  
  public function tag($id)
  {
    $this->layout = 'ajax';
    if (!$this->Image->exists($id)) {
      throw new NotFoundException(__('Invalid image'));
    }
    if ($this->request->is('post') || $this->request->is('put'))
    {
      $tag = array('ImageTag' => array(
          'imageid' => $id,
          'tagid' => $this->request->data['tagId'],
          ) );
      if(! $this->ImageTag->save($tag))
      {
        throw new InternalErrorException(__('tag not saved'));
      }
    }
    $this->Tag->contain();
    $tag = $this->Tag->findById($this->request->data['tagId']);
    $tag['imageid'] = $id;
    $this->set('tag',$tag);
    
  }
  
  public function rate($id = null) {
    $this->layout = 'ajax';
    if (!$this->Image->exists($id)) {
      throw new NotFoundException(__('Invalid image'));
    }
    if ($this->request->is('post') || $this->request->is('put')) {
      $imageInfo = $this->ImageInformation->findByImageid($id);
      $imageInfo['ImageInformation']['rating'] = $this->request->data['rating'];
      $this->ImageInformation->save($imageInfo);
      
    }
    
  }
  
  
    function saveFile($filePath = null)
  {
    if(empty($this->request->data['Image']['upload']['name']) && $filePath == null)
    {
      return false;
    }
    
    if( ! empty($this->request->data['Image']['upload']['name']) )
    {
      $filePath = $this->request->data['Image']['upload']['tmp_name'];
      $filename = $this->request->data['Image']['upload']['name'];
    }
    else
    {
        $filename = basename($filePath);
    }
    
    
    $path_parts = pathinfo($filename);
    $filename = $this->request->data['Image']['upload']['name'];
    // debug($this->request->data['Image']);
	$album = $this->Image->Album->findById($this->request->data['Image']['album']);
	$albumPath = $this->Image->Album->getPath($album);
	if($albumPath != '/')
	{
		$albumPath .= '/';
	}
    if(!empty($this->request->data['Image']['upload']['name']) )
     {
       // debug($filePath);
       if(move_uploaded_file($filePath,$albumPath.$filename) != true)
       {
         $this->log('move_uploaded_file failed', 'debug');
         return false;
       }
	   $this->request->data['Image']['fullPath'] = $albumPath.$filename;
     }
	 else
	 {
		$this->log('name empty', 'debug');
		return false;
	 }
    
    return $filename;
  }
  
  
/**
 * add method
 *
 * @return void
 */
   public function add() {
   // $test =exif_read_data('/home/pi/Mehdi/Photos/DSCN0693.JPG',0,true);
   // debug($test['GPS']);
	// print_r($test);  // match to standards);
    if ($this->request->is('post')) {
      $ok = true;
      if($this->upload())
      {
        $imgName = $this->saveFile();

        if($imgName == false)
        {
          $ok = false;
          $this->Image->deleteFile();
          $this->log('Could not save photo','debug');
          $this->Image->invalidateField('upload','Erreur lors de l\'enregistrement du fichier');
        }
		else
		{
	
        $this->request->data['Image']['path'] = $imgName;

		$this->Image->create();
		$data = $this->request->data;
		$data['Image']['name'] = $imgName;
		$data['Image']['status'] = Configure::read('Digikam.Enum.Image.status');
		$data['Image']['category'] = Configure::read('Digikam.Enum.Image.Category.image');
		$data['Image']['modificationDate'] = date('c');
		$data['Image']['fileSize'] = filesize($this->request->data['Image']['fullPath']);
		
		
		$data['Image']['uniqueHash'] = $this->Image->uniqueHashV2($data);
		// debug($data);
		
		if ( $this->Image->save($data)) {
		  $this->Session->setFlash(__('The photo has been saved'),'flash/ok');
		  
		  $imgInfo = getimagesize($data['Image']['fullPath']);
		  // debug($imgInfo);

		  $exifData = @exif_read_data($data['Image']['fullPath'], 0, true);  // match to standards
		  // debug($exifData);
		  // print_r($exifData);
		  $data['ImageInformation']['imageid'] = $this->Image->getInsertID();
		  $data['ImageMetadata']['imageid'] = $this->Image->getInsertID();
		  $data['ImagePosition']['imageid'] = $this->Image->getInsertID();
		  if($exifData != false)
		  {
			  
			 $type = strtoupper ( explode('/',$exifData['FILE']['MimeType'])[1] ) ;
			  
			  $data['ImageInformation']['rating'] = -1;
			  $data['ImageInformation']['creationDate'] = $exifData['EXIF']['DateTimeOriginal'];
			  $data['ImageInformation']['digitizationDate'] = $exifData['EXIF']['DateTimeDigitized'];
			  $data['ImageInformation']['orientation'] = $exifData['IFD0']['Orientation'];
			  $data['ImageInformation']['width'] = $imgInfo[0];
			  $data['ImageInformation']['height'] = $imgInfo[0];
			  $data['ImageInformation']['format'] = $type;
			  $data['ImageInformation']['colorDepth'] = $imgInfo['bits'];
			  $data['ImageInformation']['colorModel'] = 0;
			  
			  
			  
			  
			  $data['ImageMetadata']['make'] = $exifData['IFD0']['Make'];
			  $data['ImageMetadata']['model'] = $exifData['IFD0']['Model'];
			  $data['ImageMetadata']['aperture'] = 0;
			  if( isset($exifData['EXIF']['FocalLengthIn35mmFilm']) )
			  {
				$data['ImageMetadata']['focalLengthIn35'] = $exifData['EXIF']['FocalLengthIn35mmFilm'];
			  }
			  
			  if(isset($exifData['EXIF']['ApertureValue']))
			  {
				$data['ImageMetadata']['aperture'] = eval('return ('.$exifData['EXIF']['ApertureValue'].');');
			  }
			  
			  if(isset($exifData['EXIF']['FocalLength']))
			  {
				$data['ImageMetadata']['focalLength'] = eval('return ('.$exifData['EXIF']['FocalLength'].');');
			  }
			  
			  if(isset($exifData['EXIF']['ExposureTime']))
			  {
				$data['ImageMetadata']['exposureTime'] = eval('return ('.$exifData['EXIF']['ExposureTime'].');');
			  }
			  
			  if( isset( $exifData['EXIF']['ExposureProgram'] )) 
			  {
				$data['ImageMetadata']['exposureProgram'] = $exifData['EXIF']['ExposureProgram']; 
			  }
			  
			  $data['ImageMetadata']['exposureMode'] = $exifData['EXIF']['ExposureMode']; 
			  $data['ImageMetadata']['sensitivity'] = 0;
			  $data['ImageMetadata']['flash'] = $exifData['EXIF']['Flash'];
			  $data['ImageMetadata']['whiteBalance'] = $exifData['EXIF']['WhiteBalance'];
			  $data['ImageMetadata']['whiteBalanceColorTemperature'] = 0;
			  $data['ImageMetadata']['meteringMode'] = $exifData['EXIF']['MeteringMode'];
			  $data['ImageMetadata']['subjectDistance'] = NULL;
			  if( isset($exifData['EXIF']['SubjectDistance']) && $exifData['EXIF']['SubjectDistance'] != false )
			  {
				$exifData['EXIF']['SubjectDistance'] = eval('return ('.$exifData['EXIF']['SubjectDistance'].');');
			  }
			  $data['ImageMetadata']['subjectDistanceCategory'] = 0;
			  
			  
			 if(isset($exifData['GPS']))
			 {
				$latHour = eval('return ('.$exifData['GPS']['GPSLatitude'][0].');');
				$latMin = eval('return ('.$exifData['GPS']['GPSLatitude'][1].');');
				$latSec = eval('return ('.$exifData['GPS']['GPSLatitude'][2].');');
				$data['ImagePosition']['latitude'] = $latHour.','.$latMin.$exifData['GPS']['GPSLatitudeRef'];
				
				$lngHour = eval('return ('.$exifData['GPS']['GPSLongitude'][0].');');
				$lngMin = eval('return ('.$exifData['GPS']['GPSLongitude'][1].');');
				$lngSec = eval('return ('.$exifData['GPS']['GPSLongitude'][2].');');
				$data['ImagePosition']['longitude'] = $lngHour.','.$lngMin.$exifData['GPS']['GPSLongitudeRef'];;
				
				// Haversine formula : Decimal Degrees = Degrees + minutes/60 + seconds/3600
				$data['ImagePosition']['latitudeNumber'] = $latHour + $latMin/60 + $latSec/3600;
				$data['ImagePosition']['longitudeNumber'] = $lngHour + $lngMin/60 + $lngSec/3600;
			 }
			  
		 }
		 
		// debug($data);
		
		if( $this->request->data['ImageTag']['tag_id'] != '' )
		{
			$tag = array('ImageTag' => array(
				  'imageid' => $this->Image->getInsertID(),
				  'tagid' => $this->request->data['ImageTag']['tag_id'],
				  ) );
			  if(! $this->ImageTag->save($tag))
			  {
				$this->log('Tag could not be saved', 'debug');
			  }
		}
		
		
		$this->Image->ImagePosition->save($data);
		$this->Image->ImageInformation->save($data);
		$this->Image->ImageMetadata->save($data);
		
		  $this->redirect(array('action' => 'view', $this->Image->getInsertID()) );
		} else {
		  $this->Image->deleteFile();
		  $this->Session->setFlash(__('The photo could not be saved. Please, try again.'),'flash/fail');
		}
		}
      }
      else
      {
       $ok = false;
       $this->log('Could not upload photo','debug');
       $this->Image->invalidateField('upload','Erreur lors de l\'upload du fichier');
      }
    }
	
	$albums = $this->Image->Album->find('list');
    $this->set(compact('albums'));
  }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function edit($id = null) {
    if (!$this->Image->exists($id)) {
      throw new NotFoundException(__('Invalid image'));
    }
    if ($this->request->is('post') || $this->request->is('put')) {
		$image = $this->Image->findById($id);
		
		if($image['Image']['name'] != $this->request->data['Image']['name'])
		{
			$this->Image->renameFile($this->request->data['Image']['name'], $image);
		}
	
		$this->request->data['Image']['status'] = Configure::read('Digikam.Enum.Image.status');
		$this->request->data['Image']['category'] = Configure::read('Digikam.Enum.Image.Category.image');
		$this->request->data['Image']['modificationDate'] = date('c');	
	
		if (!$this->Image->ImagePosition->save($this->request->data)) {
        $this->log('ImagePosition could not be saved', 'debug');
      }
	
	if( $this->request->data['ImageTag']['tag_id'] != '' )
	{
		$tag = array('ImageTag' => array(
			  'imageid' => $id,
			  'tagid' => $this->request->data['ImageTag']['tag_id'],
			  ) );
		  if(! $this->ImageTag->save($tag))
		  {
			$this->log('Tag could not be saved', 'debug');
		  }
	}
	
      if ($this->Image->save($this->request->data)) {
        $this->Session->setFlash(__('The image has been saved'));
        //$this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The image could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('Image.' . $this->Image->primaryKey => $id));
      $this->request->data = $this->Image->find('first', $options);
    }
    $albums = $this->Image->Album->find('list');
    $this->set(compact('albums'));
  }

  
  public function areTagsAvailable($image)
  {
    foreach ($image['ImageTag'] as $imageTag)
    {
      if( in_array($imageTag['tagid'], $this->Session->read('Rights.UserAvailablesTags') ))
      {
        return true;
      }
    }
     
    return false;
     
  }
  
  public function isAlbumAvailable($image)
  {
    return in_array($image['Image']['album'], $this->Session->read('Rights.UserAvailablesAlbums'));
  }
  
  public function areTagsForbidden($image)
  {
    foreach ($image['ImageTag'] as $imageTag)
    {
      if( in_array($imageTag['tagid'], $this->Session->read('Rights.UserForbiddenTags') ))
      {
        return true;
      }
    }
    
    return false;
  }
  
  public function isAlbumForbidden($image)
  {
    return in_array($image['Image']['album'], $this->Session->read('Rights.UserForbiddenAlbums'));
  }
  
  public function isAvailable($image)
  {
    return (!$this->areTagsForbidden($image) && !$this->isAlbumForbidden($image))
           && 
        ($this->isAlbumAvailable($image) || $this->areTagsAvailable($image))
        ||
        $this->Auth->user('id') == Configure::read('Digikam.rootUser')
    ; 
    
  }
  
  public function download($id, $preview = false)
  {
    $photo = $this->Image->findById($id, array(
//         'contains' => array('ImageTag.Tag')
        ));
//     debug($photo);
    if(! $this->isAvailable($photo))
    {
      throw new ForbiddenException('Forbidden');
    }
    
    
    $this->Image->getPath($photo);
//     debug($this->Image->uniqueHashV2($photo));
//     return;
    $this->viewClass = 'Media';
    // To display the path of the picture uncomment the following line
    // debug($photo['Image']['fullPath']);
    $file_parts = pathinfo($photo['Image']['fullPath']);
     
    $params = array(
        'id'        => basename($file_parts['basename']),
        'name'      => basename($file_parts['basename']),
        'extension' => $file_parts['extension'],
        'mimeType'  => array(
        'image/jpeg'),
//         'download' => true,
        'path'      => $file_parts['dirname'].DS,
        'cache' => true
    );
    
    
    if($preview != false) //'preview')
    {
      
      $destDir = CACHE;
      $destFile = Configure::read('Image.preview.'.$preview.'.cachePrefix').$photo['Image']['uniqueHash'];;
      $destFilePath = $destDir.$destFile ;

      $params['path'] = $destDir;
      $params['id'] = $destFile;
      
      if( ! file_exists($destFilePath) )
      {
          $res = $this->Image->redimentionnerImage($photo['Image']['fullPath'], $destFilePath, Configure::read('Image.preview.'.$preview.'.maxWidth'), Configure::read('Image.preview.'.$preview.'.maxHeight') );
          if($res != true)
          {
            $params['path'] = APP.'webroot/img/';
            $params['id'] = 'defaultImagePreview.png';
          }
      }
        
        
    }
    
    
    $modified = filemtime($params['path'] . $params['id']);
    $this->response->modified($modified);
    if ($this->response->checkNotModified($this->request))
    {
      $this->autoRender = false;
      $this->response->send();
    }
    else
    {
      $params['cache'] = '+1 day';
      $params['modified'] = '@' . $modified; // Must be a string to work. See MediaView->render()
      $this->set($params);
    }
    return;
  }
  
  
  
   public function upload()
  {
  
    if (isset($this->request->data['Image']))
    {
      if( $this->request->data['Image']['upload']['size'] == 0 )
      {
        $this->Image->invalidateField('upload','Please check the size of your image');
	$this->log("size too big", 'debug');
        return false;
      }
      if( !$this->Image->checkType($this->request->data['Image']['upload']['type']) )
      {
        $this->Image->invalidateField('upload','Veuillez fournir une image .png, .jpg');

	$this->log("image type not valid", 'debug');
        return false;
      }
      if(!is_uploaded_file($this->request->data['Image']['upload']['tmp_name']))
      {
	$this->log("error is_uploaded_file", 'debug');
        $this->Image->invalidateField('upload','Erreur lors de l\'upload');
        return false;
      }
    }
  
    return true;
  }
  
  
  
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function delete($id = null) {
    $this->Image->id = $id;
    if (!$this->Image->exists()) {
      throw new NotFoundException(__('Invalid image'));
    }
    $this->request->onlyAllow('post', 'delete');
	$img = $this->Image->findById($id);
    if ($this->Image->delete($id, true)) {
	  $this->Image->deleteFile($img);
      $this->Session->setFlash(__('Image deleted'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Session->setFlash(__('Image was not deleted'));
    $this->redirect(array('action' => 'index'));
  }
  
  function beforeFilter() {
    parent::beforeFilter();
	$this->Auth->allow('download', 'view');
    if($this->Auth->loggedIn())
    {
    	$this->Auth->allow('rate', 'tag', 'untag');
    }
  }
}
