<?php

namespace Controller;

use mysqli;
use View\View;

class CarController extends AbstractTableController {

    protected  $tableName = "car";

    public function __construct(View $view, mysqli $link)
    {
        parent::__construct($view, $link);
        $this->view->setFolder('car');

    }

}