<?php

include 'conn.php';
$id=$_POST['query'];

/* Check if query has been passed. If so, compare the user id with the query and delete from
the records) */    

$query = "DELETE FROM users WHERE id = $id"; 
$result = $conn->query($query);

return $result;

$conn->close(); 

?>
