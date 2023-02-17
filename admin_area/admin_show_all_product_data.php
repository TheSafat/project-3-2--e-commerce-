<?php
    include('../function/function.php');

    $objCrudAdmin = new CrudApp();

    $rows = $objCrudAdmin->displayProducts();

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
    <table border=1>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Brand</td>
            <td>Country of Origin</td>
            <td>Warranty</td>
            <td>Description</td>
            <td>Price</td>
            <td>Keyword</td>
            <td>Category</td>
            <td>Discount</td>
            <td>Stock</td>
            <td>Upload Date</td>
            <td>Total Sale</td>
            <td>Image</td>
        </tr>
        <?php while($row = mysqli_fetch_assoc($rows)){ ?>
        <tr>
            <td> <?php echo $row['id'] ?> </td>
            <td> <?php echo $row['title'] ?> </td>
            <td> <?php echo $row['brand'] ?> </td>
            <td> <?php echo $row['country_of_origin'] ?> </td>
            <td> <?php echo $row['warranty'] ?> years </td>
            <td> <?php echo $row['description'] ?> </td>
            <td> <?php echo $row['price'] ?> </td>
            <td> <?php echo $row['keyword'] ?> </td>
            <td> <?php echo $row['category'] ?> </td>
            <td> <?php echo $row['discount'] ?> </td>
            <td> <?php echo $row['stock'] ?> </td>
            <td> <?php echo $row['upload_date'] ?> </td>
            <td> <?php echo $row['total_sale'] ?> </td>
            <td><img height="100px" src="../admin_area/product_images/<?php echo $row['img'] ?>" alt=""></td>
            <td><a href="./admin_product_update.php?status=edit&&id=<?php echo $row['id'] ?>">Edit</a></td>
            <td><a href="./admin_product_delete.php?status=delete&&id=<?php echo $row['id'] ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>