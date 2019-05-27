<?php
require 'conn.php';
$output = '';

/* Check if POST name which is passed has a value, 
if so do a specific MySQL query statement with LIKE to search from the database for the name */    

    if(isset($_POST["name"])) {
 
        $search = $conn->real_escape_string($_POST["name"]);
        $query = 
        "SELECT users.id, users.name, users.email, groups.name 
        FROM users 
        LEFT JOIN groups ON users.group = groups.id
        WHERE users.name LIKE '%".$search."%' 
        GROUP BY users.id";

    }

/* If there is no value/parameter passed then do the default MySQL statement to fetch ALL users */    

    else {

        $query = 
        "SELECT users.id, users.name, users.email, groups.name 
        FROM users 
        LEFT JOIN groups ON users.group = groups.id 
        GROUP BY users.id";
    }

/* Connect the MySQL query statement with the database */    

    $result = $conn->query($query);

/* Check if there are more than 0 records, if so then fetch all users that match with the MySQL query
output the result as a table. Variable $row will be set as numeric array; 0 = User ID, 1 = Name etc */    

    if($result->num_rows > 0) {
    
            $output .= '

                    <thead>
                        <tr>
                            <th> User ID </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Group </th>
                            <th> View | Delete </th>
                        </tr>
                    </thead>
                ';

        while($row=$result->fetch_array(MYSQLI_NUM))  {    
            $output .= '
                <tbody>
                    <tr>
                        <td> '.$row[0]. '</td>
                        <td>' .$row[1]. '</td>
                        <td>' .$row[2]. '</td>
                        <td>' .$row[3]. '</td>
                        <td>
                            <button id='.$row[0].' class="btn btn-info btn-sm info">Logs</button>&nbsp&nbsp
                            <button id='.$row[0].' class="btn btn-danger btn-sm delete">Delete</button>
                        </td>                    
                    </tr>
                </tbody>

            ';

        }
    /* Output  the result*/    

        echo $output;
                
    }
    /* If there is no results matched then output the below */    

    else {
        
        echo '<p> No result :( </p>';
    }

/* Close connection */    

$conn->close();

?>
