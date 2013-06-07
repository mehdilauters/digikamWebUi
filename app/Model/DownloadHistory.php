<?php
App::uses('AppModel', 'Model');
/**
 * DownloadHistory Model
 *
 */
class DownloadHistory extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'DownloadHistory';

    public $belongsTo = array(
    'Image' => array(
      'className' => 'Image',
      'foreignKey' => 'id',
      'conditions' => '',
      'fields' => '',
      'order' => ''
    )
  );
}
