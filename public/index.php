<?php

session_start();

require '../vendor/autoload.php';

(new Core\Dispatcher())->run();

//use TexLab\MyDB\DbEntity;
//use TexLab\MyDB\DB;

//$link = DB::Link([
//    'host' => 'localhost',
//    'username' => 'root',
//    'password' => 'root',
//    'dbname' => 'smart_db'
//]);
//
//$table1 = new DbEntity('car', $link);

//$table1->add([
//    'name' => 'Peter',
//    'description' => 'Director'
//]);
//
//$table1->add([
//    'name' => 'Ivan',
//    'description' => 'Manager'
//]);

//$table1->add([
//    'name' => 'Alex',
//    'description' => 'Manager'
//]);

//$table1->edit(['id' => 2], [
//    'name' => 'Robert',
//    'description' => 'Manager'
//]);

//$table1->del(['id' => 3]);

//echo json_encode($table1->get());

//echo json_encode($table1->runSQL("SELECT * FROM table1"));

//echo json_encode(
//    $table1
//        ->reset()
//        ->setSelect('id, name')
//        ->setWhere("name like 'A%'")
//        ->get()
//);

//$table1
//    ->reset()
//    ->setSelect('name, description')
//    ->setWhere("description = 'Manager'")
//    ->setOrderBy('name');

//$table1->setSelect('*');

//echo $table1->setPageSize(2)->pageCount();
//echo json_encode($table1->setPageSize(3)->getPage(1));

//echo json_encode(
//    $table1->get()
//);