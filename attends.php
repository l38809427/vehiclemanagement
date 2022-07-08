<?php
//connect to databse
$conn =new mysqli("localhost","root","","vehicle_management");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT * FROM attends";

$result=$conn->query($sql);  //retrieve attendance data from database
if ($result->num_rows > 0) {
	
    //print results
    while($row = $result->fetch_assoc()) {
        echo "Astronaut id: " . $row["astronaut_id"]. " - Mission name: " . $row["mission_name"]. " - no of missions: ". $row["no_missions"]."<br>";
    }
} else {
    echo "0 results";
}
echo "<br>";
echo '<form action="index.html"><input type="submit"value="Home"></form>';
?>
