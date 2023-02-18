<?php
    $conn = mysqli_connect('localhost', 'root', '', 'project_db');
    $sql = "SELECT * FROM user_order WHERE order_status='pending'";
    $rows = mysqli_query($conn, $sql);
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

    <!-- first child -->

    <table border=1>
        <tr>
            <td>Order ID</td>
            <td>User Id</td>
            <td>Amount Due</td>
            <td>Invoice No</td>
            <td>Total Product</td>
            <td>Order Date</td>
            <td>Order Starus</td>
            <td>Action</td>
        </tr>
        <?php while($row = mysqli_fetch_assoc($rows)){ ?>
        <tr>
            <td> <?php echo $row['order_id'] ?> </td>
            <td> <?php echo $row['user_id'] ?> </td>
            <td> <?php echo $row['amount_due'] ?> </td>
            <td> <?php echo $row['invoice_number'] ?> </td>
            <td> <?php echo $row['total_products'] ?> </td>
            <td> <?php echo $row['order_date'] ?> </td>
            <td> <?php echo $row['order_status'] ?> </td>
            <td> <a href="change_pending_status.php?order_id=<?php echo $row['order_id'] ?>">Change Status</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>