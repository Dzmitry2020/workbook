<?php

/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $table
 * @var array $carsList
 * @var array $driversList
 * @var array $tasksList
 */

use TexLab\Html\Html;

$pageCurrent = $this->data['currentPage'];

if ($pageCount > 1) {
    echo Html::Pagination()
        ->setClass('pagination')
        ->setUrlPrefix("?action=show&type=$type&page=$pageCurrent")
        ->setPageCount($pageCount)
        ->setCurrentPage($pageCurrent)
        ->html();
}

$comments[] = 'Действия';

$edtA = Html::A()
    ->addInnerText('<i class="fa fa-edit"></i>')
    ->setClass('btn btn-success btn-sm edit');
$delA = Html::A()
    ->addInnerText('<i class="fa fa-trash"></i>')
    ->setClass('btn btn-danger btn-sm del');

foreach ($table as &$row) {
    $row[] = $edtA
            ->setHref("?action=showedit&type=$type&id=$row[id]&page=$pageCurrent")
            ->html()
        . "\n"
        . $delA
            ->setHref("?action=del&type=$type&id=$row[id]&page=$pageCurrent")
            ->html();
}

echo Html::Table()
    ->setHeaders($comments)
    ->setData($table)
    ->setClass('table shadow ')
    ->html();

$form = Html::Form()
    ->setMethod('POST')
    ->setAction("?action=add&type=$type")
    ->setClass('form');

foreach ($fields as $field) {
    $form->addInnerText(Html::Label()
        ->setFor($field)
        ->setInnerText($comments[$field])
        ->html());

    if ($field == 'cars_id') {
        $form->addInnerText(Html::Select()
            ->setName($field)
            ->setId($field)
            ->setData($carsList)
            ->html());
    } elseif ($field == 'people_id') {
        $form->addInnerText(Html::Select()
            ->setName($field)
            ->setId($field)
            ->setData($driversList)
            ->html());
    } elseif ($field == 'tasks_id') {
        $form->addInnerText(Html::Select()
            ->setName($field)
            ->setId($field)
            ->setData($tasksList)
            ->html());
    } else {
        $form->addInnerText(Html::Input()
            ->setName($field)
            ->setId($field)
            ->html());
    }
}

$form->addInnerText(
    (Html::Input()
        ->setType('submit')
        ->setValue('Добавить')
        ->setClass('btn btn-success')
        ->html())
);

echo $form->html();
