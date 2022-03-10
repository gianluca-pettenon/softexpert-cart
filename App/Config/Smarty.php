<?php

namespace App\Config;

class Smarty
{

    private const PATHTEMPLATE = "../app/View";
    private const PATHCONFIG = "../app/View/compile";
    private const PATHCACHE = "../app/Cache";
    private const ALLOWEDEXT = ".php";

    public static function getPathTemplate(): string
    {
        return static::PATHTEMPLATE;
    }

    public static function getPathCompile(): string
    {
        return static::PATHCONFIG;
    }

    public static function getPathCache(): string
    {
        return static::PATHCACHE;
    }

    public static function getPathConfig(): bool
    {
        return false;
    }

    public static function getExtension(): string
    {
        return static::ALLOWEDEXT;
    }
}
