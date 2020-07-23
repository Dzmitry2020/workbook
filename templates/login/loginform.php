<?php

use TexLab\Html\Html;

/**
 * @var string $type Имя контроллера
 *
 * @var string $action
 */

$form = Html::Form()
    ->setMethod('POST')
    ->setAction($action)
    ->setClass('form-log');

$form->addInnerText(Html::Label()
    ->setInnerText("Логин:")
    ->setFor("login")
    ->html());

$form->addInnerText(Html::Input()
    ->setName("login")
    ->setId("login")
//    ->setPlaceholder("Введите логин")
    ->html());

$form->addInnerText(Html::Label()
    ->setInnerText("Пароль:")
    ->setFor("pass")
    ->html());

$form->addInnerText(Html::Input()
    ->setType('password')
    ->setName("pass")
    ->setId("pass")
//    ->setPlaceholder("Введите пароль")
    ->html());

$form->addInnerText(
    Html::Input()
        ->setType('submit')
        ->setValue('Войти')
        ->html()
);

echo $form->html();
