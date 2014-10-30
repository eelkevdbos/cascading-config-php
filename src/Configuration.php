<?php namespace Vdbf\Configuration;

interface Configuration {

    public function get($key);

    public function set($key, $value);

} 