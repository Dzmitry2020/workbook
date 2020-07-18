<?php

use View\Html;

/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var string $type Имя контроллера
 * @var array $placeGroupsList Список групп
 * @var array $table Таблица с данными
 * @var array $comments Заголовки столюцов таблицы
 */

echo Html::create('Pagination')
    ->setClass('pagination')
    ->setUrlPrefix("?action=show&type=" . $type)
    ->setPageCount($pageCount)
    ->setCurrentPage($this->data['currentPage'])
    ->html();

echo Html::create('TableEdited')
    ->setControllerType($type)
    ->setHeaders($comments)
    ->data($table)
    ->setClass('table')
    ->html();

$form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=add&type=$type")
    ->setClass('form');

foreach ($fields as $field) {
    $form->addInnerText(Html::create('Label')
        ->setFor($field)
        ->setInnerText($comments[$field])
        ->html());
    if ($field == 'password') {
        $form->addInnerText(Html::create('Input')
            ->setType('password')
            ->setName($field)
            ->setId($field)
            ->html());
    } elseif ($field == 'group_id') {
        $form->addInnerText(Html::create('Select')
            ->setName($field)
            ->setId($field)
            ->setData($placeGroupsList)
            ->html());
    } else {
        $form->addInnerText(Html::create('Input')
            ->setName($field)
            ->setId($field)
            ->html());
    }
}

$form->addInnerText(
    Html::create('Input')
        ->setType('submit')
        ->setValue('Добавить')
        ->html()
);

echo $form->html();