<?php

use View\Html;

/** @var int $id
 * @var string $type
 * @var array $fields
 * @var array $comments
 * @var array $placeNamesList
 * @var array $taskStatusList
 */

$form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=edit&type=$type")
    ->setClass('form');

foreach ($fields as $name => $value) {
    $form->addContent(Html::create('Label')
        ->setFor($name)
        ->setInnerText($comments[$name])
        ->html());
    if (($name == 'content') or ($name == 'comment')) {
        $form->addContent(Html::create('Textarea')
            ->setName($name)
            ->setId($name)
            ->setInnerText($value)
            ->html());
    } elseif ($name == 'date') {
        $form->addContent(Html::create('input')
            ->setType('date')
            ->setName($name)
            ->setId($name)
            ->setValue($value)
            ->html());
    } elseif ($name == 'place_id') {
        $form->addContent(Html::create('Select')
            ->setName($name)
            ->setId($name)
            ->setValue($value)
            ->data($placeNamesList)
            ->html());
    } elseif ($name == 'status') {
        $form->addContent(Html::create('Select')
            ->setName($name)
            ->setId($name)
            ->setValue($value)
            ->data($taskStatusList)
            ->html());
    } else {
        $form->addContent(Html::create('input')
            ->setName($name)
            ->setId($name)
            ->setValue($value)
            ->html());
    }
}

echo $form->addContent(Html::create('Input')
    ->setType('hidden')
    ->setName('id')
    ->setValue($id)
    ->html())
    ->addContent(Html::create('Input')
        ->setType('submit')
        ->setValue('OK')
        ->html())
    ->html();
