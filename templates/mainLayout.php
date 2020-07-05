<?php /** @var string $controllerType */ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!--    <a class="navbar-brand" href="#">Navbar</a>-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item<?= $controllerType == '' ? ' active' : '' ?>">
                <a class="nav-link" href="/">Главная</a>
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
        </ul>
    </div>
</nav>

<?php
$this->body();
?>
<script src="js/jquery-3.5.1.slim.min.js">
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>