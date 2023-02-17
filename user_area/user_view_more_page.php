<?php
    include('../function/function.php');

    $objCrudAdmin = new CrudApp();

    $rows = $objCrudAdmin->displayProducts();

    session_start();
    if(@$_SESSION['id']){
        $user = $objCrudAdmin->getName($_SESSION['id']);
    } else {
        $user = 'Guest';
    }

    $product_id = $_GET['product_id'];

    $product_rows = $objCrudAdmin->displayProductByID($product_id);
    $product_row = mysqli_fetch_assoc($product_rows);

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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>

                    <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="../user_area/user_registration.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php" target="_blank">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i
                                class="fa-sharp fa-solid fa-cart-shopping"></i><sup>1</sup></a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Total Price: 100/- </a></li>
                </ul>

                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- end of first child -->


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
        <!-- end of third child -->


        <!-- fourth child  -->
        <div class="row">
            <table>
                <tr>
                    <td></td>
                    <td><img class="product_image" src="../admin_area/product_images/<?php echo $product_row['img'] ?>" alt=""></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><?php echo $product_row['title'] ?></td>
                </tr>
                <tr>
                    <td>Brand</td>
                    <td><?php echo $product_row['brand'] ?></td>
                </tr>
                <tr>
                    <td>country_of_origin</td>
                    <td><?php echo $product_row['country_of_origin'] ?></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><?php echo $product_row['description'] ?></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><?php echo $product_row['price'] ?></td>
                </tr>
            </table>
            
            <!-- end of fourth child  -->
        </div>
    </div>

    <!-- last child -->
    <?php include('../include/footer.php'); ?>
</body>

</html>