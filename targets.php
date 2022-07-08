<?php
//connect to databse
$conn =new mysqli("localhost","root","","vehicle_management");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT * FROM targets";

$result=$conn->query($sql);  //retrieve terget details from databse
if ($result->num_rows > 0) {
	
    //print results
    while($row = $result->fetch_assoc()) {
        echo "Target id: ". $row["id"]." - Name: " . $row["name"]." - first_mission: " . $row["first_mission"]." - Type: " . $row["type"]. " - no of missions: ". $row["no_missions"]. "<br>";
    }
} else {
    echo "0 results";
}
echo "<br>";
echo '<form action="index.html"><input type="submit"value="Home"></form>';
?>
