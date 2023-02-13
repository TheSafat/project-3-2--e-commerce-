<?php
    include('../function/function.php');
    $obj = new CrudApp();

    if(isset($_POST['btn'])){
        $obj->updateData($_POST);
    }

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
    
<div class="form-container">
        <h2 class="text-center text-title">User Update</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <table align="center">
                <tr class="margin-20">
                    <td>Name</td>
                    <td><input type="text" name="name" value="<?php echo $row['name'] ?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value="<?php echo $row['email'] ?>"></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" value="<?php echo $row['phone'] ?>"></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" value="<?php echo $row['address'] ?>"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password" value="<?php echo $row['password'] ?>"></td>
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