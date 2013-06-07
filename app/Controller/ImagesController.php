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
  public function view($id = null) {
    if (!$this->Image->exists($id)) {
      throw new NotFoundException(__('Invalid image'));
    }
    $options = array('conditions' => array('Image.' . $this->Image->primaryKey => $id),
    		'contain'   => array('Album', 'ImagePosition','ImageTag.Tag', 'ImageTag.Tag.ImageTagProperty', 'ImageInformation')
    		);
    $image = $this->Image->find('first', $options);
    $this->set('image', $image);
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
//   			throw new InternalErrorException(__('tag not saved'));
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
  
/**
 * add method
 *
 * @return void
 */
  public function add() {
    if ($this->request->is('post')) {
      $this->Image->create();
      if ($this->Image->save($this->request->data)) {
        $this->Session->setFlash(__('The image has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The image could not be saved. Please, try again.'));
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
      if ($this->Image->save($this->request->data)) {
        $this->Session->setFlash(__('The image has been saved'));
        $this->redirect(array('action' => 'index'));
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

  public function download($id, $preview = false)
  {
  	$photo = $this->Image->findById($id);
  	$this->Image->getPath($photo);
  	
  	$this->viewClass = 'Media';
  	$file_parts = pathinfo($photo['Image']['fullPath']);
  	 
  	$params = array(
  			'id'        => basename($file_parts['basename']),
  			'name'      => basename($file_parts['basename']),
  			'extension' => $file_parts['extension'],
  			'mimeType'  => array(
  			'image/jpeg'),
//   			'download' => true,
  			'path'      => $file_parts['dirname'].DS,
  			'cache' => true
  	);
  	
  	
  	if($preview == 'preview')
  	{
  		
  		$destDir = CACHE.'/';
  		$destFilePath = $destDir.$photo['Image']['uniqueHash'];
  		
  		$params['path'] = $destDir;
  		$params['id'] = $photo['Image']['uniqueHash'];
  		
  		if( ! file_exists($destFilePath) )
  		{
	  	  	$res = $this->Image->redimentionnerImage($photo['Image']['fullPath'], $destFilePath, Configure::read('Image.preview.maxWidth'), Configure::read('Image.preview.maxHeight') );
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
  		$this->viewClass = 'Media';
  		$params['cache'] = '+1 day';
  		$params['modified'] = '@' . $modified; // Must be a string to work. See MediaView->render()
  		$this->set($params);
  	}
  	return;
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
    if ($this->Image->delete()) {
      $this->Session->setFlash(__('Image deleted'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Session->setFlash(__('Image was not deleted'));
    $this->redirect(array('action' => 'index'));
  }
}
