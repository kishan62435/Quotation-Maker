<?php
session_start();
if(!$_SESSION['uname']){
  header('Location:index.php');
}
require 'dbcon.php';
$t = $_SESSION['utype'];
$nt = ucfirst($_SESSION['uname']);
// echo "<script> alert(".$t.");</script>";
// echo $t;
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
    <!-- /Add Category Modal -->
    <div class="modal fade" id="addCatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product Category</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="add_category" method="POST">
            <div class="modal-body">
            <div id="errorMessageCat" class="alert alert-warning d-none"></div>
              <div class="form-floating mb-3 fw-normal fs-5">
                <input required type="text" class="form-control" name="category_name" id="addCatName" placeholder="Category">
                <label >New Product Category</label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="addCat"class="btn btn-primary">Add Category</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <!-- /Add Category Modal End-->

    <nav class="navbar" style ="background-color: #712cf9;" >

        <div class="container-fluid" style="padding">
            <span style="color:white;" class="navbar-brand mb-3 h1">Quotation Maker</span>
            <div class="d-flex flex-row-reverse">
              <div class="my-1 p-2 ms-5"><a class="btn btn-light" href="logout.php">Log out</a></div>
              <div style="color:white;" class="my-1 mt-2 p-2 ms-2"><span class=""><h4><?=$nt?></h4></span></div>
              <div class="p-2 my-2"><img  style="height:4;" src="" alt=""><i class="fas fa-2x fa-user"></i></div>
            </div>
        </div>
    </nav>

    <!-- <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid float-end">

      <a href="logout.php" class="btn btn-danger btn-secondary float-end mx-3">LogOut</a> &nbsp -->
      <!-- <h4><?=$nt?></h4> -->
      <!-- <a class="btn btn-danger btn-secondary" href="logout.php"><h4>Logout</h4></a> 
      </div>
    </nav> -->

    <div id="prod_details_div" class="container mt-5 d-none">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Product Details
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addCatModal">Add New Category</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form id='shcategory' method="GET" action="products.php" name="category-form" class="card-body">
                            <select id="cat_list" required name="categoryData" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option value="" selected disabled>Select a product category</option>
                                <?php
                                  $query = "SELECT * FROM `product_categories`;";
                                  $query_run = mysqli_query($conn, $query);
                                  if(mysqli_num_rows($query_run)>0){
                                    foreach($query_run as $category_item){
                                      
                                    ?>
                                <option value='<?=$category_item['category']?>'><?= ucfirst($category_item['category']);?></option>";
                                      <?php
                                    }
                                  }
                                  ?>
                            </select>
                            <button type="submit" name="show" class="btn btn-primary">Show</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Generate Quotation</h4>
                    </div>
                    <div class="card-body">
                      <form action="quote_products.php" id="generateQt" method="POST" class="card-body">
                        <div class="form-floating mb-3 fw-normal fs-5">
                          <input type="text" class="form-control" id="orgName" placeholder="name@example.com">
                          <label >Customer / Organisation Name</label>
                        </div>
                        <div class="form-floating mb-3 fw-normal fs-5">
                          <input type="text" class="form-control" id="subject" placeholder="name@example.com">
                          <label >Subject</label>
                        </div>
                        <div class="card-body">
                          <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>

      $(document).ready(function () {
        var type= '<?=$t?>';
        if(type == 'admin'){
            $('#prod_details_div').removeClass('d-none');
        }
      });

      

      $(document).on('submit', '#add_category', function (e) {
          e.preventDefault();

          var formData = new FormData(this);
          formData.append("add_category", true);

          $.ajax({
            type: "POST",
            url: "code.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
              // alert('hello');
                var res = jQuery.parseJSON(response);
                if(res.status == 500 || res.status == 400 || res.status == 202){
                  alert(res.message);
                  $('#errorMessageCat').removeClass('d-none');
                  $('#errorMessageCat').text(res.message);
                }
                else if(res.status == 200){
                  $('#errorMessageCat').addClass('d-none');
                  $('#addCatModal').modal('hide');
                  $('#add_category')[0].reset();
                  // $('#cat_list').load(location.href + " #cat_list");
                  // alert(res.message);
                  $('#cat_list').append($('<option></option>').attr('value', res.append_cat).text(res.append_cat));

                }
            }
          });
      });
    </script>
  </body>
</html>