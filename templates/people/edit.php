<?php

use TexLab\Html\Html;

/** @var int $id
 * @var string $type
 * @var array $fields
 * @var array $comments
 */

$form = Html::Form()
    ->setMethod('POST')
    ->setAction("?action=edit&type=$type")
    ->setClass('form');

foreach ($fields as $name => $field) {
    $form->addInnerText(Html::Label()
        ->setFor($name)
        ->setInnerText($comments[$name])
        ->html());
    $form->addInnerText(Html::Input()
        ->setName($name)
        ->setId($name)
        ->setType($name == 'driver' ? 'checkbox' : 'text')
        ->setChecked($name == 'driver' ? $field : false)
        ->setValue($field)
        ->html());
}

echo "<br>";
echo $form
    ->addInnerText(Html::Input()
    ->setType('hidden')
    ->setName('id')
    ->setValue($id)
    ->html())
    ->addInnerText(Html::Input()
        ->setType('submit')
        ->setClass('btn btn-success')
        ->setValue('OK')
        ->html())
    ->html();




