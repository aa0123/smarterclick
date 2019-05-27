<?php

/* Set up connection to phpMyAdmin, connect the database */    
    
$dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "jun_full_stack_may_2019";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
    if($conn === false){
        die("ERROR: Could not connect. " . $conn->connect_error);
    }

?>