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

pretty_json($asString);

// OR

json_pretty($asString);

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
