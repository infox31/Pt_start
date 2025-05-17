<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Озембловский Тимофей</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container nav_bar">
        <div class="row">
            <div class="col-3 nav_logo"></div>
            <div class="col-9">
                <div class="nav_text">Информация о зоопарке</div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>Меня зовут Тимофей</h2>
                <p id="text">Текст для изменения цвета</p>
            </div>
            <div class="col-4">
                <img class="img_size" src="photo/images.jpg" alt="my_photo">
            </div>
        </div>

        <div class="container mt-3">
            <div class="row">
                <div class="col-12">
                    <button id="button" class="btn btn-primary">(-_-)</button>
                </div>
                <p id="demo" class="mt-2"></p>
            </div>
        </div>
    </div>


<div class="row">
    <form class="form_align" method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
    <input type="text" class="form form_width" type="text" name="title" placeholder="Saronosok вашего поста">
    <textarea name="text" class="form_width" rows="18" placeholder="Введите текст вашего поста ..."></textarea>
    <input type="file" name="file" /><br>
    <button type="submit" class="btn_red" name="submit" value="upload">Сохранить пост!</button>
</form>
</div>


    <script src="js/button.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>





<?php
require_once('./bd.php');

$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'firstdb');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];
    if (!$title || !$main_text) die("Заполните все поля");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if(!mysqli_query($link, $sql)) {
        die("не удалось добавить пост");
    }
    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 10002400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
}
?>
