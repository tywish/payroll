<?php

include("db.php");
include("auth.php");

$id         = $_POST['id'];
$lname      = $_POST['lname'];
$fname      = $_POST['fname'];
$gender      = $_POST['gender'];
$gender     = $_POST['account_no'];
$division   = $_POST['division'];
$emp_type   = $_POST['location'];

$sql = "UPDATE employee SET location='$location', lname='$lname', fname='$fname',gender='$gender', account_no='$account_no', division='$division' WHERE emp_id='$id'";

if (mysqli_query($conn, $sql)) {
  ?>
  <script>
    alert('Employee successfully updated.');
    window.location.href = 'home_employee.php';
  </script>
<?php
} else {
  ?>
  <script>
    alert('Invalid action.');
    window.location.href = 'home_employee.php';
  </script>
<?php
}
?>