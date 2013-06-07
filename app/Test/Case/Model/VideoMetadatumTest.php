<?php
App::uses('VideoMetadatum', 'Model');

/**
 * VideoMetadatum Test Case
 *
 */
class VideoMetadatumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.video_metadatum'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->VideoMetadatum = ClassRegistry::init('VideoMetadatum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VideoMetadatum);

		parent::tearDown();
	}

}
