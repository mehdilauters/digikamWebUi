<?php
App::uses('Album', 'Model');

/**
 * Album Test Case
 *
 */
class AlbumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.album'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Album = ClassRegistry::init('Album');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Album);

		parent::tearDown();
	}

}
