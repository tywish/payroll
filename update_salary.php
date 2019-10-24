<?php

require("db.php");

@$id 			= $_POST['salary_id'];
@$salary		= $_POST['salary_rate'];


$sql = "UPDATE salary SET salary_rate='$salary' WHERE salary_id='1'";

if (mysqli_query($conn, $sql)) {
	?>
	<script>
		alert('Salary rate successfully changed...');
		window.location.href = 'home_salary.php';
	</script>
<?php
} else {
	echo "Not Successfull!";
}
?>