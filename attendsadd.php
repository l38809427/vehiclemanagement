<?php
//get form data
$id=(int)filter_input(INPUT_GET,'id');
$name=filter_input(INPUT_GET,'name');
$no_missions=(int)filter_input(INPUT_GET,'no_missions');

//connect to database
$conn =new mysqli("localhost","root","","vehicle_management");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//check if the foreign key exists
$sql=" SELECT * FROM astronaut WHERE astronaut_id = '$id' ";
$result=$conn->query($sql);
if($result->num_rows==0)
{
	echo "Astronaut ID not found";
	echo '<form action="index.html"><input type="submit"value="Retry"></form>';
	$conn->close();
	exit();
}

//check if foreign key for mission exists
$sql=" SELECT * FROM mission WHERE name = '$name' ";
$result=$conn->query($sql);
if($result->num_rows==0)
{
	echo "Mission name not found";
	echo '<form action="index.html"><input type="submit"value="Retry"></form>';
	$conn->close();
	exit();
}

$sql="INSERT INTO attends (astronaut_id,mission_name,no_missions) VALUES ($id,'$name',$no_missions)";

//perform the insertion and show an error if it failsif($conn->query($sql))
if($conn->query($sql))
{
	echo "New astronaut assigned to a mission";
}
else
	{echo "Primary Key should not have duplicates or null";}
echo "<br><br>";
echo '<form action="index.html"><input type="submit"value="Home"></form>';
$conn->close();
?>