# PHP JSON Pretty View
![PHP JSON Pretty View](https://github.com/makhnanov/php-json-pretty-view/blob/main/php-json-pretty-view.png?raw=true)

## Requirements
```shell
"php": "^8.3",
"illuminate/support": "^12.0"
```

## Installation
```shell
composer require makhnanov/php-json-pretty-view
```

## Usage
```php
<?php

use Makhnanov\JsonPrettyView\PrettyJson;

require_once __DIR__ . '/vendor/autoload.php';

$asString = <<<JSON
{
    "id": 1000,
    "true": true,
    "false": false,
    "null": null,
    "string": "null",
    "second string": "str sub str",
    "array": [
        1,
        2
    ],
    "last string": "finish"
}
JSON;

json_pretty($asString);

// OR

pretty_json($asString);

// OR

echo PrettyJson::highlightCli([
    'id' => 1000,
    'true' => true,
    'false' => false,
    'null' => null,
    'string' => "null",
    'second string' => "str sub str",
    'array' => [
        1, 2,
    ],
    'last string' => "finish",
]);

echo PHP_EOL;
```
