<?php

use TexLab\Html\Html;

/** @var int $id
 * @var string $type
 * @var string $page
 * @var array $fields
 * @var array $comments
 * @var array $placeNamesList
 * @var array $taskStatusList
 * @var array $workerNameList
 */


$form = Html::Form()
    ->setMethod('POST')
    ->setAction("?action=edit&type=$type&page=$page")
    ->setClass('form');

foreach ($fields as $name => $value) {
    $form->addInnerText(Html::Label()
        ->setFor($name)
        ->setInnerText($comments[$name])
        ->html());
    if (($name == 'content') or ($name == 'comment')) {
        $form->addInnerText(Html::Textarea()
            ->setName($name)
            ->setId($name)
            ->setInnerText($value)
            ->html());
    } elseif ($name == 'date') {
        $form->addInnerText(Html::Input()
            ->setType('date')
            ->setName($name)
            ->setId($name)
            ->setValue($value)
            ->html());
    } elseif ($name == 'place_id') {
        $form->addInnerText(Html::Select()
            ->setName($name)
            ->setId($name)
            ->setSelectedValue($value)
            ->setData($placeNamesList)
            ->html());
    } elseif ($name == 'status') {
        $form->addInnerText(Html::Select()
            ->setName($name)
            ->setId($name)
            ->setSelectedValue($value)
            ->setData($taskStatusList)
            ->html());
    } else {
        $form->addInnerText(Html::Input()
            ->setName($name)
            ->setId($name)
            ->setValue($value)
            ->html());
    }
}

$form->addInnerText(Html::Label()
    ->setFor('workers')
    ->setInnerText('Исполнители')
    ->html());

$form->addInnerText(Html::Select()
    ->setName('workers')
    ->setId('workers')
    ->setData($workerNameList)
    ->setSize(5)
    ->setMultiple(1)
    ->html());

echo $form->addInnerText(Html::Input()
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
