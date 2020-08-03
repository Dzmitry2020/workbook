<?php
/** @var string $controllerType */
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/all.css" >
</head>

<body>

<?php
switch ($_SESSION['user']['cod']) {
    case 'admin':
        include 'adminmenu.php';
        break;
    case 'user':
        include 'usermenu.php';
        break;
    default:
        include 'guestmenu.php';
}
?>

<main role="main" class="container">
    <div class="container-fluid" style="margin-top:80px">
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