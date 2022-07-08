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

$sql="INSERT INTO astronaut (astronaut_id,name,no_missions) VALUES ($id,'$name',$no_missions)";

//perform the insertion and show an error if it fails
if($conn->query($sql)) 
{
	echo "new astronaut details added";
}
else
	{echo "Primary Key should not have duplicates or null";}
echo "<br><br>";
echo '<form action="index.html"><input type="submit"value="Home"></form>';
$conn->close();
?>