<?php
    $conn = mysqli_connect('localhost', 'root', '', 'project_db');
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        
        $sql = "UPDATE user_order SET order_status='delivery complete' WHERE order_id='$order_id'";
        mysqli_query($conn, $sql);

        header('location:admin_show_all_pending_order.php');
    }


?>