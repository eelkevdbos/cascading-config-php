<?php

class ConfigurationManagerTest extends PHPUnit_Framework_TestCase {

    /**
     * @var \Vdbf\Configuration\ConfigurationManager
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = new \Vdbf\Configuration\ConfigurationManager();
    }

    public function testGetterPropagation()
    {
        $this->sut->appendConfiguration(new \Vdbf\Configuration\Adapter\ArrayConfiguration(array('a' => 'b')));
        $this->sut->appendConfiguration(new \Vdbf\Configuration\Adapter\ArrayConfiguration(array('a' => 'c', 'c' => 'd')));

        $this->assertEquals('b', $this->sut->get('a'));
        $this->assertEquals('d', $this->sut->get('c'));
    }

} 