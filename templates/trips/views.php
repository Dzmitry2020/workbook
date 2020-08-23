<?php

/**
 * @var array $comments Комментарии к полям таблицы
 * @var array $table
 */

use TexLab\Html\Html;

echo "<h2>Журнал выездов</h2>";

$pageCurrent = $this->data['currentPage'];

echo Html::Table()
    ->setHeaders($comments)
    ->setData($table)
    ->setClass('table')
    ->html();
