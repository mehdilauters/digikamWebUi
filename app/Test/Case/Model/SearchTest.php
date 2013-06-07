<?php
App::uses('Search', 'Model');

/**
 * Search Test Case
 *
 */
class SearchTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.search'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Search = ClassRegistry::init('Search');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Search);

		parent::tearDown();
	}

}
