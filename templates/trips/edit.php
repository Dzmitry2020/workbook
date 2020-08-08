<?php

/** @var int $id
 * @var string $type
 * @var array $fields
 * @var array $comments
 * @var array $carsList
 * @var array $driversList
 * @var array $tasksList
 */

use TexLab\Html\Html;

$pageCurrent = $this->data['currentPage'];

$form = Html::Form()
    ->setMethod('POST')
    ->setAction("?action=edit&type=$type&page=$pageCurrent")
    ->setClass('form');

foreach ($fields as $name => $value) {
    $form->addInnerText(Html::Label()->setFor($name)->setInnerText($comments[$name])->html());
    if ($name == 'cars_id') {
        $form->addInnerText(Html::Select()
            ->setName($name)
            ->setId($name)
            ->setData($carsList)
            ->html());
    } elseif ($name == 'people_id') {
        $form->addInnerText(Html::Select()
            ->setName($name)
            ->setId($name)
            ->setData($driversList)
            ->html());
    } elseif ($name == 'tasks_id') {
        $form->addInnerText(Html::Select()
            ->setName($name)
            ->setId($name)
            ->setData($tasksList)
            ->html());
    } else {
        $form->addInnerText(Html::Input()
            ->setName($name)
            ->setId($name)
            ->setValue($value)
            ->html());
    }
}
echo $form->addInnerText(
    Html::Input()
        ->setType('hidden')
        ->setName('id')
        ->setValue($id)
        ->html())
    ->addInnerText(
        Html::Input()
            ->setType('submit')
            ->setClass('btn btn-success')
            ->setValue('OK')
        ->html()
    )
    ->html();
