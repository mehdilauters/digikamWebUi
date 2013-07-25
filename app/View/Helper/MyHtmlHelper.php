<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('HtmlHelper', 'View/Helper');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class MyHtmlHelper extends HtmlHelper {
	
	function link($title, $url = NULL, $options = array(), $confirmMessage = false)
	{
		if(!is_array($url))
		{
			return parent::link($title,$url.$this->getLinkTitle($title), $options , $confirmMessage);
		}
		else
			return parent::link($title, $url, $options , $confirmMessage );
	}
	
	function getLinkTitle($title)
	{
// 		return '';
		return '/'.$this->escapeLink($title);
	}
	
	function escapeLink($title)
	{
	
		$replace=array(' ','ê','é','&','"','\'','(','è','ç','à',')','=','+','~','#','{','[','|','`','\\','^','@',']','î','ï','ô');
		$by=array('-','e','e','-','-','-','-','e','c','a','-','-','-','-','-','-','-','-','-','-','-','-','-','i','i','o');
	
	
		return str_replace($replace,$by,$title);
	}
}
