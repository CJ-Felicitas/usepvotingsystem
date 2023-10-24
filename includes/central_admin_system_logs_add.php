<!-- clear logs -->

<?php
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    $query = "TRUNCATE TABLE tblogs";
    if(isset($_POST['empty'])){
        mysqli_query($conn,$query);
    }

    $conn -> close();
?>

<!-- election date data -->
<?php
  $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
  $query  = "SELECT * FROM tbelectiondate";
  $dates = array();
  $result = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($result)) {
    $dates[] = $row;
  }
  $conn -> close();
  
?>
<!-- get the date and time in the db -->
<?php 
  $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
  $query = "SELECT * from tbelectiondate";
  $result = mysqli_query($conn,$query);

  while($row = mysqli_fetch_assoc($result)){
    $GLOBALS['sDate'] = $row['start_date'];
    $GLOBALS['eDate'] = $row['end_date'];
    $GLOBALS['sTime'] = $row['start_time'];
    $GLOBALS['eTime'] = $row['end_time'];

  }

  $conn -> close();

?>

<?php
  error_reporting(0);
  date_default_timezone_set('Asia/Manila');
  $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
  $query  = "SELECT * FROM tblogs ORDER BY timestamp DESC";
  $nominees = array();
  $result = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($result)) {
    $logs[] = $row;
  }
?>
