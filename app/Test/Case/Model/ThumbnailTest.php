<?php
App::uses('Thumbnail', 'Model');

/**
 * Thumbnail Test Case
 *
 */
class ThumbnailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.thumbnail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Thumbnail = ClassRegistry::init('Thumbnail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Thumbnail);

		parent::tearDown();
	}

}
