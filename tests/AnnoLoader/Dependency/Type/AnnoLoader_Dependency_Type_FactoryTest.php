<?php

require_once 'PHPUnit/Framework.php';

require_once CLASS_PATH . '/AnnoLoader/Dependency/Type/Factory.php';
require_once CLASS_PATH . '/AnnoLoader/Dependency/Type/Abstract.php';
require_once CLASS_PATH . '/AnnoLoader/Dependency/Type/File.php';
require_once CLASS_PATH . '/AnnoLoader/Dependency/Type/Class.php';
require_once CLASS_PATH . '/AnnoLoader/Dependency/Type/Directory/Single.php';
require_once CLASS_PATH . '/AnnoLoader/Dependency/Type/Directory/Tree.php';
require_once CLASS_PATH . '/AnnoLoader/Dependency/Type/Exception.php';

/**
 * Test class for AnnoLoader_Dependency_Type_Factory.
 * Generated by PHPUnit on 2011-01-16 at 23:32:17.
 */
class AnnoLoader_Dependency_Type_FactoryTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var AnnoLoader_Dependency_Type_Factory
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() {
		$this->object = new AnnoLoader_Dependency_Type_Factory();
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() {

	}

    public function dataProvider_testCreate()
    {
        return array
		(
			array('requires-file', new AnnoLoader_Dependency_Type_File()),
			array('requires-class', new AnnoLoader_Dependency_Type_Class()),
			array('requires-directory', new AnnoLoader_Dependency_Type_Directory_Single()),
			array('requires-directory-tree', new AnnoLoader_Dependency_Type_Directory_Tree()),
        );
    }

	/**
     * @dataProvider dataProvider_testCreate
     */
	public function testCreate($type, $object)
	{
		$this->assertTrue($this->object->create($type) instanceof $object);
	}

	/**
     * @expectedException AnnoLoader_Dependency_Type_Exception
     */
	public function testCreateException()
	{
		$this->object->create('NonExisting');
	}

}

?>
