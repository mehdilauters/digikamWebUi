<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 */
class Tag extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'Tags';
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
  );
  
  
      public $belongsTo = array(
    'ParentTag' => array(
      'className' => 'Tag',
      'foreignKey' => 'pid',
      //'associationForeignKey'=>'tagid',
//       'conditions' => 'Image.imageid = ImageTagProperty.imageid',
    
      'fields' => '',
      'order' => ''
    ),
    );
  
    public $hasOne = array(
    'ImageTagProperty' => array(
      'className' => 'ImageTagProperty',
      'foreignKey' => 'tagid',
      //'associationForeignKey'=>'tagid',
//       'conditions' => 'Image.imageid = ImageTagProperty.imageid',
    
      'fields' => '',
      'order' => ''
    ),
    );
    
    public $hasMany = array(
        'TagProperty' => array(
            'className' => 'TagProperty',
            'foreignKey' => 'tagid',
          //        'associationForeignKey'=>'tagid',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'ImageTag' => array(
            'className' => 'ImageTag',
            'foreignKey' => 'tagid',
          //        'associationForeignKey'=>'tagid',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        );
      
    
//     public $hasAndBelongsToMany = array(
//     		'Image' => array(
//     				'className' => 'Image',
//     				'joinTable' => 'ImageTags',
//     				'foreignKey' => 'tagid',
//     				'associationForeignKey' => 'id',
//     				'unique' => 'keepExisting'
//     		)
//     );
}
