<?php

use View\Html;

/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 */

/** @var array $columnsTypes */

echo Html::create('Pagination')
    ->setClass('pagination')
    ->setUrlPrefix("?action=show&type=".$type)
    ->setPageCount($pageCount)
    ->setCurrentPage($this->data['currentPage'])
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

    $form->addInnerText(Html::create('Label')
        ->setFor($field)
        ->setInnerText($comments[$field])
        ->html());

    if ($field == 'FullName'){
        $form->addInnerText(Html::create('Textarea')
            ->setName($field)
            ->setId($field)
            ->html());
    }
    else {
        $form->addInnerText(Html::create('input')
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
