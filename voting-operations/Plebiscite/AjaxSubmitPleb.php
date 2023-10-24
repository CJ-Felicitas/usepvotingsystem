<?php
    session_start();
    include '../../config/db_config.php';
    include '../Decryption.php';

    $connect = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    date_default_timezone_set('Asia/Manila');

    $studid = mysqli_real_escape_string($connect,decryption($_POST["voter"]));
    $campus = mysqli_real_escape_string($connect,decryption($_POST["campus"]));
    $voter_college;

    $Voted = $_POST['ID'];

    //Checks If The Voter Already Voted
        $queryChecker = 'select * from tbplebvotes where studID="'.$studid.'" AND campus="'.$campus.'"';
        $resultChecker = mysqli_query($connect,$queryChecker);
        $resultCountChecker = mysqli_num_rows($resultChecker);
        if($resultCountChecker > 0){
            echo json_encode(array('NotCast')); 
        }else{
            //Get the Voter Information
            $query = 'select * from tbvoters where stud_id="'.$studid.'" AND campus="'.$campus.'"';
            $result = mysqli_query($connect,$query);
            $resultChecke = mysqli_num_rows($result);

            if($resultChecke > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $voter_college = $row['college'];
                    $voter_program = $row['program'];
                }
            }
            if($Voted == "0"){
                //abstain
                $sql = "INSERT INTO tbplebvotes (studID,campus,voter_college,voter_program,position) VALUES ('$studid','$campus','$voter_college','$voter_program','Abstain')";
                $connect->query($sql);    
                $_SESSION["Ticket"] = "Pass";
            }elseif($Voted == "1"){
                //Yes
                $sql = "INSERT INTO tbplebvotes (studID,campus,voter_college,voter_program,position) VALUES ('$studid','$campus','$voter_college','$voter_program','Yes')";
                $connect->query($sql);
                $_SESSION["Ticket"] = "Pass";
            }else{
                //No
                $sql = "INSERT INTO tbplebvotes (studID,campus,voter_college,voter_program,position) VALUES ('$studid','$campus','$voter_college','$voter_program','No')";
                $connect->query($sql);
                $_SESSION["Ticket"] = "Pass";
            }

            //tblogs for plebadmin system logs
            $tempCampus ="plebadmin";
            $dt = date('Y-m-d G:i:s');
            $action = ''.$studid.' | Casted Vote ';

            $query = "INSERT INTO tblogs(name,action,timestamp) VALUES('$tempCampus', '$action','$dt')";
            $connect->query($query); 
            echo json_encode(array('Cast'));
        }

    unset($_SESSION["savedPleb"]);
    unset($_SESSION["Usep-Comelec"]);
    //session_destroy();
    setcookie("top","", time() -3600);
?>