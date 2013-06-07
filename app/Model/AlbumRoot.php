<?php
App::uses('AppModel', 'Model');
/**
 * AlbumRoot Model
 *
 */
class AlbumRoot extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'AlbumRoots';
  public $recursive= 0;
/**
 * Validation rules
 *
 * @var array
 */
  public $validate = array(
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
    'type' => array(
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
  
  
    public $hasMany = array(
    'Album' => array(
      'className' => 'Album',
      'foreignKey' => 'albumRoot',
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
    	$path = Configure::read('Digikam.root').$data['AlbumRoot']['specificPath'];
//     	debug('albumRoot::getPath = '.$path);
    	return $path;
    }
    
//     public function afterFind($results, $primary = false)
//   {

//     foreach($results as &$row)
//     {
      
//       if( isset($row['AlbumRoot']) )
//       {
//         $row['AlbumRoot']['fullPath'] =  Configure::read('Digikam.root').$row['AlbumRoot']['specificPath'];
//       }

//       //unset($albumR);


//     }

//    return $results;
//   }
}
