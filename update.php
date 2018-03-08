
<!DOCTYPE html>
<html>
<body>

<?php

/* Attempt MySQL server connection. Assuming you are running MySQL

server with default setting (user 'root' with no password) */

$link = mysqli_connect("localhost", "root", "root", "printJobs");

 

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

    
$firstName = mysqli_real_escape_string($link, $_GET['firstName']);
$lastName = mysqli_real_escape_string($link, $_GET['lastName']);
$paceEmail = mysqli_real_escape_string($link, $_GET['paceEmail']);
$accountBalance = mysqli_real_escape_string($link, $_GET['accountBalance']);


$sql = "insert into userInfo (studentNumber,firstName,lastName,paceEmail,accountBalance) values ('17','$firstName','$lastName','$paceEmail','$accountBalance')";
    echo $sql;
    
    if(mysqli_query($link,$sql)){
        echo "Successful insertion!";
    }
    else{
        echo "UNsuccessful insertion: $sql ".mysqli_error($link);
    }
    
    mysqli_close($link);
    
    ?>
    
    
    
    
    
    
    
    
    
    
// Attempt select query execution
function printTable($link){
$sql = "SELECT * FROM userInfo";

if($result = mysqli_query($link, $sql)){

    if(mysqli_num_rows($result) > 0){

        echo "<table>";

            echo "<tr>";

                echo "<th>studentNumber</th>";

                echo "<th>lastName</th>";

                echo "<th>firstName</th>";
                echo "<th>paceEmail</th>";
                echo "<th>accountBalance</th>";

            echo "</tr>";

        while($row = mysqli_fetch_array($result)){

            echo "<tr>";

                echo "<td>" . $row['studentNumber'] . "</td>";

                echo "<td>" . $row['lastName'] . "</td>";

                echo "<td>" . $row['firstName'] . "</td>";
                echo "<td>" . $row['paceEmail'] . "</td>";
                echo "<td>" . $row['accountBalance'] . "</td>";

            echo "</tr>";

        }

        echo "</table>";
        
        mysqli_free_result($result);
        // Close result set
    } else{

        echo "No records matching your query were found.";

    }
    


} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}}
   
    ?>
    
<!--
    ////WILLIAM BENDER PACE UNIVERSITY
    //tc56938p
    printTable($link);
echo "<p>-------------------------Below is is table with new entry and the first entry is updated----------------------</p>";
        $insertSQL = "INSERT INTO userInfo (studentNumber, lastName, firstName,paceEmail,accountBalance) VALUES ('16', 'Bender', 'William', 'wb14748p','$12.10')";
        $updateSQL = "UPDATE `userInfo` SET  `paceEmail`='tc56938p' WHERE (studentNumber = '1' AND lastName = 'Cabrer')";

    if(mysqli_query($link, $insertSQL)){
        echo "<p>The insertion was successful</p>";
    }
    if(mysqli_query($link, $updateSQL)){
        echo "<p>The update was successful</p>";
    }
    else {
        echo "<p>The insertion was UNsuccessful</p>";
    }
    printTable($link);
    
    
    
 

// Close connection

mysqli_close($link);

?>
-->

</body>
</html>