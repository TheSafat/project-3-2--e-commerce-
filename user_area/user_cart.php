<?php
    include('../function/function.php');
    $objCrudAdmin = new CrudApp();

    session_start();
    if(@$_SESSION['id']){
        $user = $objCrudAdmin->getName($_SESSION['id']);
    } else {
        $user = 'Guest';
    }

    if(isset($_POST['btn'])){
        // $sql = "DELETE FROM cart_details WHERE"
    }


    $conn= mysqli_connect('localhost', 'root', '', 'project_db');
    $ip = $_SERVER['REMOTE_ADDR'];
    $sql = "SELECT * FROM cart_details WHERE ip_address='$ip'";
    $rows = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">



    <!-- font awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?php 
        // include('../include/head_insider.php') 
    ?>

    <title>Home Page</title>
</head>

<body>

    <!-- first child  -->
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LOGO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="../home_page/index.php">Home</a></li>

                    <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="../user_area/user_registration.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php" target="_blank">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="../user_area/user_cart.php"><i
                                class="fa-sharp fa-solid fa-cart-shopping"></i><sup>
                                <?php echo $objCrudAdmin->total_cart_item(); ?> </sup></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of first child -->

    <!-- calling add to cart  -->
    <?php
        $objCrudAdmin->cart();
    ?>

    <!-- second child  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
            <li class="nav-item"><a class="nav-link" href="#">Welcome <?php echo $user ?></a></li>

            <?php
                if($user=='Guest'){
                    echo '<li class="nav-item"><a class="nav-link" href="../user_area/user_login.php">Login</a></li>';
                }
                else {
                    echo '<li class="nav-item"><a class="nav-link" href="../user_area/user_logout.php">Logout</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="../user_area/user_dashboard.php">Your Profile</a></li>';
                }
            ?>

        </ul>
    </nav>
    <!-- second child ends  -->


    <!-- third child -->
    <div class="container-fluid">
        <div>
            <h3 class="text-center"> Daraz Store </h3>
            <p class="text-center">A new way of shopping</p>
        </div>
    </div>
    <!-- end of third child -->

    <!-- fourth child  -->
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <table class="table table-bordered text-center">
                    <tr>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <!-- <th>Quantity</th> -->
                        <th>Price</th>
                        <!-- <th>Remove</th> -->
                        <th colspan="2">Operation</th>
                    </tr>
                    <?php
                        while($row = mysqli_fetch_assoc($rows)){
                            $product_id = $row['product_id'];
                            $sql_2 = "SELECT * FROM products WHERE id=$product_id";
                            $rows_2 = mysqli_query($conn, $sql_2);
                            $row_2 = mysqli_fetch_assoc($rows_2);
                    ?>

                    <tr>
                        <td><?php echo $row_2['title'] ?></td>
                        <td><img width="200px" src="../admin_area/product_images/<?php echo $row_2['img'] ?>" alt=""></td>
                        <td><?php echo $row_2['price'] ?></td>
                        <td>
                            <a href="user_remove_item_from_cart.php?cart_id=<?php echo $row_2['id'] ?>">Remove</a>
                        </td>
                    </tr>
                    <?php 
                        } 
                    ?>
                </table>

            </form>
        </div>
        <!-- sub total  -->
        <div class="d-flex m-5">
            <h4 class="px-4">Subtotal: <strong class="text-info"><?php echo $objCrudAdmin->total_cart_price(); ?></strong></h4>
            <a href="../home_page/index.php"><button class="bg-info px-3">Continue Shopping</button></a>
            <a href="user_checkout.php"><button class="bg-secondary px-3 mx-2 text-light">Checkout</button></a>
        </div>
    </div>


    <!-- fourth child ends -->


    <!-- last child -->
    <?php include('../include/footer.php'); ?>
</body>

</html>