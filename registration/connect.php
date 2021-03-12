<?php
	$first_name= $_POST['first_name'];
	$last_name = $_POST['last_name'];
    $Student_ID = $_POST['Student_ID'];
	$Vehicle_Type = $_POST['Vehicle_Type'];
	$Vehicle_no = $_POST['Vehicle_no'];
	$area_code = $_POST['area_code'];
	$phone = $_POST['phone'];

	// Database connection
	$conn = new mysqli('localhost','root','','iiit_bh');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into register(first_name, last_name, Student_ID, Vehicle_Type, Vehicle_no, area_code,phone) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssii", $first_name, $last_name, $Student_ID, $Vehicle_Type, $Vehicle_no, $area_code, $phone);
		$execval = $stmt->execute();
		echo $execval;
		echo "<img src='submitted_successfully.png' alt='Successfully Submitted' class='center'>";
		$stmt->close();
		$conn->close();
	}
?>

<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>