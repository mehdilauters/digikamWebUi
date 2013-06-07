<?php
App::uses('AppModel', 'Model');
/**
 * TagsTree Model
 *
 */
class TagsTree extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'TagsTree';
  public $actsAs = array('Containable');

/**
 * Validation rules
 *
 * @var array
 */
  public $validate = array(
    'pid' => array(
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
  
  
      public $belongsTo = array(
    'Tag' => array(
      'className' => 'Tag',
      'foreignKey' => 'id',
      'conditions' => '',
      'fields' => '',
      'order' => ''
    ),
    );

}
