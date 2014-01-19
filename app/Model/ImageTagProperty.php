<?php
App::uses('AppModel', 'Model');
/**
 * ImageTagProperty Model
 *
 */
class ImageTagProperty extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
    public $useTable = 'ImageTagProperties';
    public $actsAs = array('Containable');
    public $virtualFields = array(
      'id' => '(ImageTagProperty.tagid * 100000 + ImageTagProperty.imageid)'
  );

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

}
