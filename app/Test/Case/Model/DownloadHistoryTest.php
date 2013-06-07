<?php
App::uses('DownloadHistory', 'Model');

/**
 * DownloadHistory Test Case
 *
 */
class DownloadHistoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.download_history'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DownloadHistory = ClassRegistry::init('DownloadHistory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DownloadHistory);

		parent::tearDown();
	}

}
