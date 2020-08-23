<nav class="navbar navbar-expand-sm fixed-top navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown<?= ($controllerType == 'tasks') ? ' active' : (($controllerType == 'trips') ? ' active' : '') ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class='fa fa-dice-d20'></i> Работы
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?action=show&type=tasks"><i class='fa fa-tasks'></i> Задания</a>
                    <a class="dropdown-item" href="?action=show&type=trips"><i class='fa fa-road'></i> Поездки</a>
                </div>
            </li>
<!--            <li class="nav-item--><?//= $controllerType == 'tasks' ? ' active' : '' ?><!--">-->
<!--                <a class="nav-link" href="?action=show&type=tasks"><i class='fa fa-tasks'></i> Задачи</a>-->
<!--            </li>-->
<!--            <li class="nav-item--><?//= $controllerType == 'trips' ? ' active' : '' ?><!--">-->
<!--                <a class="nav-link" href="?action=show&type=trips"><i class='fa fa-road'></i> Поездки</a>-->
<!--            </li>-->
            <li class="nav-item">
                <a class="nav-link" href="?action=logout&type=login">Выход <i class='fa fa-sign-out-alt'></i></a>
            </li>
        </ul>
    </div>
    <span class="navbar-text">
    <?= empty($_SESSION['user']) ? '' : $_SESSION['user']['name'] . ', ' . $_SESSION['user']['group'] ?>
  </span>
</nav>