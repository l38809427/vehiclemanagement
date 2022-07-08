<?php
//connect to databse
$conn =new mysqli("localhost","root","","vehicle_management");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT * FROM astronaut";

$result=$conn->query($sql);  //retrieve astronaut data from database
if ($result->num_rows > 0) {
	
    //display the results
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["astronaut_id"]. " - Name: " . $row["name"]. " - no_missions: ". $row["no_missions"]."<br>";
    }
} else {
    echo "0 results";
}
echo "<br>";
echo '<form action="index.html"><input type="submit"value="Home"></form>';
?>
