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
    $form->addInnerText(Html::create('Label')
        ->setFor($name)
        ->setInnerText($comments[$name])
        ->html());
    if (($name == 'content') or ($name == 'comment')) {
        $form->addInnerText(Html::create('Textarea')
            ->setName($name)
            ->setId($name)
            ->setInnerText($value)
            ->html());
    } elseif ($name == 'date') {
        $form->addInnerText(Html::create('input')
            ->setType('date')
            ->setName($name)
            ->setId($name)
            ->setValue($value)
            ->html());
    } elseif ($name == 'place_id') {
        $form->addInnerText(Html::create('Select')
            ->setName($name)
            ->setId($name)
            ->setSelectedValue($value)
            ->setData($placeNamesList)
            ->html());
    } elseif ($name == 'status') {
        $form->addInnerText(Html::create('Select')
            ->setName($name)
            ->setId($name)
            ->setSelectedValue($value)
            ->setData($taskStatusList)
            ->html());
    } else {
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
