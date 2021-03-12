<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$Student_ID = $_POST['Student_ID'];
	$pass = $_POST['pass'];

	// Database connection
	$conn = new mysqli('localhost','root','','iiit_bh');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into signup(name, email, Student_ID, pass) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $email, $Student_ID, $pass);
		$execval = $stmt->execute();
		echo $execval;
		echo "<img src='submitted_successfully.png' alt='Successfully Submitted' class='center'></br><a href='/iiit_bh/registration/' class='center'>
		<img src='register_form.PNG' alt='Register from' title='Click here to Register your Vehicle'/>
		</a>";
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