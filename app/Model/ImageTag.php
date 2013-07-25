<?php
App::uses('AppModel', 'Model');
/**
 * ImageTag Model
 *
 */
class ImageTag extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'ImageTags';
  public $actsAs = array('Containable');
  
  public $virtualFields = array(
      'id' => '(ImageTag.tagid * 100000 + ImageTag.imageid)'
  );
/**
 * Validation rules
 *
 * @var array
 */
  public $validate = array(
    'imageid' => array(
      'numeric' => array(
        'rule' => array('numeric'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'tagid' => array(
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
 * belongsTo associations
 *
 * @var array
 */
  public $belongsTo = array(
    'Tag' => array(
      'className' => 'Tag',
      'foreignKey' => 'tagid',
      'conditions' => '',
      'fields' => '',
      'order' => '',
    		'recursive'=>-1
    ),
        'Image' => array(
      'className' => 'Image',
      'foreignKey' => 'imageid',
      'conditions' => '',
      'fields' => '',
      'order' => ''
    ),
    );

  public function delete($id = NULL, $cascade = true)
  {
    $condition = 'imageid = '.$id['imageid'].' and tagid = '.$id['tagid'];
    $this->query('delete from ImageTags where '.$condition);
    return true;
  }
  
//   public $primaryKeyArray = array('imageid','tagid');
   
//   function exists($reset = false) {
//     if (!empty($this->__exists) && $reset !== true) {
//       return $this->__exists;
//     }
//     $conditions = array();
//     foreach ($this->primaryKeyArray as $pk) {
//       if (isset($this->data[$this->alias][$pk]) && $this->data[$this->alias][$pk]) {
//         $conditions[$this->alias.'.'.$pk] = $this->data[$this->alias][$pk];
//       }
//       else {
//         $conditions[$this->alias.'.'.$pk] = 0;
//       }
//     }
//     $query = array('conditions' => $conditions, 'fields' => array($this->alias.'.'.$this->primaryKey), 'recursive' => -1, 'callbacks' => false);
//     if (is_array($reset)) {
//       $query = array_merge($query, $reset);
//     }
//     if ($exists = $this->find('first', $query)) {
//       $this->__exists = 1;
//       $this->id = $exists[$this->alias][$this->primaryKey];
//       return true;
//     }
//     else {
//       return parent::exists($reset);
//     }
//   }
}
