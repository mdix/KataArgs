<?php
spl_autoload_register(function ($classname) {
    $trimmedClassname = ltrim($classname, "\\");
    preg_match('/^(.+)?([^\\\\]+)$/U', $trimmedClassname, $match);
    $part1 = str_replace("\\", "/", $match[1]);
    $part2 = str_replace("\\", "/", $match[2]);
    $part2 = str_replace("_", "/", $part2);
    $part3 = ".php";
    @include_once $part1 . $part2 . $part3;
});