<?php        

include "connect.php";
  
    
    if(!$_SESSION['id']){  
        header("location: ../production/appointments.php");//redirect to login page to secure the welcome page without login access.  
    }
    if(isset($_GET['aId'])){
        $aId=$_GET['aId'];
        $query = "UPDATE `appointments` SET `Status` = 'cancelled' WHERE `appointments`.`Appointment_Id` = $aId;";
        mysqli_query($conn, $query);
        header("location: ../production/appointments.php");
    }
$conn->close();
    ?>