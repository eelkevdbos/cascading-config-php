cascading-config-php
====================

Cascading configuration for PHP

##Usage

###Cascading configurations

```php
$config = new Vdbf\Configuration\ConfigurationManager(array(
  new Vdbf\Configuration\Adapter\ArrayConfiguration(array('most' => 'important')),
  new Vdbf\Configuration\Adapter\ArrayConfiguration(array('secondary' => 'importance')),
  new Vdbf\Configuration\Adapter\YamlConfiguration('./path/to/yaml.yaml')
));
```

###Configuration writer
```php

$config = new Vdbf\Configuration\Adapter\ArrayConfiguration(array('most' => 'important'));

//via setter method
$config->set('key', 'value');

//via array access
$config['key'] = $value;
```


Configuration entries can be retrieved by key. Calls to `get($key)` and `set($key, $value)` will be cascaded down the list of configurations. The first entry found will be used as value returned by `get()`.
