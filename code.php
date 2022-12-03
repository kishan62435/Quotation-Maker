<?php
    // session_start();
    require 'dbcon.php';

    if(isset($_POST['add_category'])){
        $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
        
        if(!$category_name){
            $res = [
                'status' =>500,
                'message' => 'No category name'
            ];
            echo json_encode($res);
            return;
        }

        $query = "SELECT * FROM `product_categories` WHERE category = '$category_name';";
        $query_run = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($query_run) === 1){
            $res = [
                'status' => 400,
                'message' => 'Category '.$category_name.' is already present!'
            ];
            echo json_encode($res);
            return;
        }
        else{
              $query = "CREATE TABLE `$category_name` (
                `id` int unsigned NOT NULL AUTO_INCREMENT,
                `item` varchar(100) NOT NULL,
                `gst` decimal(6,2) NOT NULL,
                `rate` decimal(8,3) NOT NULL,
                PRIMARY KEY (`id`),UNIQUE KEY `item` (`item`));";
            
            $query_run = mysqli_query($conn, $query);

            if($query_run){
                $query = "INSERT INTO `product_categories` (`category`) VALUES('$category_name');";
                $query_run = mysqli_query($conn, $query);

                if($query_run){
                    $res = [
                        'status' => 200,
                        'message' => 'Category created success fully.',
                        'append_cat' => $category_name
                    ];
                    echo json_encode($res);
                    return;
                }
                else{
                    $res =[
                        'status' =>230,
                        'message' => $category_name.' table created but failed to update product_categories!!'
                    ];
                    echo json_encode($res);
                    return;
                }
            }
            else{
                $res = [
                    'status' =>202,
                    'message' => 'Category creation failed!'
                ];
                echo json_encode($res);
                return;
            }
        }
    }

    if(isset($_POST['delete_product'])){
        $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);

        if(!$category){
            $res = [
                'status' =>100,
                'message'=> $category
            ];
            echo json_encode($res);
            return;
        }
        $query = "DELETE FROM `$category` WHERE id = '$product_id';";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            $res = [
                'status' => 200,
                'message' => 'Deleted Successfully.'
            ];
            echo json_encode($res);
            return;
        }
        else{
            $res = [
                'status'=> 500,
                'message' =>'Could Not Delete!!'
            ];
            echo json_encode($res);
            return;
        }
    }

    if(isset($_POST['update_products'])){
        $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $product = mysqli_real_escape_string($conn, $_POST['product']);
        $gst = $_POST['gst'];
        $rate = $_POST['rate'];


        if($category == NULL || $product == NULL || $gst == NULL || $rate == NULL){
            $res = [
                'status'=> 320,
                'message' => 'All fields are mandatory!'
            ];
            echo json_encode($res);
            return;
        }

        $query = "UPDATE `$category` SET item = '$product', gst='$gst', rate='$rate' WHERE id = '$product_id'";

        $query_run = mysqli_query($conn, $query);

        if(!$query_run){
            $res =[
                'status'=>375,
                'message'=>'Failed to run query!'
            ];
            echo json_encode($res);
            return;
        }

        if($query_run){
            $res = [
                'status' => 200,
                'message' => 'Product Updated Successfully!'
            ];
            echo json_encode($res);
            return;
        }
        else{
            $res = [
                'status' => 500,
                'message' => 'Could Not Update!!'
            ];
            echo json_encode($res);
            return;
        }
    }

    if(isset($_GET['product_id'])){
        $product_id = mysqli_real_escape_string($conn, $_GET['product_id']);
        $category = mysqli_real_escape_string($conn, $_GET['category']);
        $query = "SELECT * FROM `$category` WHERE id = $product_id;";
        $query_run = mysqli_query($conn, $query);

        // if(!$query_run){
            //     $res =[
            //         'status'=>300,
            //         'message'=>'can not get category!'
            //     ];
            //     echo json_encode($res);
            //     return;
            // }


        if(mysqli_num_rows($query_run) == 1){
            $product = mysqli_fetch_array($query_run);
            // $product.append()
            $res =[
                'status'=>200,
                'message' => 'Product Found!',
                'data' => $product
            ];
            echo json_encode($res);
            return;
        }
        else{
            $res =[
                'status'=>404,
                'message' => 'Product Not Found!!'
            ];
            echo json_encode($res);
            return;
        }
    }

    if(isset($_POST['add_products'])){
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $product = mysqli_real_escape_string($conn, $_POST['product']);
        $gst = $_POST['gst'];
        $rate = $_POST['rate'];

        if($category == NULL || $product == NULL || $gst == NULL || $rate == NULL){
            $res = [
                'status'=> 320,
                'message' => 'All fields are mandatory!'
            ];
            echo json_encode($res);
            return;
        }

        $query = "SELECT * FROM `$category` WHERE item = '$product';";

        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run)===1){
            $res =[
                'status'=>422,
                'message' => 'Product Already Exists!'
            ];
            echo json_encode($res);
            return;
        }

        else {
            $query = "INSERT INTO `$category` (`item`, `gst`, `rate`) VALUES(
            '$product', '$gst', '$rate');";

            $query_run = mysqli_query($conn, $query);

            if($query_run){
                $res =[
                    'status'=>200,
                    'message' => 'Product Added Successfully.'
                ];
                echo json_encode($res);
                return;
            }
            else{
                $res =[
                    'status'=>500,
                    'message' => 'Product Not Added.'
                ];
                echo json_encode($res);
                return;
            }
        }
        
    }
?>