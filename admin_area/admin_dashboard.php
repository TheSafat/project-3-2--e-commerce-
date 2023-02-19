<?php
    include('../function/function.php');
    $obj = new CrudApp();
    $rows = $obj->displayProducts();

    session_start();

    $id = $_SESSION['id'];
    $admin_name = $obj->getAdminName($id);
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

    <title>Document</title>
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
            <li class="nav-item"><a class="nav-link" href="#">Welcome <?php echo $admin_name ?></a></li>

            <?php           
                echo '<li class="nav-item"><a class="nav-link" href="../admin_area/admin_logout.php">Logout</a></li>'; 
            ?>

        </ul>
    </nav>
    <!-- second child ends  -->

    <!-- fourth child  -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-10">

                <?php
                    if(isset($_GET['option'])){
                        if($_GET['option'] == 1){
                            include('admin_show_all_user_data.php');
                        }
                        else if($_GET['option'] == 2){
                            include('admin_show_all_pending_order.php');
                        } else if($_GET['option'] == 3){
                            include('admin_completed_orders.php');
                        } 
                        // else if($_GET['option'] == 4){
                        //     include('admin_show_all_product_data.php');
                        // }
                    }
                ?>

            </div>
            <div class="col-md-2 bg-secondary p-0">
                <!-- side bar -->

                <ul style="height: 70vh" class="navbar-nav me-auto text-center mb-5">
                    <li class="nav-item bg-light">
                        <a href="" class="nav-link text-light">
                            <h4></h4>
                        </a>
                    </li>
                    <!-- <li class="nav-item"><a href="admin_show_all_user_data.php?option=1" class="nav-link text-light">Show all data</a></li> -->
                    <li class="nav-item"><a href="admin_dashboard.php?option=1" class="nav-link text-light">Show all
                            data</a></li>


                    <!-- <li class="nav-item"><a href="admin_show_all_pending_order.php" class="nav-link text-light">Show all Pending order</a></li> -->
                    <li class="nav-item"><a href="admin_dashboard.php?option=2" class="nav-link text-light">Show all
                            Pending order</a></li>

                    <!-- <li class="nav-item"><a href="admin_completed_orders.php" class="nav-link text-light">Show all Completed order</a></li> -->
                    <li class="nav-item"><a href="admin_dashboard.php?option=3" class="nav-link text-light">Show all
                            Completed order</a></li>


                    <li class="nav-item"><a target="_blank" href="admin_show_all_product_data.php"
                            class="nav-link text-light">Show all products data</a></li>
                    <!-- <li class="nav-item"><a href="admin_dashboard.php?option=4" class="nav-link text-light">Show all products data</a></li> -->

                </ul>
            </div>
        </div>
    </div>
    <!-- end of fourth child  -->

    <!-- last child -->
    <?php include('../include/footer.php'); ?>
</body>

</html>