<?php
App::uses('Accountable', 'Accountable.Model');

/**
 * Accountable Test Case
 *
 */
class AccountableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.accountable.accountable'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Accountable = ClassRegistry::init('Accountable.Accountable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Accountable);

		parent::tearDown();
	}

}
