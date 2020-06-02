<?php
include "connect.php";

$name= $_POST['salon'];
$phone= $_POST['phone'];
$email= $_POST['email'];
$pass= $_POST['pass'];
$address= $_POST['address'];
$open_time = $_POST['open_time'];
$close_time = $_POST['close_time'];

$result = $conn->query("SELECT * FROM `salon` WHERE email = \"$email\"");

if ($result->num_rows > 0) {
    echo "Error: Email Already exist";
    header("location: ../production/index.php#signup");
}
else{
$sql = "INSERT INTO `salon`(`salonID`,`name`, `email`, `phone`,`password`,`address`,`open_time`,`close_time`) 
                    VALUES (NULL, '$name','$email','$phone','$pass','$address','$open_time','$close_time')";

if ($conn->query($sql) === TRUE) {
    $getid = $conn->query("SELECT salonID FROM `salon` WHERE email = \"$email\"");
    $row = $getid->fetch_assoc();
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $name;
    $_SESSION['id'] = $row["salonID"];
    header("location: ../production/home.php");
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>