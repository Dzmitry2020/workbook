<?php

/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var string $type Имя контроллера
 * @var array $placeGroupsList Список групп
 * @var array $table Таблица с данными
 * @var array $comments Заголовки столюцов таблицы
 */

use TexLab\Html\Html;

echo Html::Pagination()
    ->setClass('pagination')
    ->setUrlPrefix("?action=show&type=" . $type)
    ->setPageCount($pageCount)
    ->setCurrentPage($this->data['currentPage'])
    ->html();

$comments[] = 'Удаление';
$comments[] = 'Правка';

$delA = Html::A()->addInnerText('🗑️')->setClass('del');
$edtA = Html::A()->addInnerText('✏')->setClass('edit');

foreach ($table as &$row) {
    $row[] = $delA
        ->setHref("?action=del&type=$type&id=$row[id]")
        ->html();
    $row[] = $edtA
        ->setHref("?action=showedit&type=$type&id=$row[id]")
        ->html();
}

echo Html::Table()
    ->setHeaders($comments)
    ->setData($table)
    ->setClass('table')
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
            ->setData($placeGroupsList)
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
        ->setValue('Добавить')
        ->html()
);

echo $form->html();
