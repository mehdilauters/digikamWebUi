<?php
App::uses('AlbumRoot', 'Model');

/**
 * AlbumRoot Test Case
 *
 */
class AlbumRootTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.album_root'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AlbumRoot = ClassRegistry::init('AlbumRoot');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AlbumRoot);

		parent::tearDown();
	}

}
