<?php

use View\Html;

/** @var int $id
 * @var string $type
 * @var array $fields
 * @var array $comments
 */

$form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=edit&type=$type")
    ->setClass('form');

foreach ($fields as $name => $field) {
    $form->addInnerText(Html::create('Label')
        ->setFor($name)
        ->setInnerText($comments[$name])
        ->html());
    $form->addInnerText(Html::create('input')
        ->setName($name)
        ->setId($name)
        ->setType($name == 'Driver' ? 'checkbox' : 'text')
        ->setChecked($name == 'Driver' ? $field : false)
        ->setValue($field)
        ->html());
}

echo $form
    ->addInnerText(Html::create('Input')
    ->setType('hidden')
    ->setName('id')
    ->setValue($id)
    ->html())
    ->addInnerText(Html::create('Input')
        ->setType('submit')
        ->setValue('OK')
        ->html())
    ->html();




