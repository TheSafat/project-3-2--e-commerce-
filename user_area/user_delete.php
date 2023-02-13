<?php
include('../function/function.php');

$obj = new CrudApp();

if(isset($_GET['status'])){
    if($_GET['status']=='delete'){
        $id = $_GET['id'];
        $obj->deleteData($id);
    }
}

?>