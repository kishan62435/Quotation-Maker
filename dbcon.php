 <?php
    $sname = "localhost";
    $uname = "root";
    $pass = "Vatapikonda@62435";
    $dbname = "quotation";
    $category;
    $conn = mysqli_connect($sname, $uname, $pass, $dbname);
    if(!$conn){
        die("Failed to connect to the Server: ".mysqli_connect_error());
    }

?> 