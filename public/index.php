<?php

session_start();

require '../vendor/autoload.php';

(new Core\Dispatcher())->run();