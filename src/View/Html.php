<?php

namespace View;
//use TexLab\Html\Input;

class Html
{
    public static function create(string $className)
    {
        $className = "View\\Html\\$className";
//        $className = "TexLab\\Html\\$className";
        return new $className();
    }
}