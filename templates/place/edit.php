<?php

use View\Html\Html;

/** @var int $id
 * @var string $type
 * @var array $fields
 * @var array $comments
 */

$form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=edit&type=$type")
    ->setClass('form');

foreach ($fields as $name => $value) {
    $form->addInnerText(Html::create('Label')
        ->setFor($name)
        ->setInnerText($comments[$name])
        ->html());
    if ($name == 'FullName') {
        $form->addInnerText(Html::create('Textarea')
            ->setName($name)
            ->setId($name)
            ->setInnerText($value)
            ->html());
    }
    else {
        $form->addInnerText(Html::create('input')
            ->setName($name)
            ->setId($name)
            ->setValue($value)
            ->html());
    }
}

echo $form->addInnerText(Html::create('Input')
    ->setType('hidden')
    ->setName('id')
    ->setValue($id)
    ->html())
    ->addInnerText(Html::create('Input')
        ->setType('submit')
        ->setValue('OK')
        ->html())
    ->html();
