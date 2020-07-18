<?php

namespace View;

class Html
{
    public static function create(string $className)
    {
        $className = ($className == 'Pagination') ? "TexLab\\Html\\Component\\$className" :
            (($className == 'TableEdited') ? "View\\Html\\$className" : "TexLab\\Html\\$className");
        return new $className();
    }
}