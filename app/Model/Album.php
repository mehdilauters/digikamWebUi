<?php
App::uses('AppModel', 'Model');
/**
 * Album Model
 *
 */
class Album extends AppModel {
  // public $actsAs = array('Containable' => array('AlbumRoot' ));
/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'Albums';
  public $actsAs = array('Containable');

/**
 * Validation rules
 *
 * @var array
 */
  public $validate = array(
    'albumRoot' => array(
      'numeric' => array(
        'rule' => array('numeric'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'relativePath' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
  );
  
    public $belongsTo = array(
    'AlbumRoot' => array(
      'className' => 'AlbumRoot',
      'foreignKey' => 'albumRoot',
      'conditions' => '',
      'fields' => '',
      'order' => ''
    )
  );
  
     public $hasMany = array(
    'Image' => array(
      'className' => 'Image',
      'foreignKey' => 'album',
      'dependent' => false,
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'limit' => '',
      'offset' => '',
      'exclusive' => '',
      'finderQuery' => '',
      'counterQuery' => ''
    )
  );
  

     
     public function getPath($data = NULL)
     {
     	if($data == NULL)
     	{
     		$data = $this->data;
     	}

     	if( isset($data['Album']['AlbumRoot']))
     	{
     		$albumRoot = $data['Album']; 
     	}
     	else
     	{
     		$albumRoot =  $this->AlbumRoot->findById($data['Album']['albumRoot']);
     	}

     	$path = $this->AlbumRoot->getPath($albumRoot).$data['Album']['relativePath'];
//      	debug('album::getPath = '.$path);
     	return $path;
     }
     
     
     
//   public function afterFind($results, $primary = false)
//   {

//     foreach($results as &$row)
//     {
//       $albumRootId = NULL;
//       if(! isset($row['AlbumRoot']) )
//       {
//         if( isset($row['Album']['AlbumRoot'])  )
//         {
//             $albumRootId = $row['Album']['albumRoot'];
//         }
//         else
//         {
//           if( isset( $row['Album'] ) )
//           {
//             $albumRootId = $row['Album']['albumRoot'];
//           }
//         }
//         if( $albumRootId != NULL )
//         {
//            $row = array_merge($row,  $this->AlbumRoot->findById($albumRootId ));
//         }
//       }
      

//       if( isset($row['AlbumRoot']) )
//       {
//         $albumRoot = $row['AlbumRoot'];
//         $row['Album']['fullPath'] =  $row['AlbumRoot']['fullPath'].'/'.$row['Album']['relativePath'];
//       }


//     }
//    return $results;
//   }

}
