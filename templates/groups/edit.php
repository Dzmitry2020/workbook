<?php


/** @var int $id
 * @var string $type
 * @var array $fields
 * @var array $comments
 */

use TexLab\Html\Html;

$form = Html::Form()
    ->setMethod('POST')
    ->setAction("?action=edit&type=$type")
    ->setClass('form');

foreach ($fields as $name => $value) {

    $form->addInnerText(Html::Label()
        ->setFor($name)
        ->setInnerText($comments[$name])
        ->html());

    $form->addInnerText(Html::Input()
        ->setName($name)
        ->setId($name)
        ->setValue($value)
        ->html());
}

echo $form->addInnerText(Html::Input()
    ->setType('hidden')
    ->setName('id')
    ->setValue($id)
    ->html())
    ->addInnerText(Html::Input()
        ->setType('submit')
        ->setValue('OK')
        ->html())
    ->html();
