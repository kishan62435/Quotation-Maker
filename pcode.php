<?php
                                require 'dbcon.php';
                                // function getData($category){
                                    echo "hello";
                                    if(isset($_POST['shcategory'])){
                                        echo "hello";
                                        $category = $_POST['categoryData'];
                                        echo "<script>
                                                console.log('doing');
                                                let element = document.getElementById(cat);
                                                console.log('done');
                                            </script>";
                                        $query = "SELECT * FROM $category";
                                        $query_run = mysqli_query($conn,$query);
    
                                        echo "<table class='table table-bordered table-striped'>
                                        
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>ITEM DETAILS/ PARTICULARS</th>
                                                    <th>QTY</th>
                                                    <th>GST %</th>
                                                    <th>UNIT RATE</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
                                                if(mysqli_num_rows($query_run)>0){
                                                    foreach($query_run as $product){
                                                        
                                                        echo "<tr>
                                                            <td>".$product['id']."</td>
                                                            <td>".$product['item']."</td>
                                                            <td>1</td>
                                                            <td>".$product['gst']."</td>
                                                            <td>".$product['rate']."</td>
                                                            <td>
                                                                <a href='' class='btn btn-success btn-sm'>Edit</a>
                                                                <a href='' class='btn btn-danger btn-sm'>Delete</a>
                                                            </td>
                                                        </tr>";
                                                        
                                                    }
                                                }
                                                else{
                                                    echo "<h5> No Record Found </h5>";
                                                }
                                                echo "</tbody>
                                                </head>
                                                </table>";
                                    }
                               
                            ?>
