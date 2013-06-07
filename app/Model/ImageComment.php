<?php
App::uses('AppModel', 'Model');
/**
 * ImageComment Model
 *
 */
class ImageComment extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'ImageComments';

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
