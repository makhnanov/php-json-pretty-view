<?php

use Makhnanov\JsonPrettyView\PrettyJson;

if (!function_exists('pretty_json')) {
    /**
     * @author Nicolas Grekas <p@tchwork.com>
     * @author Alexandre Daubois <alex.daubois@gmail.com>
     */
    function pretty_json(false|string|array $json, Closure $fallback = null): void
    {
        echo PrettyJson::highlightCli($json, $fallback) . PHP_EOL;
    }
}
