<?php
    session_start();
    require_once '../config/db_config.php';
    $code = $_POST['code'];
    $type = $_POST['type'];
    

    $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    $result_arr = array();

    $query = "SELECT * from tbcode where type = '$type' LIMIT 1 ";
    $result = mysqli_query($conn,$query);
    $resultcheck = mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)){
       if($resultcheck > 0){
            if($row['access_code'] == $code){
                $result_arr[] = array('result' => 'success');
                $_SESSION['admin_success']="success_admin";
                setcookie("admin_panel_access", "success_admin", time() + (86400 * 30), "/");
            }else{
                $result_arr[] = array('result' => 'error');
            }
       }
    }

    echo json_encode($result_arr);





?>