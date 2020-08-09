<?php

/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $table
 */

use TexLab\Html\Html;

echo "<h2>Текущие задачи</h2>";

$pageCurrent = $this->data['currentPage'];

if ($pageCount > 1) {
    echo Html::Pagination()
        ->setClass('pagination')
        ->setUrlPrefix("?action=views&type=" . $type)
        ->setPageCount($pageCount)
        ->setCurrentPage($pageCurrent)
        ->html();
}

foreach ($table as &$row) {
    switch ($row['status']) {
        case 1:
            $row['status'] = '⏹';
            break;
        case 2:
            $row['status'] = '▶';
            break;
        case 3:
            $row['status'] = '⏸️';
            break;
        case 4:
            $row['status'] = '✅';
            break;
    }
}

echo Html::Table()
    ->setHeaders($comments)
    ->setData($table)
    ->setClass('table shadow ')
    ->html();
