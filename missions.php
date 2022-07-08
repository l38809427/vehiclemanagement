<?php
//connect to databse
$conn =new mysqli("localhost","root","","vehicle_management");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT * FROM mission";

$result=$conn->query($sql);  //retrieve details from databse
if ($result->num_rows > 0) {
	
    //print the results
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]." - Destination: " . $row["destination"]." - Launch date: " . $row["launch_date"]." - Type: " . $row["type"]. " - Crew size: ". $row["crew_size"]. " - Target id: ". $row["target_id"]."<br>";
    }
} else {
    echo "0 results";
}
echo "<br>";
echo '<form action="index.html"><input type="submit"value="Home"></form>';
?>
