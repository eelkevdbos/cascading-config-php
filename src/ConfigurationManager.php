<?php namespace Vdbf\Configuration;

class ConfigurationManager implements Configuration {

    const DEFAULT_VALUE_REQUIRED = null;

    protected $configurations = array();

    public function __construct($configurations = array())
    {
        $this->configurations = $configurations;
    }

    public function prependConfiguration(Configuration $configuration)
    {
        array_unshift($this->configurations, $configuration);
    }

    public function appendConfiguration(Configuration $configuration)
    {
        array_push($this->configurations, $configuration);
    }

    public function get($key, $defaultValue = null)
    {
        foreach($this->configurations as $configuration) {
            $value = $configuration->get($key, static::DEFAULT_VALUE_REQUIRED);
            if ($value !== static::DEFAULT_VALUE_REQUIRED) {
                return $value;
            }
        }

        return $defaultValue;
    }

    public function set($key, $value)
    {
        foreach($this->configurations as $configuration) {
            if ($configuration->isWritable()) {
                $configuration->set($key, $value);
            }
        }
        return $this;
    }

} 