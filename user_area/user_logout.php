<?php
    session_start();
    session_destroy();

    $conn = mysqli_connect('localhost', 'root', '', 'project_db');
    $sql = "DELETE FROM cart_details";
    mysqli_query($conn, $sql);

    header('location:../home_page/index.php');
?>