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

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item<?= $controllerType == '' ? ' active' : '' ?>">
                <a class="nav-link" href="?action=default&type=default">Главная</a>
            </li>
            <li class="nav-item dropdown<?= ($controllerType == 'users') ? ' active' : (($controllerType == 'groups') ? ' active' : '') ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Доступ
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?action=show&type=users">Пользователи</a>
                    <a class="dropdown-item" href="?action=show&type=groups">Группы</a>
                    <!--                    <div class="dropdown-divider"></div>-->
                    <!--                    <a class="dropdown-item" href="#">Something else here</a>-->
                </div>
            </li>
            <li class="nav-item dropdown<?= ($controllerType == 'car') ? ' active' : (($controllerType == 'people') ? ' active' : (($controllerType == 'place') ? ' active' : '')) ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Справочники
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?action=show&type=place">Локации</a>
                    <a class="dropdown-item" href="?action=show&type=car">Транспорт</a>
                    <a class="dropdown-item" href="?action=show&type=people">Персонал</a>
                </div>
            </li>
            <li class="nav-item<?= $controllerType == 'tasks' ? ' active' : '' ?>">
                <a class="nav-link" href="?action=show&type=tasks">Задачи</a>
            </li>
            <!--			<li class="nav-item--><? //= $controllerType == 'classes' ? ' active' : '' ?><!--">-->
            <!--                <a class="nav-link" href="?action=loginform&type=login">Logform</a>-->
            <!--            </li>-->
            <li class="nav-item<?= $controllerType == 'classes' ? ' active' : '' ?>">
                <a class="nav-link" href="?action=logout&type=login">Выход<img src="/img/account-logout.svg" alt="Logout" width="24" height="24" title="Logout"></a>
            </li>
        </ul>
    </div>
    <span class="navbar-text">
    <?= empty($_SESSION['user']) ? '' : $_SESSION['user']['name'] . ', ' . $_SESSION['user']['group'] ?>
  </span>
</nav>


<main role="main" class="container">
    <div class="container-fluid" style="margin-top:80px">
<!--        <span class="glyphicon glyphicon-search">Logout</span>-->

        <?php
        $this->body();
        ?>
    </div>
</main>

<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/my.js"></script>
</body>

</html>