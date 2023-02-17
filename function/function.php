<?php

class CrudApp{
    private $conn;
    // private $count_cart_item;

    public function __construct(){
        $this->conn = mysqli_connect('localhost', 'root', '', 'project_db');
        // echo "okkk";
    }

    public function getConnection(){
        echo "connection ok";
        return $this->conn;
    }

    public function addProducts($data){
        $title = $data['title'];
        $brand = $data['brand'];
        $country_of_origin = $data['country_of_origin'];
        $warranty = $data['warranty'];
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

        $sql = "INSERT INTO products (title, brand, country_of_origin, warranty, description, price, keyword, category, discount, stock, upload_date, total_sale, img) VALUES ('$title',  '$brand', '$country_of_origin', $warranty,'$description', $price, '$keyword', '$category', $discount, $stock, '$upload_date', $total_sale, '$img_name')";

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

        if(@$row['email'] == $login_email && @$row['password']==$login_password){
            return true;
        } else {
            return false;
        } 
    }

    public function checkAdminLoginData($data){
        $login_email = $data['email'];
        $login_password = $data['password'];        

        $sql = "SELECT * FROM admins WHERE email='$login_email'";        
        $rows = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($rows);


        if(@$row['email'] == $login_email && $row['password']==$login_password){
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

    

    public function displayData(){
        $sql = "SELECT * FROM user";
        $result = mysqli_query($this->conn, $sql);
        //$row = mysqli_fetch_assoc($result);
        return $result;
    }

    public function displayProducts(){
        $sql = "SELECT * FROM products";
        $result = mysqli_query($this->conn, $sql);
        //$row = mysqli_fetch_assoc($result);
        return $result;
    }
    public function displayProductsBySearch($search){
        $sql = "SELECT * FROM products";
        $result = mysqli_query($this->conn, $sql);
        //$row = mysqli_fetch_assoc($result);
        return $result;
    }

    public function displayProductByID($id){
        $sql = "SELECT * FROM products WHERE id='$id'";
        $result = mysqli_query($this->conn, $sql);
        //$row = mysqli_fetch_assoc($result);
        return $result;
    }

    public function deleteData($id){
        $sql = "DELETE FROM user WHERE id=$id";
        mysqli_query($this->conn, $sql);
    }

    public function deleteProduct($id){
        $sql = "DELETE FROM products WHERE id=$id";
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

    public function cart(){
        if(isset($_GET['product_id'])){
            $ip = $_SERVER['REMOTE_ADDR'];
            $product_id = $_GET['product_id'];
            $sql = "SELECT * FROM cart_details WHERE ip_address='$ip' AND product_id=$product_id";
            $result = mysqli_query($this->conn, $sql);
            $num_of_rows = mysqli_num_rows($result);
            if(!$user_id = $_SESSION['id']){
                header('location:../user_area/user_login.php');
            }
            if($num_of_rows>0){
                echo "<script> alert('This item is already present inside cart.') </script>";
                echo "<script> window.open('../home_page/index.php', '_self') </script>";
            } else {
                $sql = "INSERT INTO cart_details (product_id, ip_address, quantity, user_id) VALUES ($product_id, '$ip', 0, $user_id)";
                $result = mysqli_query($this->conn, $sql);
                echo "<script> alert('Item is added to cart.') </script>";
                echo "<script> window.open('../home_page/index.php', '_self') </script>";
            }
        }
    }

    public function total_cart_item(){
        $ip = $_SERVER['REMOTE_ADDR'];

        $sql = "SELECT * FROM cart_details WHERE ip_address='$ip'";
        $result = mysqli_query($this->conn, $sql);
        $num_of_rows = mysqli_num_rows($result);
        
        return $num_of_rows;
    }
    public function total_cart_price(){

        $total_price = 0;

        $ip = $_SERVER['REMOTE_ADDR'];

        $sql = "SELECT * FROM cart_details WHERE ip_address='$ip'";
        $rows = mysqli_query($this->conn, $sql);
        // $num_of_rows = mysqli_num_rows($result);
        while($row = mysqli_fetch_assoc($rows)){
            $product_id = $row['product_id'];
            
            $sql_2 = "SELECT * FROM products WHERE id=$product_id";
            $rows_2 = mysqli_query($this->conn, $sql_2);

            $row_2 = mysqli_fetch_assoc($rows_2);

            $product_price = $row_2['price'];

            $total_price += $product_price;
        }
        
        return $total_price;
    }
}


?>