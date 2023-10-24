<?php
    session_start();
    date_default_timezone_set('Asia/Manila');
    require_once '../config/db_config.php';

    $statusMsg = '';
    $success = '';
    $newFname = filter_var($_POST['newFname'],FILTER_SANITIZE_STRING);
    $newLname = filter_var($_POST['newLname'],FILTER_SANITIZE_STRING);
    $newCollege = filter_var($_POST['newCollege'],FILTER_SANITIZE_STRING);
    $newYear = filter_var($_POST['newYear'],FILTER_SANITIZE_STRING);
    $newStudID = filter_var($_POST['newStudID'],FILTER_SANITIZE_STRING);
    $newPass = filter_var($_POST['newPass'],FILTER_SANITIZE_STRING);
    $voter_id = filter_var($_SESSION['voter_id'],FILTER_SANITIZE_STRING);
    $newEmail = filter_var($_POST['newEmail'],FILTER_SANITIZE_STRING);
    $newProgram = filter_var($_POST['newProgram'],FILTER_SANITIZE_STRING);
    
    echo $voter_id ;

    //logs
    $tempCampus = $_SESSION['username'];
    $tempName = $_SESSION['voterFname']." ".$_SESSION['voterLname'];
    $dt = date('Y-m-d G:i:s');
    $action = "Edited voter | \" ".$tempName." \" to"." \" ".$newFname." ".$newLname." \" ";
    $query2 = "INSERT INTO tblogs(name,action,timestamp)VALUES('$tempCampus','$action','$dt')";

    
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    $query = "UPDATE tbvoters set fname = '$newFname', lname = '$newLname', 
    college ='$newCollege',program = '$newProgram', year = '$newYear', stud_id = '$newStudID', password = '$newPass', email='$newEmail' where id = '$voter_id' ";


    if(mysqli_query($conn,$query) == TRUE){
        $success = 'true';
        mysqli_query($conn,$query2);
    }else{
        $statusMsg = "Unable to update voter";
        
    }

?>  