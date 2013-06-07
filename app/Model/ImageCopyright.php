<?php
App::uses('AppModel', 'Model');
/**
 * ImageCopyright Model
 *
 */
class ImageCopyright extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'ImageCopyright';

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
