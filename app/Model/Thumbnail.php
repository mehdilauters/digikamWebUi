<?php
App::uses('AppModel', 'Model');
/**
 * Thumbnail Model
 *
 */
class Thumbnail extends AppModel {
  public $useDbConfig = 'thumbnails';
/**
 * Use table
 *
 * @var mixed False or table name
 */
  public $useTable = 'Thumbnails';

}
