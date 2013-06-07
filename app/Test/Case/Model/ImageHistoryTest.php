<?php
App::uses('ImageHistory', 'Model');

/**
 * ImageHistory Test Case
 *
 */
class ImageHistoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.image_history'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ImageHistory = ClassRegistry::init('ImageHistory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ImageHistory);

		parent::tearDown();
	}

}
