<?php 
session_start();
require_once '../config/db_config.php';
date_default_timezone_set('Asia/Manila');

$dbname = DB_NAME;
$pdo = new PDO("mysql:host=localhost;dbname=$dbname", DB_USER, DB_PASS);
$conn = new PDO("mysql:host=localhost;dbname=$dbname", DB_USER, DB_PASS);
$username = strtolower(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$password = strtolower(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
$campus = filter_var( $_POST['campus'], FILTER_SANITIZE_STRING);


//for watcher string to find
$tempStr = "watcher";


$stmt= $pdo->prepare('SELECT * FROM tbadmin WHERE username = :username LIMIT 1');
$stmt->execute([ 'username' => $username ]);


// $sql = "SELECT count(*) FROM tbadmin WHERE username = $username LIMIT 1";
// $statement = $pdo->prepare($sql); 
// $statement->execute(); 


$resultCheck = $stmt ->rowCount() ;

// logs
$dt = date('Y-m-d G:i:s');
$action = "Logged in";
$userCampus = $_POST['username'];
$query = "INSERT into tblogs (name,action,timestamp) values('$userCampus','$action','$dt')";
$login_response = array();

if(empty($username) || empty($password)){
    $login_response[] = array("login_result" => "empty_fields");
}else if($campus == 'Central-Chairperson'){

    if($resultCheck > 0){
        foreach($stmt as $row){
            if(md5($password )== $row['password'] && $row['campus'] == 'Central-Chairperson'){

                $login_response[] = array("login_result" => "central_admin_success");
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['loggedName'] = $row['firstName']." ".$row['lastName'];
                $conn->exec($query);


    
            }else{
                $login_response[] = array("login_result" => "wrong_password");
    
            }
        }
    }else{
        $login_response[] = array("login_result" => "unknownAccount");
    
    }


}else if($campus == "CCO"){
    if($resultCheck > 0){
        foreach($stmt as $row){
            if(md5($password )== $row['password'] && $row['campus'] == 'CCO'){

                $login_response[] = array("login_result" => "ssg_success");
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['loggedName'] = $row['firstName']." ".$row['lastName'];
                $_SESSION['campus'] = $_POST['campus'];
                $conn->exec($query);


    
            }else{
                $login_response[] = array("login_result" => "wrong_password");
    
            }
        }
    }else{
        $login_response[] = array("login_result" => "unknownAccount");
    
    }

}else if($campus == 'SSG'){

    if($resultCheck > 0){
        foreach($stmt as $row){
            if(md5($password )== $row['password'] && $row['campus'] == 'SSG'){

                $login_response[] = array("login_result" => "ssg_success");
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['loggedName'] = $row['firstName']." ".$row['lastName'];
                $_SESSION['campus'] = $_POST['campus'];
                $conn->exec($query);


    
            }else{
                $login_response[] = array("login_result" => "wrong_password");
    
            }
        }
    }else{
        $login_response[] = array("login_result" => "unknownAccount");
    
    }

}else if($campus == "USG"){
    
    if($resultCheck > 0){
        foreach($stmt as $row){
            if(md5($password )== $row['password'] && $row['campus'] == 'USG'){

                $login_response[] = array("login_result" => "usg_success");
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['loggedName'] = $row['firstName']." ".$row['lastName'];
                $_SESSION['campus'] = $_POST['campus'];
                $conn->exec($query);


    
            }else{
                $login_response[] = array("login_result" => "wrong_password");
    
            }
        }
    }else{
        $login_response[] = array("login_result" => "unknownAccount");
    
    }
    
}else if($campus == 'Plebiscite'){

    if($resultCheck > 0){
        foreach($stmt as $row){
            if(md5($password )== $row['password'] && $row['campus'] == 'Plebiscite'){

                $login_response[] = array("login_result" => "plebiscite_success");
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['loggedName'] = $row['firstName']." ".$row['lastName'];
                $_SESSION['campus'] = $_POST['campus'];
                $conn->exec($query);


    
            }else{
                $login_response[] = array("login_result" => "wrong_password");
    
            }
        }
    }else{
        $login_response[] = array("login_result" => "unknownAccount");
    
    }



}else if($campus == 'Technical-Officer' ){
    if($resultCheck > 0){
        foreach($stmt as $row){
            if(md5($password )== $row['password'] && $row['campus'] == 'Technical-Officer'){

                $login_response[] = array("login_result" => "tech_success");
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['loggedName'] = $row['firstName']." ".$row['lastName'];
                $conn->exec($query);


    
            }else{
                $login_response[] = array("login_result" => "wrong_password");
    
            }
        }
    }else{
        $login_response[] = array("login_result" => "unknownAccount");
    
    }

   

}else if($campus == 'Technical-Officer'){
    if($resultCheck > 0){
        foreach($stmt as $row){
            if(md5($password )== $row['password'] && $row['campus'] == 'Technical-Officer'){

                $login_response[] = array("login_result" => "tech_success");
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['loggedName'] = $row['firstName']." ".$row['lastName'];
                $conn->exec($query);

    
            }else{
                $login_response[] = array("login_result" => "wrong_password");
    
            }
        }
    }else{
        $login_response[] = array("login_result" => "unknownAccount");
    
    }
   
}else if($campus == 'Technical-Officer' && $username == "techaccess3"){
    if($resultCheck > 0){
        foreach($stmt as $row){
            if(md5($password )== $row['password'] && $row['campus'] == 'Technical-Officer'){
                
                $login_response[] = array("login_result" => "tech_success");
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['loggedName'] = $row['firstName']." ".$row['lastName'];
                $conn->exec($query);

    
            }else{
                $login_response[] = array("login_result" => "wrong_password");
    
            }
        }
    }else{
        $login_response[] = array("login_result" => "unknownAccount");
    
    }

    

}else if($campus == 'Monitoring'){

    if($resultCheck > 0){
        foreach($stmt as $row){
            if(md5($password )== $row['password'] && $row['campus'] == 'Monitoring'){
                
                $login_response[] = array("login_result" => "monitor_success");
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['loggedName'] = $row['firstName']." ".$row['lastName'];
                $conn->exec($query);

    
            }else{
                $login_response[] = array("login_result" => "wrong_password");
    
            }
        }
    }else{
        $login_response[] = array("login_result" => "unknownAccount");
    
    }

}else if($campus == 'Obrero-Watcher'){

    if($resultCheck > 0){
        foreach($stmt as $row){
            if(md5($password )== $row['password'] && $row['campus'] == 'Obrero-Watcher'){
    
                $login_response[] = array("login_result" => "watcher_success");
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['loggedName'] = $row['firstName']." ".$row['lastName'];
                $_SESSION['campus'] = "Obrero";

                $conn->exec($query);

    
            }else{
                $login_response[] = array("login_result" => "wrong_password");
    
            }
        }
    }else{
        $login_response[] = array("login_result" => "unknownAccount");
    
    }

}else if($campus == 'Mintal-Watcher'){

        if($resultCheck > 0){
            foreach($stmt as $row){
                if(md5($password )== $row['password'] && $row['campus'] == 'Mintal-Watcher'){
        
                    $login_response[] = array("login_result" => "watcher_success");
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['loggedName'] = $row['firstName']." ".$row['lastName'];
                    $_SESSION['campus'] = "Mintal";
    
                    $conn->exec($query);
    
        
                }else{
                    $login_response[] = array("login_result" => "wrong_password");
        
                }
            }
        }else{
            $login_response[] = array("login_result" => "unknownAccount");
        
        }

     } else if($campus == 'Mabini-Watcher'){

            if($resultCheck > 0){
                foreach($stmt as $row){
                    if(md5($password )== $row['password'] && $row['campus'] == 'Obrero-Watcher'){
            
                        $login_response[] = array("login_result" => "watcher_success");
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['loggedName'] = $row['firstName']." ".$row['lastName'];
                        $_SESSION['campus'] = "Mabini";
        
                        $conn->exec($query);
        
            
                    }else{
                        $login_response[] = array("login_result" => "wrong_password");
            
                    }
                }
            }else{
                $login_response[] = array("login_result" => "unknownAccount");
            
            }

        }else if($campus == 'Tagum-Watcher'){

                if($resultCheck > 0){
                    foreach($stmt as $row){
                        if(md5($password )== $row['password'] && $row['campus'] == 'Obrero-Watcher'){
                
                            $login_response[] = array("login_result" => "watcher_success");
                            $_SESSION['username'] = $_POST['username'];
                            $_SESSION['loggedName'] = $row['firstName']." ".$row['lastName'];
                            $_SESSION['campus'] = "Tagum";
            
                            $conn->exec($query);
            
                
                        }else{
                            $login_response[] = array("login_result" => "wrong_password");
                
                        }
                    }
                }else{
                    $login_response[] = array("login_result" => "unknownAccount");
                
                }
            

}else if($campus == "campus"){
    $login_response[] = array("login_result" => "campus_error");
   
}else{
    if($resultCheck > 0){
        foreach($stmt as $row){
            if(md5($password )== $row['password'] && $campus == $row['campus']){
    
                $login_response[] = array("login_result" => "success");
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['loggedName'] = $row['firstName']." ".$row['lastName'];
                $_SESSION['campus'] = $_POST['campus'];

                $conn->exec($query);

    
            }else{
                $login_response[] = array("login_result" => "wrong_password");
    
            }
        }
    }else{
        $login_response[] = array("login_result" => "unknownAccount");
    
    }
}

echo json_encode($login_response);



?>