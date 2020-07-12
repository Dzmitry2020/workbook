<?php

use View\Html;
use TexLab\Html\Form;
use TexLab\Html\Input;
use TexLab\Html\Label;
use TexLab\Html\Pagination;
use View\Html\TableEdited;

/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 */

//echo (new Pagination())

//echo $this->data['curPage'];
echo Html::create("Pagination")
    ->setClass('pagination')
    ->setControllerType($type)
    ->setPageCount($pageCount)
    ->setCurPage($this->data['curPage'])
    ->html();


/** @var array $table */
echo (new TableEdited())
    ->setControllerType($type)
    ->setHeaders($comments)
    ->data($table)
    ->setClass('table')
    ->html();

$form = (new Form())
    ->setMethod('POST')
    ->setAction("?action=add&type=$type")
    ->setClass('form');

foreach ($fields as $field) {

    $form->addInnerText((new Label())
        ->setFor($field)
        ->setInnerText($comments[$field])
        ->html());

    $form->addInnerText((new Input())
        ->setName($field)
        ->setId($field)
        ->html());
}

$form->addInnerText(
    (new Input())
        ->setType('submit')
        ->setValue('Добавить')
        ->html()
);

echo $form->html();
