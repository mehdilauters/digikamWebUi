<?php
App::uses('AppModel', 'Model');
/**
 * ImageHistory Model
 *
 */
class ImageHistory extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'ImageHistory';

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
