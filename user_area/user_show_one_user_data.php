<?php
    include('../function/function.php');
    $obj = new CrudApp();

    session_start();
    $id = $_SESSION['id'];
    $row = $obj->displayDataByID($id);
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
<table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Address</td>
            <td>Password</td>
            <td>Img</td>
        </tr>
        <tr>
            <td> <?php echo $row['id'] ?> </td>
            <td> <?php echo $row['name'] ?> </td>
            <td> <?php echo $row['email'] ?> </td>
            <td> <?php echo $row['phone'] ?> </td>
            <td> <?php echo $row['address'] ?> </td>
            <td> <?php echo $row['password'] ?> </td>
            <td> <?php echo $row['img'] ?> </td>
            <td><img height="100px" src="upload/<?php echo $row['img'] ?>" alt=""></td>
            <td><a href="user_update.php?status=edit&&id=<?php echo $row['id'] ?>">Edit</a></td>
            <td><a href="user_delete.php?status=delete&&id=<?php echo $row['id'] ?>">Delete</a></td>
        </tr>
    </table>
</body>
</html>