<?php /** @var string $controllerType */ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

<!--<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">-->
    <!--    <a class="navbar-brand" href="#">Navbar</a>-->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item<?= $controllerType == '' ? ' active' : '' ?>">
                <a class="nav-link" href="/">Главная</a>
            </li>
            <li class="nav-item dropdown<?= $controllerType == 'users' ? ' active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Доступ
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?action=show&type=users">Пользователи</a>
                    <a class="dropdown-item" href="/">Группы</a>
<!--                    <div class="dropdown-divider"></div>-->
<!--                    <a class="dropdown-item" href="#">Something else here</a>-->
                </div>
            </li>
            <li class="nav-item<?= $controllerType == 'car' ? ' active' : '' ?>">
                <a class="nav-link" href="?action=show&type=car">Транспорт</a>
            </li>
            <li class="nav-item<?= $controllerType == 'people' ? ' active' : '' ?>">
                <a class="nav-link" href="?action=show&type=people">Персонал</a>
            </li>
            <li class="nav-item<?= $controllerType == 'place' ? ' active' : '' ?>">
                <a class="nav-link" href="?action=show&type=place">Локации</a>
            </li>
            <li class="nav-item<?= $controllerType == 'tasks' ? ' active' : '' ?>">
                <a class="nav-link" href="?action=show&type=tasks">Задачи</a>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="container">
    <div class="jumbotron">
        <?php
        $this->body();
        ?>
    </div>
</main>

<script src="js/jquery-3.5.1.slim.min.js">
    <
    script
    src = "js/popper.min.js" ></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>