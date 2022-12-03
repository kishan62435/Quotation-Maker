<div class="card">
                    <div class="card-header">
                        <?php
                            $query = "SELECT * FROM `product_categories`;";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run)>0){
                                foreach($query_run as $tbls){
                                    $tbl_name = $tbls['category'];
                                    ?>
                                    <h4><?=ucfirst($tbl_name);?>
                                        <a href="index.php" class="btn btn-danger btn-secondary float-end mx-3">BACK</a> &nbsp
                                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#add_products_modal">Add Product</button>
                                    </h4>
                                    <div class="card-body"></div>
                                        <table id ="<?=$tbl_name?>" class="table table-bordered table-striped mx-3">
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
                                            <tbody id = "tbody">
                                                <?php
                                                    $query = "SELECT * FROM `".$tbl_name."`;";
                                                    $query_run = mysqli_query($conn, $query);

                                                    if(mysqli_num_rows($query_run)>0){
                                                        $count=1;
                                                        foreach($query_run as $product){
                                                            ?>
                                                            <tr>
                                                                <td><?=$count++?></td>
                                                                <td><?=$product['item']?></td>
                                                                    <!-- <td>1</td> -->
                                                                <td><?=$product['gst']?></td>
                                                                <td><?=$product['rate']?></td>
                                                                <td>
                                                                    <button type="button" value = "<?= $product['id'];?>" class='editProductBtn btn btn-success btn-sm my-1'>Edit</button>
                                                                    <button type="button" value = "<?= $product['id'];?>" class='deleteProductBtn btn btn-danger btn-sm'>Add</button>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    else{
                                                        echo "<h5> No Record Found </h5>";
                                                    }
                                                ?>
                                        </table>
                                    </div>
                                    <?php
                                }
                            }
                        ?>

                    </div>
                </div>
