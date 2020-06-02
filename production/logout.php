<?php
    session_start();
	session_destroy();
	header("location: ../production/index.php");
?>