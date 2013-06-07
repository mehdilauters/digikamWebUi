<?php
App::uses('AppModel', 'Model');
/**
 * UniqueHash Model
 *
 */
class UniqueHash extends AppModel {
  public $useDbConfig = 'thumbnails';
  public $primaryKey = 'uniquehash';
  
/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'UniqueHashes';

  
  public $belongsTo = array(
  		'Thumbnail' => array(
  				'className' => 'Thumbnail',
  				'foreignKey' => 'thumbid',
  				'conditions' => '',
  				'fields' => '',
  				'order' => ''
  		),
  );
  
}
