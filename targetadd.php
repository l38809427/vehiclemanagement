<?php
//get form data
$target_id=(int)filter_input(INPUT_GET,'target_id');
$name=filter_input(INPUT_GET,'name');
$first_mission=filter_input(INPUT_GET,'first_mission');
$type=filter_input(INPUT_GET,'type');
$no_missions=(int)filter_input(INPUT_GET,'no_missions');

//connect to database
$conn =new mysqli("localhost","root","","vehicle_management");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="INSERT INTO targets (id, name, first_mission, type, no_missions) VALUES ($target_id,'$name','$first_mission','$type',$no_missions)";

//perform the insertion and show an error if it fails
if($conn->query($sql))
{
	echo "new target details added";
}
else
	{echo "Primary Key should not have duplicates or null";}
echo "<br><br>";
echo '<form action="index.html"><input type="submit"value="Home"></form>';
$conn->close();
?>