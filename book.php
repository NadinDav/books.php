<?php
$id = $_GET['id'];

$connect = mysqli_connect(  'localhost',  'root', '', 'box');

$query = "SELECT * FROM books where id=" .$id;

$result = mysqli_query($connect, $query);

$books = mysqli_fetch_row($result);

mysqli_close($connect);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>пример</title>
</head>
<body>
<h1>
    <?php
    echo "$books[1]";
    ?>
</h1>
<?php

echo "<p> $books[3] </p>";

?>
</body>
</html>
