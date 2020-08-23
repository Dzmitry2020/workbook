<?php /** @var string $controllerType */ ?>
<nav class="navbar navbar-expand-sm fixed-top navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item<?= $controllerType == 'tasks' ? ' active' : '' ?>">
                <a class="nav-link" href="?action=views&type=tasks"><i class='fa fa-tasks'></i> Задачи</a>
            </li>
            <li class="nav-item<?= $controllerType == 'trips' ? ' active' : '' ?>">
                <a class="nav-link" href="?action=views&type=trips"><i class='fa fa-road'></i> Поездки</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?action=logout&type=login">Выход <i class='fa fa-sign-out-alt'></i></a>
            </li>
        </ul>
    </div>
    <span class="navbar-text">
    <?= empty($_SESSION['user']) ? '' : $_SESSION['user']['name'] . ', ' . $_SESSION['user']['group'] ?>
  </span>
</nav>