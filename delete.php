<?php
require('db.php');

$id = $_GET['emp_id'];
$sql = "DELETE FROM employee WHERE emp_id=$id";

if (mysqli_query($conn, $sql)) {
	header("Location: home_employee.php");
} else {
	$error = mysqli_error($conn);
	echo "Error deleting record: " . $error;
	die($error);
}
