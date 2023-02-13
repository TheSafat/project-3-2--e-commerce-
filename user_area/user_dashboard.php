<?php
include('../function/function.php');

$obj = new CrudApp();

session_start();

$id = $_SESSION['id'];

$name = $obj->getName($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome <?php echo $name ?> </h1> <br>
    <a href="user_show_one_user_data.php?id=<?php echo $id ?>">User Profile</a>
</body>
</html>