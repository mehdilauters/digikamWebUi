<?php
App::uses('AppModel', 'Model');
/**
 * Setting Model
 *
 */
class Setting extends AppModel {
  public $useDbConfig = 'thumbnails';
/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'Settings';

/**
 * Validation rules
 *
 * @var array
 */
  public $validate = array(
    'keyword' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
  );
}
