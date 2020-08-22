<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
<!--            <li class="nav-item--><?//= ($controllerType == 'default') ? ' active' : '' ?><!--">-->
<!--                <a class="nav-link" href="?action=default&type=default"><i class='fa fa-home'></i> Главная</a>-->
<!--            </li>-->
            <li class="nav-item dropdown<?= ($controllerType == 'users') ? ' active' : (($controllerType == 'groups') ? ' active' : '') ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class='fa fa-key'></i>
                    Доступ
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?action=show&type=users"><i class='fa fa-users'></i> Пользователи</a>
                    <a class="dropdown-item" href="?action=show&type=groups"><i class='fa fa-shield-alt'></i> Группы</a>
                </div>
            </li>
            <li class="nav-item dropdown<?= ($controllerType == 'cars') ? ' active' : (($controllerType == 'people') ? ' active' : (($controllerType == 'places') ? ' active' : '')) ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class='fa fa-book'></i> Справочники
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?action=show&type=places"><i class='fa fa-globe'></i> Локации</a>
                    <a class="dropdown-item" href="?action=show&type=cars"><i class='fa fa-car-side'></i> Транспорт</a>
                    <a class="dropdown-item" href="?action=show&type=people"><i class='fa fa-id-card-alt'></i> Персонал</a>
                </div>
            </li>
            <li class="nav-item dropdown<?= ($controllerType == 'tasks') ? ' active' : (($controllerType == 'trips') ? ' active' : '') ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class='fa fa-dice-d20'></i> Работы
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?action=show&type=tasks"><i class='fa fa-tasks'></i> Задачи</a>
                    <a class="dropdown-item" href="?action=show&type=trips"><i class='fa fa-road'></i> Поездки</a>
                </div>
            </li>
            <li class="nav-item<?= $controllerType == 'classes' ? ' active' : '' ?>">
                <a class="nav-link" href="?action=logout&type=login">Выход <i class='fa fa-sign-out-alt'></i></a>
            </li>
        </ul>
    </div>
    <span class="navbar-text">
    <?= empty($_SESSION['user']) ? '' : $_SESSION['user']['name'] . ', ' . $_SESSION['user']['group'] ?>
  </span>
</nav>