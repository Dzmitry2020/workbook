<?php

namespace Controller;

use mysqli;
use View\View;

class PeopleController extends AbstractTableController
{

    protected $tableName = "people";
    protected $templateFolder = "people";

//    public function __construct(View $view, mysqli $link)
//    {
//        parent::__construct($view, $link);
//        $this->view->setFolder('people');
//
//    }

    private function prepareData(array &$data)
    {
        $data['post']['Driver'] = isset($data['post']['Driver']) ? 1 : 0;
    }

    public function actionAdd(array $data)
    {
        $this->prepareData($data);
        parent::actionAdd($data);
    }

    public function actionEdit(array $data)
    {
        $this->prepareData($data);
        parent::actionEdit($data);

    }
}