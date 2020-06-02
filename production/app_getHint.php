<?php
    session_start();  
    include("connect.php");
    if(!$_SESSION['id']){  
        header("Location: ../index.php");//redirect to login page to secure the welcome page without login access.  
    }  
    if(isset($_GET['search'])){
        $searchText =  $_GET['search'];
        
        $searchQuery = "SELECT salonID, name, email FROM salon where name LIKE '$searchText%'";
        $executesearchQuery = mysqli_query($conn, $searchQuery);
        $executesearchQuery1 = mysqli_query($conn, $searchQuery);
        
        $fetchSearchResult = mysqli_fetch_assoc($executesearchQuery);
        
        if($fetchSearchResult['name'] == ""){
            echo "No Match Found";
        }
		else{    
            
        if(mysqli_num_rows($executesearchQuery)>0) {
            echo "<table>";
            while($fetchSearchResult = mysqli_fetch_assoc($executesearchQuery1)){
                echo "<tr><td>".$fetchSearchResult["salonID"]."</td><td>".$fetchSearchResult["name"]."</td><td> ".$fetchSearchResult["email"]."</td>";
                echo "<td> <a href='completeappointment.php?aId=".$fetchSearchResult['salonID']."'> Complete </a> </td>";
                echo "<td> <a href='cancelappointment.php?aId=".$fetchSearchResult['salonID']."'> Cancel </a> </td></tr>";
            }
            echo "</table>";
            }
        }
    }
    
?>