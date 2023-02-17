<?php
include('../function/function.php');

$obj = new CrudApp();

// echo "ok";

if(isset($_GET['status'])){
    if($_GET['status']=='delete'){
        $id = $_GET['id'];
        $obj->deleteProduct($id);
    }
}

?>