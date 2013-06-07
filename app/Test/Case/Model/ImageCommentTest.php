<?php
App::uses('ImageComment', 'Model');

/**
 * ImageComment Test Case
 *
 */
class ImageCommentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.image_comment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ImageComment = ClassRegistry::init('ImageComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ImageComment);

		parent::tearDown();
	}

}
