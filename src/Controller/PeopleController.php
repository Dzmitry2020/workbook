<?php

namespace Controller;

class PeopleController extends AbstractTableController
{

    protected string $tableName = "people";
    protected string $templateFolder = "people";

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
