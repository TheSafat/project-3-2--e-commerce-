<?php
$conn = mysqli_connect('localhost', 'root', '', 'project_db');
if(isset($_GET['cart_id'])){
    $id = $_GET['cart_id'];
    $sql = "DELETE FROM cart_details WHERE product_id=$id";
    mysqli_query($conn, $sql);
    header('location:user_cart.php');
}

?>