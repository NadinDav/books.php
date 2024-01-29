<?php
$connect = mysqli_connect(  'localhost',  'root', '', 'box');

$query = "SELECT * FROM users";

$result = mysqli_query($connect, $query);

$users = mysqli_fetch_all($result);


foreach ($users as $key => $user){
    $query = 'select * from books where parent_id='.$user[0]. ' ORDER BY name DESC';
    $result = mysqli_query($connect, $query);
    $books = mysqli_fetch_all($result);
    $users[$key]['books'] = $books;
}

mysqli_close($connect);

//print_r($users);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>пример</title>
</head>
<body>
<h1>Авторы</h1>
<?php
    foreach($users as $key => $user){
        echo "<ul> <b> <a href='authors.php?id=$user[0]'> $user[1] $user[2]</b></a> </ul>";
    foreach ($user['books'] as $keyBook => $book){
        echo "<li> <a href='book.php?id=$book[0]'> $book[1]</a> </li>";
        }
    echo "</ul>";
    }
?>
</body>
</html>




