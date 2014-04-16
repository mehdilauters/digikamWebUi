<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	var $controllerInvalidatesFields = array();
	
	 public function save($data = null, $validate = true, $fieldList = array())
  {
    $res = parent::save($data, $validate, $fieldList);
    if(!$res)
    {
	  $this->log('['.$this->alias."] save error \n===== Validation errors =====\n".Debugger::exportVar($this->validationErrors)."\n===== Data =====".Debugger::exportVar($this->data), 'debug');
      if ( Configure::read('debug') != 0)
      {
        debug('['.$this->alias.'] Save didn\'t work');
        debug($this->data);
        debug($this->validationErrors);
      }
    }
    return $res;
  }
  
  
  
  /**
   *  Set a field invalid from the controller
   *
   */
  public function invalidateField($fieldName, $errorMessage = 'This field is not valid')
  {
    debug($this->alias.'['.$fieldName.'] invalidated : '.$errorMessage);
    $this->controllerInvalidatesFields[$fieldName][]=$errorMessage;
  }
  
  
  public function validates($options = array())
  {
//     debug($this->controllerInvalidatesFields);
    $valide = parent::validates($options);
    $this->validationErrors = array_merge_recursive($this->validationErrors, $this->controllerInvalidatesFields);
    return $valide && count($this->controllerInvalidatesFields) == 0;
  }
}
