<?php
App::uses('AppModel', 'Model');
/**
 * TagProperty Model
 *
 */
class TagProperty extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'TagProperties';
  public $actsAs = array('Containable');
 
}
