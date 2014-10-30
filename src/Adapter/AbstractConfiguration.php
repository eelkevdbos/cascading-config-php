<?php
namespace Vdbf\Configuration\Adapter;

use Vdbf\Configuration\Configuration;

abstract class AbstractConfiguration implements Configuration {

    /**
     * @var array
     */
    protected $configuration = array();

    public function __construct($configuration = array())
    {
        $this->configuration = $configuration;
    }

    abstract function get($key);

    abstract function set($key, $value);

} 