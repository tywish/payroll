<?php

require("db.php");

@$id 			= $_POST['deduction_id'];
@$nssf       	= $_POST['nssf'];
@$absent 		= $_POST['absent'];
@$loans 		= $_POST['loans'];


$sql = "UPDATE deductions SET absent='$absent', loans='$loans', nssf='$nssf' WHERE deduction_id='1'";

if (mysqli_query($conn, $sql)) {
	?>
	<script>
		alert('Deductions successfully updated...');
		window.location.href = 'home_deductions.php';
	</script>
<?php
} else {
	echo "Not Successfull!";
}
?>