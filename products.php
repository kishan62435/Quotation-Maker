<?php 
session_start();
if(!$_SESSION['uname']){
    header('Location:index.php');
}
if(isset($_GET['show'])){
    $category =$_GET['categoryData'];
}
$t = $_SESSION['utype'];
$nt = ucfirst($_SESSION['uname']);

// echo $category;
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" rel="stylesheet">
</head>
  <body>
    <!-- Add Product Modal -->
    <div class="modal fade" id="add_products_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Products</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="add_products">
                    <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none"></div>
                        <div class="mb-3">
                            <label>ITEMS DETAILS / PARTICULARS</label>
                            <input required type="text" name="product" placeholder="Product Description"class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>GST %</label>
                            <input required type="number" step="0.001" name="gst" placeholder="0%" max="100" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>UNIT RATE</label>
                            <input required type="number" placeholder="0.00"step="0.001" name="rate" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name ="addpod" class="btn btn-primary">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Product Modal Closed -->
    
    <!-- Edit Product Modal -->
    <div class="modal fade" id="productEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit <?=ucfirst($category);?> Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="update_products">
                    <div class="modal-body">

                        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>
                
                        <input type="hidden" name="product_id" id="id">

                        <!-- <select required name="category" id="category" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option value="" selected disabled>Select a product category</option>
                            <option value="keyboard">Keyboard</option>
                            <option value="mouse">Mouse</option>
                            <option value="monitor">Monitor</option>
                        </select> -->
                        <div class="mb-3">
                            <label>ITEMS DETAILS / PARTICULARS</label>
                            <input required type="text" name="product" id="item" placeholder="Product Description"class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>GST %</label>
                            <input  type="number" step="0.001" name="gst" id="gst" placeholder="0%" max="100" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>UNIT RATE</label>
                            <input required type="number" placeholder="0.00"step="0.001" name="rate" id="rate" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name ="updateprod" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 

    <!-- Edit Product Modal Closed -->


    <nav class="navbar" style ="background-color: #712cf9;" >
        <div class="container-fluid" style="padding">
            <span style="color:white;" class="navbar-brand mb-3 h1">Quotation Maker</span>
            <div class="d-flex flex-row-reverse">
              <div class="my-1 p-2"><a class="btn btn-light" href="logout.php">Log out</a></div>
              <div style="color:white;" class="my-1 mt-2 p-2"><span class=""><h4><?=$nt?></h4></span></div>
              <div class="p-2 my-2"><img  style="height:4;" src="" alt=""><i class="fas fa-2x fa-user"></i></div>
            </div>
        </div>
    </nav>

    <!-- <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid float-end"> -->

      <!-- <a href="logout.php" class="btn btn-danger btn-secondary float-end mx-3">LogOut</a> &nbsp -->
      <!-- <h4></h4> -->
      <!-- <a class="btn btn-danger btn-secondary" href="logout.php"><h4>Logout</h4></a>
      </div>
    </nav> -->


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><?=ucfirst($category);?>
                            <a href="home.php" class="btn btn-danger btn-secondary float-end mx-3">BACK</a> &nbsp
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#add_products_modal">Add Product</button>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table id ="myTable" class="table table-bordered table-striped">
                            <!-- <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ITEM DETAILS/ PARTICULARS</th>
                                    <th>QTY</th>
                                    <th>GST %</th>
                                    <th>UNIT RATE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody> -->
                                <?php
                                    $query = "SELECT * FROM `".$category."`;";
                                    // $query = "SELECT * FROM keyboard;";
                                    // echo $query;
                                    $query_run = mysqli_query($conn,$query);
                                    if(mysqli_num_rows($query_run)>0){
                                ?>        

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ITEM DETAILS/ PARTICULARS</th>
                                    <!-- <th>QTY</th> -->
                                    <th>GST %</th>
                                    <th>UNIT RATE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <?php
                                        $count=1;
                                        foreach($query_run as $product){
                                            // $count++;
                                            ?>
                                            <tr>
                                                <td><?=$count++?></td>
                                                <td><?=$product['item']?></td>
                                                <!-- <td>1</td> -->
                                                <td><?=$product['gst']?></td>
                                                <td><?=$product['rate']?></td>
                                                <td>
                                                    <button type="button" value = "<?= $product['id'];?>" class='editProductBtn btn btn-success btn-sm my-1'>Edit</button>
                                                    <button type="button" value = "<?= $product['id'];?>" class='deleteProductBtn btn btn-danger btn-sm'>Delete</button>
                                                </td>
                                            </tr>
                                             <?php
                                        }
                                        // echo "</tbody>";
                                    }
                                    else{
                                        echo "<h5> No Record Found </h5>";
                                    }
                                     
                                ?>
                            </tbody>
                        </table>    
                    </div>
                </div>
            </div>
        </div>
    </div>  

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        var cat = "<?php echo $category; ?>";
        $(document).on('submit','#add_products', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("category", cat)
            formData.append("add_products", true); 
            
            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    var res = jQuery.parseJSON(response);
                    if(res.status == 500){

                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);
                        // alert(res.message);
                    }

                    else if(res.status == 422 || res.status == 320){
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);
                    }

                    else if(res.status == 200){
                        $('#errorMessage').addClass('d-none');
                        $('#add_products_modal').modal('hide');
                        $('#add_products')[0].reset();
                        // alert("<?php echo $category; ?>");
                        
                        // location.reload(true);
                        // alertify.set('notifier','position', 'top-right');
                        // alertify.success(res.message);
                        $('#myTable').load(location.href + " #myTable");
                        
                    }
                }
            });
        });

        $(document).on('submit','#update_products', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_products", true); 
            formData.append("category", cat)
            
            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    var res = jQuery.parseJSON(response);
                    
                    if(res.status == 200){
                        // alert('inside');
                        $('#errorMessageUpdate').addClass('d-none');
                        $('#productEditModal').modal('hide');
                        $('#update_products')[0].reset();
                        $('#myTable').load(location.href + " #myTable");
                    }
                    else if(res.status == 500 || res.status == 320 || res.status == 375){
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);

                    }
                    
                }
            });
        });

        $(document).on('click', '.deleteProductBtn', function (e) {
            e.preventDefault();
            if(confirm('Are you sure you want to delete this data?')){

                var product_id = $(this).val();
                
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: ({
                        'delete_product': true,
                        'product_id': product_id,
                        'category': cat
                    }),
                    success: function (response) {
                        // console.log(response);
                        // alert('here');
                        
                        var res = $.parseJSON(response);
    
                        if(res.status == 200){
                            // alert(res.message);
                            $('#myTable').load(location.href + " #myTable");
                        }
                        else if(res.status == 500 || res.status == 100){
                            alert(res.message);
                        }
                        else{
                            alert('unknown')
                        }
                    }
                });
            }
            
        });

        $(document).on('click', '.editProductBtn', function () {
            var product_id = $(this).val();
            // var cat = "<?php echo $category; ?>";
            // alert(cat);

            
            $.ajax({
                type: "GET",
                url: "code.php?product_id="+ product_id,
                data: ({"category": cat}),
                success: function (response) {
                    var res = jQuery.parseJSON(response);
                    // alert("hello");
                    // var res = jQuery.parseJSON(response);

                    if(res.status == 404){
                        alert(res.message);
                    }

                    else if(res.status == 200){
                        // alert("h");
                        $('#id').val(res.data.id);
                        $('#item').val(res.data.item);
                        $('#gst').val(res.data.gst);
                        $('#rate').val(res.data.rate);

                        $('#productEditModal').modal('show');
                    }
                    else if(res.status == 300){
                        alert(res.message);
                    }
                }
            });
        });
    </script>
    </body>
</html>