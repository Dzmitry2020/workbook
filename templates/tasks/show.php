<?php

//use TexLab\Html\Input;
use View\Html;

/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $placeNamesList
 * @var array $taskStatusList
 */

echo Html::create("Pagination")
    ->setClass('pagination')
    ->setControllerType($type)
    ->setPageCount($pageCount)
    ->setCurPage($this->data['curPage'])
    ->html();

/** @var array $table */
echo Html::create('TableEdited')
    ->setControllerType($type)
    ->setHeaders($comments)
    ->data($table)
    ->setClass('table')
    ->html();


$form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=add&type=$type")
    ->setClass('form');

foreach ($fields as $field) {
    $form->addContent(Html::create('Label')
        ->setFor($field)
        ->setInnerText($comments[$field])
        ->html());

    if (($field == 'content') or ($field == 'comment')) {
        $form->addContent(Html::create('Textarea')
            ->setName($field)
            ->setId($field)
            ->html());
    } elseif ($field == 'date') {
        $form->addContent(Html::create('Input')
            ->setType('date')
            ->setName($field)
            ->setId($field)
            ->setValue(date('Y-m-d'))
            ->html());
    } elseif ($field == 'place_id') {
        $form->addContent(Html::create('Select')
            ->setName($field)
            ->setId($field)
            ->data($placeNamesList)
            ->html());
    } elseif ($field == 'status') {
        $form->addContent(Html::create('Select')
            ->setName($field)
            ->setId($field)
            ->data($taskStatusList)
            ->html());
    }
}

$form->addContent(
    Html::create('Input')
        ->setType('submit')
        ->setValue('Добавить')
        ->html()
);

echo $form->html();
//echo (new Input())->html();
