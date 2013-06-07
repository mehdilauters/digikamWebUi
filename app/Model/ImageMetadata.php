<?php
App::uses('AppModel', 'Model');
/**
 * ImageMetadatum Model
 *
 */
class ImageMetadata extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'ImageMetadata';

/**
 * Primary key field
 *
 * @var string
 */
  public $primaryKey = 'imageid';

  
    public $belongsTo = array(
    'Image' => array(
      'className' => 'Image',
      'foreignKey' => 'imageid',
      'conditions' => '',
      'fields' => '',
      'order' => ''
    )
  );
}
