<?php

namespace Makhnanov\JsonPrettyView;

use Closure;
use Illuminate\Support\Str;

class PrettyJson
{
    public static function highlightCli(false|string|array $json, Closure $fallback = null): string
    {
        if ($json === false) {
            return $fallback ? $fallback($json) : '';
        }

        $isStr = is_string($json);

        if ($isStr && !json_validate($json)) {
            return $fallback ? $fallback($json) : '';
        }

        $json = json_encode(
            $isStr ? json_decode($json) : $json,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );

        return preg_replace_callback(
            '/(\\strue)|(\\sfalse)|(\\snull)|({)|(})|(\[)|(])|(,)|(".*":)|(".*"\n)|(".*",)|(\d+)/i',
            function ($matches) {

                $var = $matches[0];
                $comma = false;

                return match (true) {
                    is_numeric($var) => "\033[1;38;5;38m" . $var . "\033[0m",

                    $var === ' true' => "\033[1;32;5;38m" . $var . "\033[0m",

                    $var === ' false' => "\033[1;31;5;38m" . $var . "\033[0m",

                    $var === ' null' => "\033[1;36;5;38m" . $var . "\033[0m",

                    in_array($var, ['{', '}', '[', ']', ','], true) => "\033[0;38;5;208m" . $var . "\033[0m",

                    Str::endsWith($var, ':')
                    => "\033[0;38;5;208m\"\033[0m"
                        . "\033[1;38;5;170m"
                        . Str::substr($var, 1, strlen($var) - 3)
                        . "\033[0m"
                        . "\033[0;38;5;208m\":\033[0m",

                    $eol = Str::endsWith($matches[0], PHP_EOL), $comma = Str::endsWith($matches[0], ',')
                    => "\033[0;38;5;208m\"\033[0m"
                        . "\033[1;38;5;113m"
                        . Str::substr($var, 1, strlen($var) - 3)
                        . "\033[0m"
                        . "\033[0;38;5;208m\"\033[0m"
                        . ($eol ? PHP_EOL : '')
                        . ($comma ? "\033[0;38;5;208m,\033[0m" : ''),

                    default => $var,
                };
            },
            $json
        );
    }
}
