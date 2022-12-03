<?php
session_start();
include "dbcon.php";

if(isset($_POST['uname'])&& isset($_POST['pass'])){
    // echo "<script>alert('here');</script>";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
    $uname = validate(strtolower($_POST['uname']));
    // $uname = strtolower($uname);
    $pass = validate($_POST['pass']);
    // echo "<script> alert(".$uname.");</script>";

    if(empty($uname)){
        $res = [
            'status' => 100,
            'message' => 'User Name is required!'
        ];
        echo json_encode($res);
        return;
    }
    else if(empty($pass)) {
        $res = [
            'status' => 100,
            'message' => 'Password Name is required!'
        ];
        echo json_encode($res);
        return;
    }
    else{
        $query = "SELECT userName FROM users WHERE userName = '$uname'";
        $query_run = mysqli_query($conn, $query);
        if(mysqli_num_rows($query_run)===1){
            $query = "SELECT * FROM users WHERE userName = '$uname'";
            $query_run = mysqli_query($conn, $query);
            $result = mysqli_fetch_assoc($query_run);

            if($result['userName'] ===$uname && $result['password'] === md5($pass)){
                $_SESSION['uname'] = $result['userName'];
                $_SESSION['uid'] = $result['userId'];
                $_SESSION['utype'] = $result['userType'];
                $_SESSION['passd'] = $result['password'];

                $res = [
                    'status' => 200,
                    'message' => $_SESSION['utype']
                ];
                echo json_encode($res);
                return;
                
            }
            else{
                $res = [
                    'status' => 100,
                    'message' => 'Incorrect User Name or Password!',
                    'u' =>$result['userName'],
                    'p'=>$result['password']
                ];
                echo json_encode($res);
                return;
            }
        }
        else{
            $res = [
                'status' => 100,
                'message' => 'User does not exit!'
            ];
            echo json_encode($res);
            return;
        }
    }
}

?>