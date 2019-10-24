<?php
include("auth.php");
include("add_employee.php");
?>

<?php

require('db.php');

$sql = "SELECT * from deductions";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

  while ($row = mysqli_fetch_assoc($result)) {
    $id           = $row['deduction_id'];
    $nssf         = $row['nssf'];
    $absent       = $row['absent'];
    $loans        = $row['loans'];

    $total        = $nssf+ $absent + $loans;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
  <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

  <title></title>

  <script>
    var ScrollMsg = "Payroll Management System - "
    var CharacterPosition = 0;

    function StartScrolling() {
      document.title = ScrollMsg.substring(CharacterPosition, ScrollMsg.length) +
        ScrollMsg.substring(0, CharacterPosition);
      CharacterPosition++;
      if (CharacterPosition > ScrollMsg.length) CharacterPosition = 0;
      window.setTimeout("StartScrolling()", 150);
    }
    StartScrolling();
  </script>

  <link href="assets/must.png" rel="shortcut icon">
  <link href="assets/css/justified-nav.css" rel="stylesheet">


  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
 
  <link href="assets/css/search.css" rel="stylesheet">
  
  <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

</head>

<body>

  <div class="container">
    <div class="masthead">
      <h3>
        <b>Payroll Management System</b>
        <a data-toggle="modal" href="#tywish" class="pull-right"><b><?php echo $_SESSION['username']; ?></b></a>
      </h3>
      <nav>
        <ul class="nav nav-justified">
          <li><a href="home_employee.php">Employee</a></li>
          <li><a href="home_deductions.php">Deduction/s</a></li>
          <li><a href="home_salary.php">Income</a></li>
        </ul>
      </nav>
    </div><br>

    <!-- Jumbotron -->
    <div class="jumbotron">
      <h1>PAYROLL MANAGEMENT</h1>
      <p class="lead">This payroll management system has improvised all the basic exercise to manage the salary of the employees.</p>

    </div>


    <footer class="footer">
      <p align="center">&copy; 2019 PAYROLL MANAGEMENT SYSTEM</p>

    </footer>





    <div class="modal fade" id="tywish" role="dialog">
      <div class="modal-dialog modal-sm">


        <div class="modal-content">
          <div class="modal-header" style="padding:20px 50px;">
            <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
          </div>
          <div class="modal-body" style="padding:40px 50px;">
            <div align="center">
              <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <script src="assets/js/search.js"></script>
  <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

  <!-- FOR DataTable -->
  <script>
    {
      $(document).ready(function() {
        $('#myTable').DataTable();
      });
    }
  </script>

  <!-- this function is for modal -->
  <script>
    $(document).ready(function() {
      $("#myBtn").click(function() {
        $("#myModal").modal();
      });
    });
  </script>

</body>

</html>