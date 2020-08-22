<?php


/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $table
 */

use TexLab\Html\Html;

//echo "<button class=\"btn btn-success mb-1\" data-toggle=\"modal\" data-target=\"#Modal\">
//<i class=\"fa fa-plus\"></i></button>";

if ($pageCount > 1) {
    echo Html::Pagination()
        ->setClass('pagination')
        ->setUrlPrefix("?action=show&type=" . $type)
        ->setPageCount($pageCount)
        ->setCurrentPage($this->data['currentPage'])
        ->html();
}

$comments[] = 'Действия';

$edtA = Html::A()
    ->addInnerText('<i class="fa fa-edit"></i>')
    ->setClass('btn btn-success btn-sm edit');
$delA = Html::A()
    ->addInnerText('<i class="fa fa-trash"></i>')
    ->setClass('btn btn-danger btn-sm del');

foreach ($table as &$row) {
    $row[] = $edtA
            ->setHref("?action=showedit&type=$type&id=$row[id]")
            ->html()
        . "\n"
        . $delA
            ->setHref("?action=del&type=$type&id=$row[id]")
            ->html();
}

echo Html::Table()
    ->setHeaders($comments)
    ->setData($table)
    ->setClass('table table-striped table-dark')
    ->html();

$form = Html::Form()
    ->setMethod('POST')
    ->setAction("?action=add&type=$type")
    ->setClass('form');

foreach ($fields as $field) {

    $form->addInnerText(Html::Label()
        ->setFor($field)
        ->setInnerText($comments[$field])
        ->html());

    $form->addInnerText(Html::Input()
        ->setName($field)
        ->setId($field)
        ->html());
}

$form->addInnerText(
    Html::Input()
        ->setType('submit')
        ->setClass('btn btn-success')
        ->setValue('Добавить')
        ->html()
);

echo $form->html();


//echo <<<HTML
//<div class="modal fade" tabindex="-1" role="dialog" id="Modal">
//    <div class="modal-dialog modal-dialog-centered" role="document">
//        <div class="modal-content shadow">
//            <div class="modal-header">
//                <h5 class="modal-title">Добавить группу</h5>
//                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
//                    <span aria-hidden="true">&times;</span>
//                </button>
//            </div>
//            <div class="modal-body">
//                <form action="?action=add&type=groups" method="post">
//                    <div class="form-group">
//                        <input type="text" class="form-control" name="name" value="" placeholder="Группа">
//                    </div>
//                    <div class="form-group">
//                        <input type="text" class="form-control" name="cod" value="" placeholder="Код доступа">
//                    </div>
//<!--                    <div class="form-group">-->
//<!--                        <textarea class="form-control" name='FullName' id='FullName' placeholder="Код доступа"></textarea>-->
//<!--                    </div>-->
//<!--                    <div class="form-group">-->
//<!--                        <input type="date" class="form-control" name='date' id='date' placeholder="Date"></input>-->
//<!--                    </div>-->
//<!--                    <div class="form-group">-->
//<!--                        <input type="checkbox" name="driver" id="driver"></input>-->
//<!--                        <label>Водитель</label>-->
//<!--                    </div>-->
//            </div>
//            <div class="modal-footer">
//                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
//                <button type="submit" name="" class="btn btn-primary">Добавить</button>
//            </div>
//          </form>
//        </div>
//    </div>
//</div>
//HTML;