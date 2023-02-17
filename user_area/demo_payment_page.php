<?php
    include('../function/function.php');
    $obj = new CrudApp();

    $conn = $obj->getConnection();
    session_start();
    $user_id = $_SESSION['id'];
    $sql = "SELECT * FROM cart_details WHERE user_id=$user_id";
    $rows = mysqli_query($conn, $sql);

    $total_no_of_item = mysqli_num_rows($rows);
    $total_amount = 0;
    while($row = mysqli_fetch_assoc($rows)){
        $product_id = $row['product_id'];
        $sql2 = "SELECT * FROM products WHERE id=$product_id";
        $rows2 = mysqli_query($conn, $sql2);
        // while($row2  = mysqli_fetch_assoc($rows2)){
        //     $total_amount += $row2['price'];
        // }
        $row2  = mysqli_fetch_assoc($rows2);
        $total_amount += $row2['price'];
    }

    $invoice_number = mt_rand();
    $order_status = "pending";

    $sql = "INSERT INTO user_order (user_id, amount_due, invoice_number, total_products,order_status) VALUES ($user_id, $total_amount, $invoice_number, $total_no_of_item, '$order_status')";
    
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM cart_details WHERE user_id=$user_id";
    mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        h6{
            text-align: center;
            font-size: 50px;
        }
    </style>
    
    <title>Document</title>
    
</head>
<body>
    <h6>DEMO PAYMENT PAGE</h6>
</body>
</html>