<?php 
session_start(); 
session_destroy(); 
header("LOCATION: logina.php");
?>