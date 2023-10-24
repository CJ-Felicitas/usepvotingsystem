<?php 
    session_start();
	include '../config/db_config.php';
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    //session variables 


    $result = array();

	$userID = mysqli_real_escape_string($conn,$_POST['userID']);
   



    $sql = "DELETE FROM tbadmin where id = '$userID' ";
    

    if(mysqli_query($conn,$sql) == TRUE){
        $result[] = array("result" => "success");

	}else{
        echo $conn -> error;
        $result[] = array("result" => "error");;
    }

    echo json_encode($result);

    $conn -> close();



?>