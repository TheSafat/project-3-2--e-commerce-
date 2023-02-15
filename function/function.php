<?php

class CrudApp{
    private $conn;
    public function __construct(){
        $this->conn = mysqli_connect('localhost', 'root', '', 'project_db');
    }

    public function addProducts($data){
        $title = $data['title'];
        $description = $data['description'];
        $price = $data['price'];
        $keyword = $data['keyword'];
        $category = $data['category'];
        $discount = $data['discount'];
        $stock = $data['stock'];
        $upload_date = $data['upload_date'];
        $total_sale = $data['total_sale'];

        $img_name = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];

        $sql = "INSERT INTO products (title, description, price, keyword, category, discount, stock, upload_date, total_sale, img) VALUES ('$title', '$description', $price, '$keyword', '$category', $discount, $stock, '$upload_date', $total_sale, '$img_name')";

        if(mysqli_query($this->conn, $sql)){
            echo "Data inserted successfully";
            move_uploaded_file($tmp_name, 'product_images/' . $img_name);
        }
    }

    public function addData($data){
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $address = $data['address'];
        $password = $data['password'];

        $img_name = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];

        $sql = "INSERT INTO user (name, email, phone, address, password, img) VALUES ('$name', '$email', '$phone', '$address', '$password', '$img_name')";

        if(mysqli_query($this->conn, $sql)){
            echo "Data inserted successfully";
            move_uploaded_file($tmp_name, 'upload/' . $img_name);
        }
    }

    public function checkUserLoginData($data){
        $login_email = $data['email'];
        $login_password = $data['password'];        

        $sql = "SELECT * FROM user WHERE email='$login_email'";        
        $rows = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($rows);

        if($row['email'] == $login_email && $row['password']==$login_password){
            return true;
        } else {
            return false;
        } 
    }

    public function getID($email){
        $sql = "SELECT * FROM user WHERE email='$email'";
        $rows = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($rows);

        $result = $row['id'];
        return $result;
    }

    public function getName($id){
        $sql = "SELECT * FROM user WHERE id='$id'";
        $rows = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($rows);

        $result = $row['name'];
        return $result;
    }

    public function checkAdminLoginData($data){
        $login_email = $data['email'];
        $login_password = $data['password'];        

        $sql = "SELECT * FROM admins WHERE email='$login_email'";        
        $rows = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($rows);

        if($row['email'] == $login_email && $row['password']==$login_password){
            return true;
        } else {
            return false;
        } 
    }

    public function displayData(){
        $sql = "SELECT * FROM user";
        $result = mysqli_query($this->conn, $sql);
        //$row = mysqli_fetch_assoc($result);
        return $result;
    }

    public function deleteData($id){
        $sql = "DELETE FROM user WHERE id=$id";
        mysqli_query($this->conn, $sql);
    }

    public function displayDataByID($id){
        $sql = "SELECT * FROM user WHERE id=$id";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function updateData($data){
        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $address = $data['address'];
        $password = $data['password'];

        $img_name = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];

        $sql = "UPDATE user SET name='$name', email='$email', phone='$phone', address='$address', password='$password',  img='$img_name' WHERE id=$id";

        if(mysqli_query($this->conn, $sql)){
            move_uploaded_file($tmp_name, 'upload/' . $img_name);
            echo "update successful";
        }
    }
}


?>