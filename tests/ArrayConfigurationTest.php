<?php

class ArrayConfigurationTest extends PHPUnit_Framework_TestCase {

    /**
     * @var \Vdbf\Configuration\Adapter\ArrayConfiguration
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = new \Vdbf\Configuration\Adapter\ArrayConfiguration(array(
            'A' => 'B',
            'C' => 'D'
        ));
    }

    public function testConfigurationGetters()
    {
        $this->assertEquals('B', $this->sut->get('A'));
        $this->assertEquals('B', $this->sut->offsetGet('A'));
    }

    public function testConfigurationOffsetExistence()
    {
        $this->assertTrue($this->sut->offsetExists('A'));
        $this->assertFalse($this->sut->offsetExists('B'));
    }

} 