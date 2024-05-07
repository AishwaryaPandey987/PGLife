<?php
require ("../includes/database_connect.php");

$full_name = $_POST['full_name'];
$card_number= $_POST['card_number'];
$card_expire = $_POST['card_expire'];
$card_cvv = $_POST['card_cvv'];
$email = $_POST['email'];

$sql = "SELECT * FROM payments WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if (!$result) {
  $response = array("success" => false, "message" => "Something went wrong!");
    echo json_encode($response);
    return;
}
$row_count = mysqli_num_rows($result);
if ($row_count == 0) {
	$response = array("success" => false, "message" => "This email id is not registered with us!");
	echo json_encode($response);
	return;
}

$sql = "INSERT INTO payments (email, full_name, card_number, card_expire, card_cvv) VALUES ('$email', '$full_name', '$card_number', '$card_expire', '$card_cvv')";
$result = mysqli_query($conn, $sql);
if (!$result) {
  $response = array ("success" => false, "message" => "Something went wrong!");
    echo json_encode($response);
    return;
}

$response = array("success" => true, "message" => "Your payment has been done successfully!");
echo json_encode($response);
mysqli_close($conn);
