<?php
App::uses('UniqueHash', 'Model');

/**
 * UniqueHash Test Case
 *
 */
class UniqueHashTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.unique_hash'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UniqueHash = ClassRegistry::init('UniqueHash');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UniqueHash);

		parent::tearDown();
	}

}
