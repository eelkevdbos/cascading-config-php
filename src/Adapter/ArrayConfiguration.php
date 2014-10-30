<?php namespace Vdbf\Configuration\Adapter;

use Vdbf\Configuration\ConfigurationReader;
use Vdbf\Configuration\ConfigurationWriter;

class ArrayConfiguration extends AbstractConfiguration implements ConfigurationReader, ConfigurationWriter, \ArrayAccess
{

    public function get($key, $defaultValue = null)
    {
        if ($this->offsetExists($key)) {
            return $this->configuration[$key];
        }
        return $defaultValue;
    }

    public function set($key, $value)
    {
        $this->configuration[$key] = $value;
        return $this;
    }

    public function import($data, $type, $merge = true)
    {
        $importer = sprintf('import%s', ucfirst(strtolower($type)));

        if (!method_exists($this, $importer)) {
            throw new ConfigurationImporterException("No importer available for type: {$type}");
        }

        $this->$importer($data, $merge);
    }

    public function importArray(array $data, $merge = true)
    {
        if ($merge) {
            $this->configuration = array_merge_recursive($this->configuration, $data);
        } else {
            $this->configuration = $data;
        }
    }

    public function importJson($data, $merge = true)
    {
        $decoded = json_decode($data, true);
        if ($merge) {
            $this->configuration = array_merge_recursive($this->configuration, $decoded);
        } else {
            $this->configuration = $decoded;
        }
    }

    public function importObject($object, $merge = true)
    {
        if (!method_exists($object, 'toArray')) {
            $objectClass = get_class($object);
            throw new \Exception("No method toArray found on object: {$objectClass}");
        }
    }

    public function offsetGet($offset)
    {
        return isset($this->configuration[$offset]) ? $this->configuration[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->configuration[] = $value;
        } else {
            $this->configuration[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->configuration[$offset]);
    }

    public function offsetExists($offset)
    {
        return isset($this->configuration[$offset]);
    }

} 