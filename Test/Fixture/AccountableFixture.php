<?php
/**
 * AccountableFixture
 *
 */
class AccountableFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'accountable';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'resource' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'actor_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'verb' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'object' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'object_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'resource' => array('column' => array('resource', 'actor_id', 'verb', 'object', 'object_id', 'created', 'updated'), 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'resource' => 'Lorem ipsum dolor sit amet',
			'actor_id' => 1,
			'verb' => 'Lorem ipsum dolor sit amet',
			'object' => 'Lorem ipsum dolor sit amet',
			'object_id' => 1,
			'created' => '2013-01-11 17:23:49',
			'updated' => '2013-01-11 17:23:49'
		),
	);

}
