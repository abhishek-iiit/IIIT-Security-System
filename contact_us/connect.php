<?php
	$name = $_POST['name'];
	$Student_ID = $_POST['Student_ID'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','iiit_bh');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact(name, Student_ID, phone, email, message) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssiss", $name, $Student_ID, $phone, $email, $message);
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