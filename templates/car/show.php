<?php

use View\Html\Html;

/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 */

<<<<<<< Updated upstream
/** @var array $columnsTypes */
//print_r($columnsTypes);

=======
>>>>>>> Stashed changes
echo Html::create("Pagination")
    ->setClass('pagination')
    ->setUrlPrefix('?action=show&type='.$type)
    ->setPageCount($pageCount)
<<<<<<< Updated upstream
    ->html();

/** @var array $table */
echo Html::create('TableEdited')
=======
    ->setCurrentPage($this->data['currentPage'])
    ->html();

/** @var array $table */
echo Html::create("TableEdited")
>>>>>>> Stashed changes
    ->setControllerType($type)
    ->setHeaders($comments)
    ->data($table)
    ->setClass('table')
    ->html();

<<<<<<< Updated upstream

$form = Html::create('Form')
=======
$form = Html::create("Form")
>>>>>>> Stashed changes
    ->setMethod('POST')
    ->setAction("?action=add&type=$type")
    ->setClass('form');


foreach ($fields as $field) {

<<<<<<< Updated upstream
    $form->addContent(Html::create('Label')
=======
    $form->addInnerText(Html::create('Label')
>>>>>>> Stashed changes
        ->setFor($field)
        ->setInnerText($comments[$field])
        ->html());

<<<<<<< Updated upstream
    $form->addContent(Html::create('input')
=======
    $form->addInnerText(Html::create('input')
>>>>>>> Stashed changes
        ->setName($field)
        ->setId($field)
        ->html());
}

<<<<<<< Updated upstream
$form->addContent(
=======
$form->addInnerText(
>>>>>>> Stashed changes
    Html::create('Input')
        ->setType('submit')
        ->setValue('Добавить')
        ->html()
);

echo $form->html();
