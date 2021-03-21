<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php require_once APP.'/Views/partials/header_scripts.php' ?>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
<div class="header">
    <a href="#" id="menu-action">
        <i class="fa fa-bars"></i>
        <span>Close</span>
    </a>
    <div class="logo">
        Admin Panel
    </div>
</div>
<?php require_once APP.'/Views/partials/sidebar.php' ?>
<!-- Content -->
<div class="main">
    <?= show_flash_message() ?>
    <?= $content ?>
</div>
</body>
</html>
