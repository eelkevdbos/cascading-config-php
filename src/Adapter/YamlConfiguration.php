<?php namespace Vdbf\Configuration\Adapter;

use Symfony\Component\Yaml\Yaml;

class YamlConfiguration extends ArrayConfiguration {

    public function __construct($input)
    {
        parent::__construct(Yaml::parse($input));
    }

    public function exportYaml($path = null)
    {
        $yaml = Yaml::dump($this->configuration);

        if (!is_null($path)) {
            file_put_contents($path, $yaml);
        }

        return $yaml;
    }

}