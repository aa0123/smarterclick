<?php

include 'conn.php';
$id= $_POST['query'];
$output = '';
$date = new DateTime();

/* Check if POST query which is passed has a value (id), 
if so do a specific MySQL query statement with INNER JOIN to join and compare 2 different tables in the database 
with a specified ID. */ 

    if(isset($_POST['query'])){
        $query = "SELECT user_logs.id, users.name, user_logs.timestamp, user_logs.type, user_logs.message 
        FROM user_logs INNER JOIN users ON user_logs.user_id = $id 
        GROUP BY user_logs.id";

/* Connect the MySQL query statement with the database */    

        $result = $conn->query($query);

/* Check if there are more than 0 records, if so then fetch all user logs that match with the MySQL query
output the result as a table. Variable $row will be set as numeric array; 0 = User ID, 1 = Name etc */

        if($result->num_rows > 0){
            $output .= '
                <thead>
                    <tr>
                        <th>Log ID</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Message</th>
                    </tr>
                </thead>
            ';
            

            while($row = $result->fetch_array(MYSQLI_NUM)){
                $timestamp = $date->setTimestamp($row[2]);
                $setDate =  $timestamp->format('M j Y g:i A');
                $output .=
                 '
                    <tbody>
                        <tr>
                            <td id='.$row[0].'> '.$row[0]. '</td>
                            <td>' .$row[1]. '</td>
                            <td>' .$setDate. '</td>
                            <td>' .$row[3]. '</td>
                            <td>' .$row[4]. '</td>
                        </tr>
                    </tbody>
                    
                ';
            }

/* Output the result*/    

            echo $output;

        } 

/* If there are no logs matched then output the below */    

        else {

            echo "<p>No logs found :(</p>";

        }
    }
    $conn->close();
?>
