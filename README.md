# Yaml reader for maer/config

[![Build Status](https://api.travis-ci.org/magnus-eriksson/config-yaml-reader.svg)](https://travis-ci.org/magnus-eriksson/config-yaml-reader)

To keep the [maer/config](https://github.com/magnus-eriksson/config) library small and without dependencies, it doesn't support yaml-files out of the box.

If you want to use yaml-files, you can install this reader and regiter it for the yaml-file extension. This extension requires you to use maer/config version 2+.

## Install

```
composer require maer/config-yaml-reader
```

_If maer/config wasn't installed before, it will also be installed._

## Register

You need to register the reader and associate it with the `yml`-file extension.

```php
# Either add the reader to an existing config instance
$config->setReader('yml', new MyYamlReader);

# or you can add the reader when you instantiate the config class as a second argument
$options = [
    'readers' => [
        'yml' => new MyYamlReader,
    ],
];

$config = new Config(['/path-to-your-config.yml'], $options);
```

If you go for the first option, you need to set the reader _before_ you load the yaml-file.