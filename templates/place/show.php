<?php

use View\Html\Html;

/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 */

/** @var array $columnsTypes */
//print_r($columnsTypes);

echo Html::create("Pagination")
    ->setClass('pagination')
    ->setControllerType($type)
    ->setPageCount($pageCount)
    ->html();

/** @var array $table */
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
    $form->addContent(Html::create('Label')
        ->setFor($field)
        ->setInnerText($comments[$field])
        ->html());
    if ($field == 'FullName'){
        $form->addContent(Html::create('Textarea')
            ->setName($field)
            ->setId($field)
            ->html());
    }
    else {
        $form->addContent(Html::create('input')
            ->setName($field)
            ->setId($field)
            ->html());
    }
}

$form->addContent(
    Html::create('Input')
        ->setType('submit')
        ->setValue('Добавить')
        ->html()
);

echo $form->html();
