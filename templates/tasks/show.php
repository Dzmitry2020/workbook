<?php


/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $table
 * @var array $placeNamesList
 * @var array $taskStatusList
 * @var array $workerNameList
 * @var string $pageCurrent
 */

use TexLab\Html\Html;

$pageCurrent = $this->data['currentPage'];

if ($pageCount > 1) {
    echo Html::Pagination()
        ->setClass('pagination')
        ->setUrlPrefix("?action=show&type=" . $type)
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

    switch ($row['status']) {
        case 1:
            $row['status'] = '⏹';
            break;
        case 2:
            $row['status'] = '▶';
            break;
        case 3:
            $row['status'] = '⏸️';
            break;
        case 4:
            $row['status'] = '✅';
            break;
    }
}

echo Html::Table()
    ->setHeaders($comments)
    ->setData($table)
    ->setClass('table table-striped')
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

    if (($field == 'content') or ($field == 'comment')) {
        $form->addInnerText(Html::Textarea()
            ->setName($field)
            ->setId($field)
            ->html());
    } elseif ($field == 'date') {
        $form->addInnerText(Html::Input()
            ->setType('date')
            ->setName($field)
            ->setId($field)
            ->setValue(date('Y-m-d'))
            ->html());
    } elseif ($field == 'places_id') {
        $form->addInnerText(Html::Select()
            ->setName($field)
            ->setId($field)
            ->setData($placeNamesList)
            ->html());
    } elseif ($field == 'status') {
        $form->addInnerText(Html::Select()
            ->setName($field)
            ->setId($field)
            ->setData($taskStatusList)
            ->html());
    }
}

$form->addInnerText(Html::Label()
    ->setFor('workers')
    ->setInnerText('Исполнители')
    ->html());

$form->addInnerText(Html::Select()
    ->setName('workers[]')
    ->setId('workers')
    ->setData($workerNameList)
    ->setSize(5)
    ->setMultiple(1)
    ->html());

$form->addInnerText(
    Html::Input()
        ->setType('submit')
        ->setClass('btn btn-success')
        ->setValue('Добавить')
        ->html()
);

echo $form->html();
