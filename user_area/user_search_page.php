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


    
    <div class="container-fluid">
        <!-- third child -->    
        <div>
            <h3 class="text-center"> Daraz Store </h3>
            <p class="text-center">A new way of shopping</p>
        </div>
        <!-- end of third child -->


        <!-- fourth child  -->
        <div class="row">
            <div class="col-md-10">
                <!-- Products -->
                <div class="row">

                    <?php $i=0; while(($row = mysqli_fetch_assoc($rows)) && $i<15){ ?>
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="../admin_area/product_images/<?php echo $row['img'] ?>" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['title'] ?></h5>
                                    <p class="card-text"><?php echo $row['description'] ?></p>
                                    <a href="#" class="btn btn-info">Add to cart</a>
                                    <a href="../user_area/user_view_more_page.php?product_id=<?php echo $row['id'] ?>" class="btn btn-secondary">View more</a>
                                </div>
                            </div>
                        </div>
                    <?php $i++; } ?>
                </div>
            </div>


            <div class="col-md-2 bg-secondary p-0">
                <!-- side bar -->

                <!-- brands to be desplayed  -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="" class="nav-link text-light"> <h4>Brands Name</h4> </a>
                    </li>
                    <li class="nav-item"><a href="" class="nav-link text-light">Brand 1</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-light">Brand 2</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-light">Brand 3</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-light">Brand 4</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-light">Brand 5</a></li>
                </ul>

                <!-- categories to be desplayed  -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="" class="nav-link text-light">
                            <h4>Categories</h4>
                        </a>
                    </li>
                    <li class="nav-item"><a href="" class="nav-link text-light">Laptop</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-light">Monitor</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-light">PC</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-light">Sound System</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-light">Accessories</a></li>
                </ul>
            </div>
        </div>

        <!-- end of fourth child  -->
    </div>

    <!-- last child -->
    <?php include('../include/footer.php'); ?>
</body>

</html>