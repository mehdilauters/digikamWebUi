<?php
App::uses('AppModel', 'Model');
/**
 * Image Model
 *
 */
class Image extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'Images';
  public $actsAs = array('Containable');
  public $displayField = 'name';
  
  
/**
 * Validation rules
 *
 * @var array
 */
  public $validate = array(
    'name' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'status' => array(
      'numeric' => array(
        'rule' => array('numeric'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'category' => array(
      'numeric' => array(
        'rule' => array('numeric'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
  );
  
  /**
 * hasOne associations
 *
 * @var array
 */
  public $hasOne = array(
    /*   'ImageHaarMatrix' => array(
      'className' => 'ImageHaarMatrix',
      'foreignKey' => 'imageid',
      'conditions' => '',
      'fields' => '',
	  'dependent' => true,
      'order' => ''
	  
  ),*/
      'ImageMetadata' => array(
      'className' => 'ImageMetadata',
      'foreignKey' => 'imageid',
      'conditions' => '',
      'fields' => '',
	  'dependent' => true,
      'order' => ''
  ),
      'ImageInformation' => array(
          'className' => 'ImageInformation',
          'foreignKey' => 'imageid',
          'conditions' => '',
          'fields' => '',
		  'dependent' => true,
          'order' => ''
      ),
    'ImagePosition' => array(
      'className' => 'ImagePosition',
      'foreignKey' => 'imageid',
      'conditions' => '',
      'fields' => '',
	  'dependent' => true,
      'order' => ''
    )
  );

/**
 * belongsTo associations
 *
 * @var array
 */
  public $belongsTo = array(
    'Album' => array(
      'className' => 'Album',
      'foreignKey' => 'album',
      'conditions' => '',
      'fields' => '',
      'order' => ''
    ),
    /*  'UniqueHash' => array(
      'className' => 'UniqueHash',
      'foreignKey' => 'uniqueHash',
       'conditions'   => '',
      'fields' => '',
      'order' => ''
    ),*/
  );

  
  
/**
 * hasMany associations
 *
 * @var array
 */
  public $hasMany = array(
    'ImageComment' => array(
      'className' => 'ImageComment',
      'foreignKey' => 'imageid',
      'dependent' => true,
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'limit' => '',
      'offset' => '',
      'exclusive' => '',
      'finderQuery' => '',
      'counterQuery' => ''
    ),
    'ImageCopyright' => array(
      'className' => 'ImageCopyright',
      'foreignKey' => 'imageid',
      'dependent' => true,
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'limit' => '',
      'offset' => '',
      'exclusive' => '',
      'finderQuery' => '',
      'counterQuery' => ''
    ),
    'ImageTag' => array(
      'className' => 'ImageTag',
      'foreignKey' => 'imageid',
      'dependent' => true,
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'limit' => '',
      'offset' => '',
      'exclusive' => '',
      'finderQuery' => '',
      'counterQuery' => ''
    ),
    'ImageProperty' => array(
      'className' => 'ImageProperty',
      'foreignKey' => 'imageid',
      'dependent' => true,
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'limit' => '',
      'offset' => '',
      'exclusive' => '',
      'finderQuery' => '',
      'counterQuery' => ''
    ),
  );
  
//   public $hasAndBelongsToMany = array(
//   		'Tag' => array(
//   				'className' => 'Tag',
//   				'joinTable' => 'ImageTags',
//   				'foreignKey' => 'imageid',
//   				'associationForeignKey' => 'id',
//   				'unique' => 'keepExisting'
//   		)
//   );
  

  public function beforeFind($queryData)
  {
    $res = parent::beforeFind($queryData);
    /*
    if(AuthComponent::user('id') == 1)
    {
      return $queryData;
    }
    */
    App::import('Model', 'CakeSession');
    $session = new CakeSession();
    $userAvailableTags = $session->read('Rights.UserAvailablesTags');
    $userForbiddenTags = $session->read('Rights.UserForbiddenTags');
    
    $userAvailableAlbums = $session->read('Rights.UserAvailablesAlbums');
    $userForbiddenAlbums = $session->read('Rights.UserForbiddenAlbums');
    
    if(count($userForbiddenAlbums ) != 0)
    {
//       $queryData['conditions']['Image.album'] = 'not in ('.implode(',', $userForbiddenAlbums).')';
    }
    
    
    /*    App::import('Model', 'ImageTag');
    $imageTag = new ImageTag();
    $subSqlQuery = $imageTag->find('sql', array('fields'=>'imageid','conditions'=>'tagid not in ('.implode(',', $userForbiddenTags).')'));
    */
    
 if(count($userForbiddenTags) != 0)
    {
//       $subSqlQuery = 'SELECT imageid from ImageTags where tagid not in ('.implode(',', $userForbiddenTags).')';
    
   
//       $queryData['conditions']['Image.id'] = 'not in ('.$subSqlQuery.')';
    }
//     debug($queryData);
    return $queryData;
  }
  
  public function getPath(&$data = NULL)
  {
    if($data == NULL)
    {
      $data = $this->data;
    }
    if(isset($data['Image']))
    {
      $path = $this->Album->getPath($data).'/'.$data['Image']['name'];
      $data['Image']['fullPath'] = $path;
//       debug('image::getPath = '.$path);
    }
    else 
    {
      foreach($data as &$image)
      {
        $path = $this->Album->getPath($image).'/'.$image['Image']['name'];
        $image['Image']['fullPath'] = $path;
//         debug('image::getPath = '.$path);
      }
    }
    
    return $data;
  }
  
  
  
  /* http://mail.kde.org/pipermail/digikam-users/2013-June/017743.html 
  DImgLoader::uniqueHashV2() in libs/dimg/loaders/dimgloader.cpp
  
  
  
  QByteArray DImgLoader::uniqueHashV2(const QString& filePath, const DImg* const img)
{
    QFile file(filePath);

    if (!file.open(QIODevice::Unbuffered | QIODevice::ReadOnly))
    {
        return QByteArray();
    }

    QCryptographicHash md5(QCryptographicHash::Md5);

    // Specified size: 100 kB; but limit to file size
    const qint64 specifiedSize = 100 * 1024; // 100 kB
    qint64 size                = qMin(file.size(), specifiedSize);

    if (size)
    {
        QScopedArrayPointer<char> databuf(new char[size]);
        int read;

        // Read first 100 kB
        if ((read = file.read(databuf.data(), size)) > 0)
        {
            md5.addData(databuf.data(), read);
        }

        // Read last 100 kB
        file.seek(file.size() - size);

        if ((read = file.read(databuf.data(), size)) > 0)
        {
            md5.addData(databuf.data(), read);
        }
    }

    QByteArray hash = md5.result().toHex();

    if (img && !hash.isNull())
    {
        const_cast<DImg*>(img)->setAttribute("uniqueHashV2", hash);
    }

    return hash;
}
  
  
  
  
  
  
  
  
  
  
  
  
  */
  public function uniqueHashV2($image)
  {
	
	$file = fopen($image['Image']['fullPath'], 'rb');
	$specifiedSize = 100 * 1024; // 100 kB
	
	$filesize = filesize($image['Image']['fullPath']);
    $size = $filesize;
	if($specifiedSize < $size)
	{
		$size = $specifiedSize;
	}
	
	$md5Content = '';
	
	// Read first 100 kB
	$md5Content .= fread($file, $size);
	
	
	
	// Read last 100 kB
    fseek($file, $filesize - $size);
	$md5Content .= fread($file, $size);
	
	$md5 = Security::hash($md5Content, 'md5');
	// debug($md5);
	fclose($file);
	
	return $md5;
  }
  
  public function crop($source, $destination, $x, $y, $width, $height)
  {
    if(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'gif') {
      $img = imagecreatefromgif($source) ;
    } // Gif
    elseif(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'jpg' || strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'jpeg') { // Jpg
      $img = imagecreatefromjpeg($source) ;
    }
    elseif(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'png') {
      $img = imagecreatefrompng($source) ;
    } // Png
    else { return false;
    } // Autres extensions non pris en charge
    $newImage = imagecreatetruecolor($width, $height) ;
    imagecopy($newImage, $img, 0, 0, $x, $y, $width, $height);


  // Enregistrement de la nouvelle image
      if(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'gif') {
        return imagegif($newImage,$destination) ;
      } // Gif
      elseif(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'jpg' || strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'jpeg') { // Jpg
        return imagejpeg($newImage,$destination) ;
      }
      elseif(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'png') {
        return imagepng($newImage,$destination) ;
      } // Png
  
    return false; // L'operation ne s'est pas bien deroulee

  }
  
  
  public function rotate($source, $angle)
  {
    if(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'gif') {
      $img = imagecreatefromgif($source) ;
    } // Gif
    elseif(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'jpg' || strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'jpeg') { // Jpg
      $img = imagecreatefromjpeg($source) ;
    }
    elseif(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'png') {
      $img = imagecreatefrompng($source) ;
    } // Png
    else { return false;
    } // Autres extensions non pris en charge
    
    $newImage = imagerotate ($img, $angle);


  // Enregistrement de la nouvelle image
      if(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'gif') {
        return imagegif($newImage,$source) ;
      } // Gif
      elseif(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'jpg' || strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'jpeg') { // Jpg
        return imagejpeg($newImage,$source) ;
      }
      elseif(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'png') {
        return imagepng($newImage,$source) ;
      } // Png
  
    return false; // L'operation ne s'est pas bien deroulee

  }
  
  
  public function redimentionnerImage($source, $destination, $maxWidth, $maxHeight, $minWidth=0, $minHeight=0) {
    // Recuperer l'image original
    $dims = getimagesize($source) ;
    if(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'gif') {
      $chemin = imagecreatefromgif($source) ;
    } // Gif
    elseif(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'jpg' || strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'jpeg') { // Jpg
      $chemin = imagecreatefromjpeg($source) ;
    }
    elseif(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'png') {
      $chemin = imagecreatefrompng($source) ;
    } // Png
    else { return false;
    } // Autres extensions non pris en charge
  
    // Calcul des dimensions de la nouvelle image
    if($dims[0] > $maxWidth || $dims[0] < $minWidth ||
        $dims[1] > $maxHeight || $dims[1] < $minHeight) { // Si les dimenssions doivent etre changes
      // Trouver les nouvelles dimensions
      if(($maxWidth*$maxHeight)/($dims[0]*$dims[1]) > ($minWidth*$minHeight)/($dims[0]*$dims[1])) { // L'image est trop grande
        if($dims[0]/$maxWidth > $dims[1]/$maxHeight) { // La largeur en priorite
          $largeur = $maxWidth;
          $hauteur = $dims[1]*$maxWidth/$dims[0];
        } else { // La hauteur en priorite
          $largeur = $dims[0]*$maxHeight/$dims[1];
          $hauteur = $maxHeight;
        }
      } else { // L'image est trop petite
        if($dims[0]/$minWidth < $dims[1]/$minHeight) { // La largeur en priorite
          $largeur = $minWidth;
          $hauteur = $dims[1]*$minWidth/$dims[0];
        } else { // La hauteur en priorite
          $largeur = $dims[0]*$minHeight/$dims[1];
          $hauteur = $minHeight;
        }
      }
  
      // Creer la nouvelle image a partir de l'originale avec de nouvelles dimensions
      $nouvelle = imagecreatetruecolor($largeur, $hauteur) ;
      imagecopyresampled($nouvelle,$chemin,0,0,0,0,$largeur,$hauteur,$dims[0],$dims[1]) ;
  
      // Enregistrement de la nouvelle image
      if(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'gif') {
        return imagegif($nouvelle,$destination) ;
      } // Gif
      elseif(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'jpg' || strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'jpeg') { // Jpg
        return imagejpeg($nouvelle,$destination) ;
      }
      elseif(strtolower(pathinfo($source, PATHINFO_EXTENSION)) == 'png') {
        return imagepng($nouvelle,$destination) ;
      } // Png
    }
    elseif($source != $destination) { // Si le fichier doit etre uniquement deplace
      // Deplacer le fichier
      return copy($source,$destination);
    }
  
    return true; // L'operation s'est bien deroulee
  }

  
  function checkType($type)
  {
    switch($type)
    {
      case 'image/jpeg':
        break;
      case 'image/png':
        break;
      default:
        return false;
        break;
    }
    return true;
  }
  
  
  function deleteFile($img = NULL)
  {
	$data = $this->data;
	if($img != NULL)
	{
		$data = $img;
	}
	
	$this->getPath($data);
	
    $filename = $data['Image']['fullPath'];
    if(file_exists ( $filename ))
      unlink($filename);
  }
  
  function renameFile($newName,$img = NULL)
  {
	$data = $this->data;
	if($img != NULL)
	{
		$data = $img;
	}
	
	$this->getPath($data);
	
    $filename = $data['Image']['fullPath'];
	$path = dirname($data['Image']['fullPath']);
    if(file_exists ( $filename ))
      return rename($filename, $path.'/'.$newName);
  }  
  
}
