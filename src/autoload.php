<?php

spl_autoload_register(function ($class_name) { // вызывает каждый раз когда вызывают ее

    include str_replace('\\', '/', "$class_name.php");
});
