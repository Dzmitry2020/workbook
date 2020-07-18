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
    ->setUrlPrefix('?action=show&type='.$type)
    ->setPageCount($pageCount)
<<<<<<< Updated upstream
=======
    ->setCurrentPage($this->data['currentPage'])
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
    $form->addContent(Html::create('Label')
=======

    $form->addInnerText(Html::create('Label')
>>>>>>> Stashed changes
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
