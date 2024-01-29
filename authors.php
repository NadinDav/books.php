<?php
$id = $_GET['id'];

$connect = mysqli_connect(  'localhost',  'root', '', 'box');

$query = "SELECT * FROM users where id=" .$id;

$result = mysqli_query($connect, $query);

$users = mysqli_fetch_row($result);

$query = "SELECT * FROM books where parent_id=" .$id;

$result = mysqli_query($connect, $query);

$books = mysqli_fetch_all($result);

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
    echo "$users[1] $users[2]";
    ?>
</h1>
<?php

    echo "<ul>";
    foreach ($books as $keyBook => $book){
        echo "<li> <a href='book.php?id=$book[0]'> $book[1]</a> </li>";
    }
    echo "</ul>";
?>
</body>
</html>
