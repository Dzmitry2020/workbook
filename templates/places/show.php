<?php


/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $table
 */

use TexLab\Html\Html;

/** @var array $columnsTypes */

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

    if ($field == 'FullName') {
        $form->addInnerText(Html::Textarea()
            ->setName($field)
            ->setId($field)
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
