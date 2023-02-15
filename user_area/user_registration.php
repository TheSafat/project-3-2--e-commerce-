<?php
    include('../function/function.php');
    $obj = new CrudApp();

    if(isset($_POST['btn'])){
        $obj->addData($_POST);
        header('location:user_login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css_folder/style.css">
    <title>Document</title>
</head>
<body>
    <div class="form-container">
        <h2 class="text-center text-title">User Registration</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <table align="center">
                <tr class="margin-20">
                    <td>Name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone"></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="img"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btn" value="Submit"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>