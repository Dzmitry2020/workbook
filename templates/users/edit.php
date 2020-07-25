<?php

use TexLab\Html\Html;

/** @var int $id
 * @var string $type
 * @var array $fields
 * @var array $comments
 * @var array $groupsList
 */

$form = Html::Form()
    ->setMethod('POST')
    ->setAction("?action=edit&type=$type")
    ->setClass('form');

foreach ($fields as $name => $value) {

    $form->addInnerText(Html::Label()
        ->setFor($name)
        ->setInnerText($comments[$name])
        ->html());
    if ($name == 'password') {
        $form->addInnerText(Html::Input()
            ->setType('password')
            ->setName($name)
            ->setId($name)
            ->setValue($value)
            ->html());
    } elseif ($name == 'group_id') {

        $form->addInnerText(Html::Select()
            ->setName($name)
            ->setId($name)
            ->setSelectedValue($value)
            ->setData($groupsList)
            ->html());
    } else {
        $form->addInnerText(Html::Input()
            ->setName($name)
            ->setId($name)
            ->setValue($value)
            ->html());
    }
}
echo "<br>";

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
