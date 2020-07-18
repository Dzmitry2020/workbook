<?php

use Core\Config;
use TexLab\MyDB\DB;
use TexLab\MyDB\DbEntity;
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
    } else {
        if ($name == 'date') {
            $form->addContent(Html::create('input')
                ->setType('date')
                ->setName($name)
                ->setId($name)
                ->setValue($value)
                ->html());
        } else {
            if ($name == 'fkPlace') {

                $link = DB::Link([
                    'host' => Config::MYSQL_HOST,
                    'username' => Config::MYSQL_USER_NAME,
                    'password' => Config::MYSQL_PASSWORD,
                    'dbname' => Config::MYSQL_DATABASE
                ]);
                $table1 = new DbEntity('place', $link);
                $table1
                    ->reset()
                    ->setSelect('id, name')
                    ->setOrderBy('name');

                $form->addContent(Html::create('SelectPlace')
                    ->setName($name)
                    ->setId($name)
                    ->setValue($value)
                    ->data($table1->get())
                    ->html());
            } else {
                if ($name == 'status') {
                    $form->addContent(Html::create('SelectStatus')
                        ->setName($name)
                        ->setId($name)
                        ->setValue($value)
                        ->data(Config::TASK_STATUS)
                        ->html());
                } else {
                    $form->addContent(Html::create('input')
                        ->setName($name)
                        ->setId($name)
                        ->setValue($value)
                        ->html());
                }
            }
        }
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
