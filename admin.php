<?php
if (isset($_FILES['myfile'])) {
    $file = $_FILES['myfile'];
}
$uploadfile = 'tests/' . basename($_FILES['myfile']['name']);
 if (!empty($file['name']) && $file['error'] == UPLOAD_ERR_OK && 
 move_uploaded_file($file['tmp_name'], $uploadfile)) {
    echo 'Файл загружен';
} else {
    echo 'Файл не загружен, попробуйте еще раз.';
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
</head>
<body>

<?php if (isset($_POST['myfile'])): ?>
    <a href="<?php $_SERVER['HTTP_REFERER'] ?>"><div>Назад</div></a>
    <?php echo $result; ?>
    <h1>Информация:</h1>
    <pre>
        <?php print_r($_FILES); ?>
    </pre>
<?php endif; ?>

    <form  method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Загрузите свой тест в формате json</legend>
            <input type="file" name="testfile" required>
            <input type="submit" value="Добавить в базу" name="myfile">
        </fieldset>
    </form>

    <div>
        <fieldset>
            <a href="list.php">Посмотреть все тесты >></a>
        </fieldset>
    </div>
</body>
</html>
