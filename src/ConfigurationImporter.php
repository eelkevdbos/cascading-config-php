<?php namespace Vdbf\Configuration;

interface ConfigurationImporter
{
    public function import($data, $type);
} 