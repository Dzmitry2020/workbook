<?php


namespace Controller;

use mysqli;
use View\View;

class PlaceController extends AbstractTableController
{
    protected  $tableName = "place";
    protected $templateFolder = "place";

//    public function __construct(View $view, mysqli $link)
//    {
//        parent::__construct($view, $link);
//        $this->view->setFolder('place');
//
//    }
}