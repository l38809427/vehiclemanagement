<?php
//get form data
$name=filter_input(INPUT_GET,'name');
$destination=filter_input(INPUT_GET,'Destination');
$launch_date=filter_input(INPUT_GET,'launch_date');
$type=filter_input(INPUT_GET,'type');
$crew_size=(int)filter_input(INPUT_GET,'size');
$target_id=(int)filter_input(INPUT_GET,'target_id');

//connect to database
$conn =new mysqli("localhost","root","","vehicle_management");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//check if the foreign key exists
$sql=" SELECT * FROM targets WHERE id = '$target_id' ";
$result=$conn->query($sql);
if($result->num_rows==0)
{
	echo "Target id (Foreign key) not found";
	echo '<form action="index.html"><input type="submit"value="Retry"></form>';
	$conn->close();
}
else
{

	$sql="INSERT INTO mission (name, destination, launch_date, type, crew_size,target_id) VALUES ('$name','$destination','$launch_date','$type',$crew_size,$target_id)";

	//perform the insertion and show an error if it fails
	if($conn->query($sql))
	{
		echo "new mission details added";
	}
	else
		{echo "Primary Key should not have duplicates or null";}
	echo "<br><br>";
	echo '<form action="index.html"><input type="submit"value="Home"></form>';
	$conn->close();
	
}
?>