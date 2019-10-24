<?php

include("db.php");
include("auth.php");

$id           = $_POST['id'];
$deduction    = $_POST['deduction'];
$overtime     = $_POST['overtime'];


$sql = "UPDATE employee SET deduction='$deduction', overtime='$overtime' WHERE emp_id='$id'";

if (mysqli_query($conn, $sql)) {
  ?>
  <script>
    alert('Account successfully updated.');
    window.location.href = 'home_employee.php';
  </script>
<?php
} else {
  echo "Invalid";
}
?>