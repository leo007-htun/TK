<?php
	$NAME = $_POST['NAME'];
	$EMAIL = $_POST['EMAIL'];
	$PHONE = $_POST['PHONE'];
	$POSTCODE = $_POST['POSTCODE'];

	// Database connection
	$conn = new mysqli('localhost','root','','survey');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into tbl_survey(NAME, EMAIL, PHONE, POSTCODE) values(?,?,?,?)");
		$stmt->bind_param("ssss", $NAME, $EMAIL, $PHONE, $POSTCODE);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>