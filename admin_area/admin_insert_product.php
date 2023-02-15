<?php
    include('../function/function.php');
    $obj = new CrudApp();

    if(isset($_POST['btn'])){
        if($obj->addProducts($_POST)) echo "product inserted at database";
        // header('location:admin_dashboard.php');
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
    <div class="form-container-bigger">
        <h2 class="text-center text-title">Insert Product here</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <table align="center">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <!-- <td><input type="text" name="discription"></td> -->
                    <td><textarea name="description" id="" cols="70" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="number" name="price"></td>
                </tr>
                <tr>
                    <td>Keyword</td>
                    <td><input type="text" name="keyword"></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td><input type="text" name="category"></td>
                </tr>
                <tr>
                    <td>Discount</td>
                    <td><input type="number" name="discount"></td>
                </tr>
                <tr>
                    <td>Stock</td>
                    <td><input type="number" name="stock"></td>
                </tr>
                <tr>
                    <td>Upload Date</td>
                    <td><input type="date" name="upload_date"></td>
                </tr>
                <tr>
                    <td>Total Sale</td>
                    <td><input type="number" name="total_sale" value="0"></td>
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