<?php

/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $table
 */

use TexLab\Html\Html;

echo "<h2>Ведомость выездов</h2>";

$pageCurrent = $this->data['currentPage'];

echo Html::Table()
    ->setHeaders($comments)
    ->setData($table)
    ->setClass('table shadow ')
    ->html();
