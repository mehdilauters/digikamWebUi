<?php
App::uses('AppModel', 'Model');
/**
 * ImageHaarMatrix Model
 *
 */
class ImageHaarMatrix extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'ImageHaarMatrix';

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
