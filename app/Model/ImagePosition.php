<?php
App::uses('AppModel', 'Model');
/**
 * ImagePosition Model
 *
 */
class ImagePosition extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'ImagePositions';

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
