<?php

<<<<<<< Updated upstream
use Core\Config;
=======
>>>>>>> Stashed changes
use View\Html\Html;

/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 */

echo Html::create("Pagination")
    ->setClass('pagination')
    ->setUrlPrefix('?action=show&type='.$type)
    ->setPageCount($pageCount)
<<<<<<< Updated upstream
=======
    ->setCurrentPage($this->data['currentPage'])
>>>>>>> Stashed changes
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
    $form->addInnerText(Html::create('Label')
        ->setFor($field)
        ->setInnerText($comments[$field])
        ->html());

    if (($field == 'content') or ($field == 'comment')) {
        $form->addInnerText(Html::create('Textarea')
            ->setName($field)
            ->setId($field)
            ->html());
<<<<<<< Updated upstream
    } else {
        if ($field == 'date') {
            $form->addContent(Html::create('input')
                ->setType('date')
                ->setName($field)
                ->setId($field)
                ->setValue(date('Y-m-d'))
                ->html());
            //kjlkjflkjdl
        } else {
            if ($field == 'fkPlace') {
                /** @var array $placeNamesList */
                $form->addContent(Html::create('Select')
                    ->setName($field)
                    ->setId($field)
                    ->data($placeNamesList)
                    ->html());
            } else {
                if ($field == 'status') {
                    $form->addContent(Html::create('Select')
                        ->setName($field)
                        ->setId($field)
                        ->data(Config::TASK_STATUS)
                        ->html());
                } else {
                    $form->addContent(Html::create('input')
                        ->setName($field)
                        ->setId($field)
                        ->html());
                }
            }
        }
=======
    } elseif ($field == 'date') {
        $form->addInnerText(Html::create('Input')
            ->setType('date')
            ->setName($field)
            ->setId($field)
            ->setValue(date('Y-m-d'))
            ->html());
    } elseif ($field == 'place_id') {
        $form->addInnerText(Html::create('Select')
            ->setName($field)
            ->setId($field)
            ->setData($placeNamesList)
            ->html());
    } elseif ($field == 'status') {
        $form->addInnerText(Html::create('Select')
            ->setName($field)
            ->setId($field)
            ->setData($taskStatusList)
            ->html());
>>>>>>> Stashed changes
    }
}

$form->addInnerText(
    Html::create('Input')
        ->setType('submit')
        ->setValue('Добавить')
        ->html()
);

echo $form->html();
