<?php        

include "connect.php";

$email= $_POST['email'];
$pass= $_POST['pass'];

$result = $conn->query("SELECT salonID, name, email, password FROM salon");

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {        
        if($email == $row["email"]){
            if($pass == $row["password"]){
				session_start();
				//$_SESSION['sub-admin_sid']=session_id();
                $name = $row["name"];
                $id = $row["salonID"];
				$_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                $_SESSION['id'] = $id;
				header("location: ../production/home.php");
			}
            else{
                echo "Wrong Email or Password";
                include "index.php";
                break;
			}
        }
        else{
        }
    }
} else {
    echo "Account Doesn't exist";
}

$conn->close();
?>
