<?php

require_once 'PHPUnit/Framework.php';

require_once CLASS_PATH.'/AnnoLoader/Class/Mapper.php';

/**
 * Test class for AnnoLoader_Class_Mapper.
 * Generated by PHPUnit on 2011-01-14 at 15:41:30.
 */
class AnnoLoader_Class_MapperTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var AnnoLoader_Class_Mapper
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->object = new AnnoLoader_Class_Mapper();
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() {

	}

	public function testNonDataProvided()
	{

	}

    public function dataProvider_testSetNamespaceLength()
    {
        return array
		(
          array(0, 0),
          array(1, 1),
          array(2, 2),
          array(3, 3),
        );
    }


	/**
     * @dataProvider dataProvider_testSetNamespaceLength
     */
	public function testGetSetNamespaceLength($namespaceLength, $expectedNamespaceLength)
	{
		$this->object->setNamespaceLength($namespaceLength);
		$this->assertEquals($expectedNamespaceLength, $this->object->getNamespaceLength());
	}

    public function dataProvider_testSetGetNamespaceMap()
    {
        return array
		(
          array('Ext.ex', 'Ext.ex'),
          array('Ext.ux', 'Ext.ux'),
          array('Ext', 'Ext'),
        );
    }


	/**
     * @dataProvider dataProvider_testSetGetNamespaceMap
     */
	public function testSetGetNamespaceMap($namespaceMap, $expectedNamespaceMap)
	{
		$this->object->setNamespaceMap($namespaceMap);
		$this->assertEquals($expectedNamespaceMap, $this->object->getNamespaceMap());
	}

    public function dataProvider_testMapWithoutNamespaces()
    {
        return array
		(
			array('', ''),
			array('Ext', 'Ext'),
			array('Ext.grid', 'Ext/grid'),
			array('Ext.grid.Panel', 'Ext/grid/Panel'),
			array('Ext.grid.Panel.plugins', 'Ext/grid/Panel/plugins'),

			array('Ext.ex.grid.Panel.plugins', 'Ext/ex/grid/Panel/plugins'),
			array('Ext.ux.grid.Panel.plugins', 'Ext/ux/grid/Panel/plugins'),
        );
    }


	/**
     * @dataProvider dataProvider_testMapWithoutNamespaces
     */
	public function testMapWithoutNamespaces($className, $expectedPath)
	{
		$this->assertEquals($expectedPath, $this->object->map($className));
	}

    public function dataProvider_testMapWithNamespaces()
    {
        return array
		(
			array('', ''),
			array('Ext', 'Ext'),
			array('Ext.grid', 'Ext/grid'),
			array('Ext.grid.Panel', 'Ext/grid/Panel'),
			array('Ext.grid.Panel.plugins', 'Ext/grid/Panel/plugins'),

			array('Ext.ex.grid.Panel.plugins', 'lib/ex/grid/Panel/plugins'),
			array('Ext.ux.grid.Panel.plugins', 'lib/ux/grid/Panel/plugins'),
        );
    }


	/**
     * @dataProvider dataProvider_testMapWithNamespaces
     */
	public function testMapWithNamespaces($className, $expectedPath)
	{
		$this->object = new AnnoLoader_Class_Mapper(array
		(
			'Ext.ex'	=> 'lib/ex',
			'Ext.ux'	=> 'lib/ux',
		));
		$this->assertEquals($expectedPath, $this->object->map($className));
	}

}

?>
