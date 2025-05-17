<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ozil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrapBS.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="shasAg-I36c6C11G4L7A9IreMkoa7KxnatzjcD5CmGIWxxSR16AzEV/Dwnykc2MPKBW2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
    <div class="row">
    <div class="col-12">
    <h1>Peruстрация</h1>
    </div>
    <div class="row">
    <div class="col-12">
    <form method="POST" action="registration.php">
    <div class="row form_reg"><input class="form" type="email" name="email" placeholder="Email"></div>
    <div class="row form_reg"><input class="form" type="text" name="login" placeholder="login"></div>
    <div class="row form_reg"><input class="form" type="password" name="password" placeholder="Password"></div>
    <button type="submit" class="btn_red btn_reg" name="submit">Продолжить</button>
    </form>
    </div>
</body>
</html>
<?php
require_once('./bd.php');

$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'firstdb');


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['login'];
    $pass = $_POST['password'];
}

if (!$email || !$username || !$pass) die("Пожалуйста введите все значения!");


$sql = "INSERT INTO users (email, username, pass) VALUES ('$email', '$username', '$pass')";

if(!mysqli_query($link, $sql)){
    echo "Не удалось добавить пользователя";
}

?>
