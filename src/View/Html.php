<?php

namespace View;
//use TexLab\Html\Input;

class Html
{
    public static function create(string $className)
    {
        $className = ($className == 'Pagination') ? "TexLab\\Html\\Component\\$className" :
            (($className == 'TableEdited') ? "View\\Html\\$className" : "TexLab\\Html\\$className");
//        $className = "TexLab\\Html\\$className";
        return new $className();
    }
}