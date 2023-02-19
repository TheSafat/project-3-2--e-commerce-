<?php
    include('../function/function.php');
    $obj = new CrudApp();

    if(isset($_POST['btn'])){
        $flag = $obj->checkUserLoginData($_POST);

        if($flag){
            echo "login successful";

            $id = $obj->getID($_POST['email']);

            session_start();
            $_SESSION['id'] = $id;
            header('location:../home_page/index.php');
        } else {
            // echo "wrong password";
            echo "<script>alert('wrong password')</script>";
        }
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
        <h2 class="text-center text-title">User Login</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <table align="center">
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btn" value="Submit"></td>
                </tr>
                <tr></tr>
            </table>
        </form>

        <a href="../admin_area/admin_login.php">Admin login here</a>
    </div>
</body>
</html>