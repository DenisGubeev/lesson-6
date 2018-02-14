<?php
if (isset($_FILES['myfile'])) {
    $file = $_FILES['myfile'];
}
    $uploadfile = '/' . basename($_FILES['testfile']['name']);
    if (!empty($file['name']) && $file['error'] == UPLOAD_ERR_OK && 
    move_uploaded_file($file['tmp_name'], __DIR__ . '/*.json')) {
        echo 'Файл загружен';
} else {
    echo 'Файл не загружен, попробуйте еще раз.';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="styles/admin.css">
</head>
<body>

<?php if (isset($_POST['upload'])): ?>
    <a href="<?php $_SERVER['HTTP_REFERER'] ?>"><div>< Назад</div></a>
    <?php echo $result; ?>
    <h1>Служебная информация:</h1>
    <pre>
        <?php print_r($allFiles); ?>
        <hr>
        <?php print_r($_FILES); ?>
    </pre>
<?php endif; ?>

    <form  method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Загрузите свой тест в формате json</legend>
            <input type="file" name="testfile" id="uploadfile" required>
            <input type="submit" value="Добавить в базу" name="upload">
        </fieldset>
    </form>

    <div class="all-tests">
        <fieldset>
            <a href="list.php">Посмотреть все тесты >></a>
        </fieldset>
    </div>
</body>
</html>
