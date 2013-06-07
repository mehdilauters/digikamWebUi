<?php
App::uses('FilePath', 'Model');

/**
 * FilePath Test Case
 *
 */
class FilePathTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.file_path'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FilePath = ClassRegistry::init('FilePath');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FilePath);

		parent::tearDown();
	}

}
