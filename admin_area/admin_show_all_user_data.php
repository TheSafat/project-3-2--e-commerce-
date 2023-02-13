<?php
    include('../function/function.php');

    $objCrudAdmin = new CrudApp();

    if(isset($_POST['btn'])){
        $objCrudAdmin->addData($_POST);
    }

    $rows = $objCrudAdmin->displayData();

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
            <td>Image</td>
        </tr>
        <?php while($row = mysqli_fetch_assoc($rows)){ ?>
        <tr>
            <td> <?php echo $row['id'] ?> </td>
            <td> <?php echo $row['name'] ?> </td>
            <td> <?php echo $row['email'] ?> </td>
            <td> <?php echo $row['phone'] ?> </td>
            <td> <?php echo $row['address'] ?> </td>
            <td> <?php echo $row['password'] ?> </td>
            <td><img height="100px" src="../user_area/upload/<?php echo $row['img'] ?>" alt=""></td>
            <td><a href="../user_area/user_update.php?status=edit&&id=<?php echo $row['id'] ?>">Edit</a></td>
            <td><a href="../user_area/user_delete.php?status=delete&&id=<?php echo $row['id'] ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>