<?php
App::uses('AppModel', 'Model');
/**
 * ImageInformation Model
 *
 */
class ImageInformation extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'ImageInformation';

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
