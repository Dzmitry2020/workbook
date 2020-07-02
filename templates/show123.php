<?php

use View\Html\Html;

/** @var string $type */
/** @var array $table */
echo  "1212";

echo Html::create('TableEdited')
    ->setControllerType($type)
    ->data($table)
    ->setClass('table')
    ->html();

/** @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 */

$form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=add&type=$type")
    ->setClass('form');

foreach ($fields as $field) {
    $form->addContent(Html::create('Label')->setFor($field)->setInnerText($comments[$field])->html());
    //  $form->addContent(Html::create('checkbox')->setName($field)->setId($field)->html());
    $form->addContent(Html::create('input')->setName($field)->setId($field)->html());
}

$form->addContent(
    Html::create('Input')
        ->setType('submit')
        ->setValue('OK')
        ->html()
);
/** @var array $columnsTypes */
print_r($columnsTypes);
echo "123";

echo $form->html();
