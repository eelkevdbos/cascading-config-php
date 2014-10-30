<?php namespace Vdbf\Configuration;

interface ConfigurationReader {

    public function get($key);

    public function offsetGet($offset);

    public function offsetExists($offset);

} 