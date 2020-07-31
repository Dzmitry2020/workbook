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
                </div>
            </li>
            <li class="nav-item dropdown<?= ($controllerType == 'cars') ? ' active' : (($controllerType == 'people') ? ' active' : (($controllerType == 'places') ? ' active' : '')) ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Справочники
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?action=show&type=places">Локации</a>
                    <a class="dropdown-item" href="?action=show&type=cars">Транспорт</a>
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
                <a class="nav-link" href="?action=logout&type=login">Выход</a>
            </li>
        </ul>
    </div>
    <span class="navbar-text">
    <?= empty($_SESSION['user']) ? '' : $_SESSION['user']['name'] . ', ' . $_SESSION['user']['group'] ?>
  </span>
</nav>