<?php
require('db.php');

if (isset($_POST['submit']) != "") {
  $lname      = $_POST['lname'];
  $fname      = $_POST['fname'];
  $gender     = $_POST['gender'];
  $account_no = $_POST['account_no'];
  $location   = $_POST['location'];
  $division   = $_POST['division'];

  $sql = "INSERT into employee(lname, fname, gender, account_no, location, division)
  VALUES('$lname','$fname','$gender','$account_no', '$location', '$division')";

  if (mysqli_query($conn, $sql)) {
    ?>
    <script>
      alert('Employee had been successfully added.');
      window.location.href = 'home_employee.php?page=emp_list';
    </script>
  <?php
    } else {
      ?>
    <script>
      alert('Invalid.');
      window.location.href = 'index.php';
    </script>
<?php
  }
}
?>