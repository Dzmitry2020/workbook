<?php

use TexLab\Html\Html;

/**
 * @var string $type Имя контроллера
 * @var string $action
 */

$form = Html::Form()
    ->setMethod('POST')
    ->setAction($action);

$form->addInnerText(Html::Label()
    ->setInnerText("Login:")
    ->setFor("login")
    ->html());

$form->addInnerText(Html::Input()
    ->setName("login")
    ->setId("login")
    ->setPlaceholder("Your login")
    ->html());

$form->addInnerText(Html::Label()
    ->setInnerText("Password:")
    ->setFor("pass")
    ->html());

$form->addInnerText(Html::Input()
    ->setType('password')
    ->setName("pass")
    ->setId("pass")
    ->setPlaceholder("Your password")
    ->html());

$form->addInnerText(
    Html::Input()
        ->setType('submit')
        ->setValue('Submit')
        ->html()
);

echo $form->html();
