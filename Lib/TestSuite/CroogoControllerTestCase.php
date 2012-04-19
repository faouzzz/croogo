<?php

App::uses('CroogoTestFixture', 'TestSuite');

/**
 * CroogoTestCase class
 *
 * PHP version 5
 *
 * @category TestSuite
 * @package  Croogo
 * @version  1.4
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @author   Rachman Chavik <rchavik@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class CroogoControllerTestCase extends ControllerTestCase {

/**
 * setUp
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		App::build(array(
			'Plugin' => array(TESTS . 'test_app' . DS . 'Plugin' . DS),
			'View' => array(TESTS . 'test_app' . DS . 'View' . DS),
		), App::PREPEND);

		Configure::write('Acl.database', 'test');
		ClassRegistry::init('Setting')->settingsPath = TESTS . 'test_app' . DS . 'Config' . DS . 'settings.yml';
	}

	public function tearDown() {
		parent::tearDown();
		CakeSession::clear();
		CakeSession::destroy();
		ClassRegistry::flush();
	}

	public function AuthUserCallback($key) {
		$auth = array(
			'id' => 1,
			'username' => 'admin',
			'role_id' => 1,
			);
		if (empty($key) || !isset($auth[$key])) {
			return $auth;
		}
		return $auth[$key];
	}

}