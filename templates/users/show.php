<?php

/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var string $type Имя контроллера
 * @var array $groupsList Список групп
 * @var array $table Таблица с данными
 * @var array $comments Заголовки столюцов таблицы
 */

use TexLab\Html\Html;

if ($pageCount > 1) {
    echo Html::Pagination()
        ->setClass('pagination')
        ->setUrlPrefix("?action=show&type=" . $type)
        ->setPageCount($pageCount)
        ->setCurrentPage($this->data['currentPage'])
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
            ->setHref("?action=showedit&type=$type&id=$row[id]")
            ->html()
        . "\n"
        . $delA
            ->setHref("?action=del&type=$type&id=$row[id]")
            ->html();
}

echo "<div class='table-responsive'>\n";

echo Html::Table()
    ->setHeaders($comments)
    ->setData($table)
    ->setClass('table table-striped')//table-dark
    ->html();

echo "\n</div>";

$form = Html::Form()
    ->setMethod('POST')
    ->setAction("?action=add&type=$type")
    ->setClass('form');

foreach ($fields as $field) {
    $form->addInnerText(Html::Label()
        ->setFor($field)
        ->setInnerText($comments[$field])
        ->html());
    if ($field == 'password') {
        $form->addInnerText(Html::Input()
            ->setType('password')
            ->setName($field)
            ->setId($field)
            ->html());
    } elseif ($field == 'group_id') {
        $form->addInnerText(Html::Select()
            ->setName($field)
            ->setId($field)
            ->setData($groupsList)
            ->html());
    } else {
        $form->addInnerText(Html::Input()
            ->setName($field)
            ->setId($field)
            ->html());
    }
}

$form->addInnerText(
    Html::Input()
        ->setType('submit')
        ->setClass('btn btn-success')
        ->setValue('Добавить')
        ->html()
);

echo $form->html();
