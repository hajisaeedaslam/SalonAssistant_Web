<?php
include "connect.php";
session_start(); 

if(isset($_SESSION['id'])==false){
    header("location: ../production/index.php");
}
else{
    $id = $_SESSION['id'];
    
    $oldpass= $_POST['oldpass'];
    $newpass= $_POST['newpass'];
    $renewpass= $_POST['renewpass'];
    
    $result = $conn->query("SELECT password FROM salon WHERE `salon`.`salonID` = \"$id\"");
    $row = $result->fetch_assoc();
    
    if($row["password"] == $oldpass){
        if($conn->query("UPDATE `salon` SET `password` = \"$newpass\" WHERE `salon`.`salonID` = \"$id\"") === TRUE){
            header("location: ../production/home.php");
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else{
        echo "Wrong Password";
        header("location: ../production/changepassword.php");
    }
    
    $conn->close();
}
?>
