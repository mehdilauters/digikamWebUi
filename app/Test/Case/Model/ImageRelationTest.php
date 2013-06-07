<?php
App::uses('ImageRelation', 'Model');

/**
 * ImageRelation Test Case
 *
 */
class ImageRelationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.image_relation'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ImageRelation = ClassRegistry::init('ImageRelation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ImageRelation);

		parent::tearDown();
	}

}
