<?php namespace Vdbf\Configuration;


interface ConfigurationWriter {

    public function set($key, $value);

    public function offsetSet($offset, $value);

    public function offsetUnset($offset);

} 