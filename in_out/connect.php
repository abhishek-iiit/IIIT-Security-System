<?php
	$Student_ID = $_POST['Student_ID'];
	$Vehicle_No = $_POST['Vehicle_No'];
	$opt = $_POST['opt'];
	$time_ = $_POST['time_'];

	// Database connection
	$conn = new mysqli('localhost','root','','iiit_bh');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into in_out(Student_ID, Vehicle_No, opt, time_) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss",$Student_ID, $Vehicle_No, $opt, $time_);
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