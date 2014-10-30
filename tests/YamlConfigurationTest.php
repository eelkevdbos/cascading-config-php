<?php

class YamlConfigurationTest extends PHPUnit_Framework_TestCase {

    /**
     * @var \Vdbf\Configuration\Adapter\YamlConfiguration
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = new \Vdbf\Configuration\Adapter\YamlConfiguration(__DIR__ . '/fixtures/config.yaml');
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