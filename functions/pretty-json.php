<?php

use Makhnanov\JsonPrettyView\PrettyJson;

if (!function_exists('pretty_json')) {
    function pretty_json(false|string|array $json, Closure $fallback = null): void
    {
        echo PrettyJson::highlightCli($json, $fallback) . PHP_EOL;
    }
}

if (!function_exists('json_pretty')) {
    function json_pretty(false|string|array $json, Closure $fallback = null): void
    {
        echo PrettyJson::highlightCli($json, $fallback) . PHP_EOL;
    }
}
