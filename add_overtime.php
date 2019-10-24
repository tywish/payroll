<?php

require("db.php");

@$id 			= $_POST['ot_id'];
@$overtime		= $_POST['rate'];


$sql = "UPDATE overtime SET rate='$overtime' WHERE ot_id='1'";

if (mysqli_query($conn, $sql)) {
	?>
	<script>
		alert('Overtime rate per hour successfully changed...');
		window.location.href = 'home_salary.php';
	</script>
<?php
} else {
	echo "Not Successfull!";
}
?>