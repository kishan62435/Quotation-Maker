<?php 
    session_start();
    if(!$_SESSION['uname']){
        header('Location:index.php');
    }
    require 'dbcon.php';
    $t = $_SESSION['utype'];
    $nt = ucfirst($_SESSION['uname']);
    // $nt = $_SESSION['uname'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" rel="stylesheet">

</head>
  <body>

    <nav class="navbar" style ="background-color: #712cf9;" >

        <div class="container-fluid" style="padding">
            <span style="color:white;" class="navbar-brand mb-3 h1">Quotation Maker</span>
            <div class="d-flex flex-row-reverse">
                <div class="my-1 p-2 ms-5"><a class="btn btn-light" href="logout.php">Log out</a></div>
                <div style="color:white;" class="my-1 mt-2 p-2 ms-2"><span class=""><h4><?=$nt?></h4></span></div>
                <!-- <img src="" alt=""><i class="fas fa-user"></i> -->
                <div class="p-2 my-2"><img  style="height:4;" src="" alt=""><i class="fas fa-2x fa-user"></i></div>
            </div>
        </div>
    </nav>
    
    <div class="container mt-5"> 
        <div class="row">
            <div class="mb-3">
                <a href="home.php" class="btn btn-danger btn-secondary float-end mx-3">BACK</a> &nbsp
            </div>
            <div class="col-md-12">
                <?php 
                    $mquery = "SELECT * FROM `product_categories`;";
                    $mquery_run = mysqli_query($conn, $mquery);

                    if(mysqli_num_rows($mquery_run)>0){
                        foreach($mquery_run as $tbls){
                            $tbl_name = $tbls['category'];
                        
                            $query = "SELECT * FROM `".$tbl_name."`;";
                            $query_run = mysqli_query($conn, $query);
                            if(mysqli_num_rows($query_run)>0){
                            $count=1;
                        ?>
                        <div class="card mb-5">
                            <div class="card-header">
                                <h4><?=ucfirst($tbl_name);?></h4>
                                                        <!-- <a href="index.php" class="btn btn-danger btn-secondary float-end mx-3">BACK</a> &nbsp -->
                                                        <!-- <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#add_products_modal">Add Product</button> -->
                                        <!-- </h4> -->
                            </div>
                                            
                            <div class="card-body">
                            <table id="<?=$tbl_name?>" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ITEM DETAILS/ PARTICULARS</th>
                                        <!-- <th>QTY</th> -->
                                        <th>GST %</th>
                                        <th>UNIT RATE</th>
                                        <th>ACTION</th>
                                    </tr>                                        </thead>
                                <tbody>
                                <?php
                                    foreach($query_run as $product){
                                ?>
                                    <tr>
                                        <td><?=$count++?></td>
                                        <!-- <td><input class="input_tf" type="text" value=""></td> -->
                                        <td><?=$product['item']?></td>
                                        <!-- <td>1</td> -->
                                        <td><?=$product['gst']?></td>
                                        <td><?=$product['rate']?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary float-end" value = "<?= $product['id'];?>" >Add</button>
                                            <!-- <button type="button" value = "<?= $product['id'];?>" class='editProductBtn btn btn-sm my-1'></button> -->
                                        </td>
                                    </tr>
                               <?php
                                    }
                        }
                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php
                    }
                }
            ?>
            </div>
        </div>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>