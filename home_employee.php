<?php
include("auth.php");
include("add_employee.php");

require('db.php');

$sql = "SELECT * from deductions WHERE deduction_id='1'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $nssf   = $row['nssf'];
    $absent = $row['absent'];
    $loans  = $row['loans'];
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
        <b><a href="index.php">Payroll Management System</a></b>
        <a data-toggle="modal" href="#tywish" class="pull-right"><b>tywish</b></a>
      </h3>
      <nav>
        <ul class="nav nav-justified">
          <li class="active">
            <a href="">Employee</a>
          </li>
          <li>
            <a href="home_deductions.php">Deduction/s</a>
          </li>
          <li>
            <a href="home_salary.php">Income</a>
          </li>
        </ul>
      </nav>
    </div>

    <br>
    <div class="well bs-component">
      <form class="form-horizontal">
        <fieldset>
          <button type="button" data-toggle="modal" data-target="#addEmployee" class="btn btn-success">Add New</button>
          <p align="center"><big><b>List of Employees</b></big></p>
          <div class="table-responsive">
            <form method="post" action="">
              <table class="table table-bordered table-hover table-condensed" id="myTable">

                <thead>
                  <tr class="info">
                    <th>
                      <p align="center">Name</p>
                    </th>
                    <th>
                      <p align="center">account_no</p>
                    </th>
                    <th>
                      <p align="center">location</p>
                    </th>
                    <th>
                      <p align="center">Department</p>
                    </th>
                    <th>
                      <p align="center">Action</p>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $sql = "select * from employee ORDER BY emp_id asc";
                  $result = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <tr>
                        <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['lname'] ?>, <?php echo $row['fname'] ?></a></td>
                        <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['account_no'] ?></a></td>
                        <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['location'] ?></a></td>
                        <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['division'] ?></a></td>
                        <td align="center">
                          <a class="btn btn-primary" href="view_account.php?emp_id=<?php echo $row["emp_id"]; ?>">Account</a>
                          <a class="btn btn-danger" href="delete.php?emp_id=<?php echo $row["emp_id"]; ?>">Delete</a>
                        </td>
                      </tr>

                  <?php }
                  } ?>
                </tbody>

                <tr class="info">
                  <th>
                    <p align="center">Name</p>
                  </th>
                  <th>
                    <p align="center">account_no</p>
                  </th>
                  <th>
                    <p align="center">location</p>
                  </th>
                  <th>
                    <p align="center">Department</p>
                  </th>
                  <th>
                    <p align="center">Action</p>
                  </th>
                </tr>
              </table>
            </form>
          </div>
        </fieldset>
      </form>
    </div>


    <div class="modal fade" id="addEmployee" role="dialog">
      <div class="modal-dialog">


        <div class="modal-content">
          <div class="modal-header" style="padding:20px 50px;">
            <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            <h3 align="center"><b>Add Employee</b></h3>
          </div>
          <div class="modal-body" style="padding:40px 50px;">

            <form class="form-horizontal" action="#" name="form" method="post">
              <div class="form-group">
                <label class="col-sm-4 control-label">Lastname</label>
                <div class="col-sm-8">
                  <input type="text" name="lname" class="form-control" placeholder="Lastname" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Firstname</label>
                <div class="col-sm-8">
                  <input type="text" name="fname" class="form-control" placeholder="Firstname" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Gender</label>
                <div class="col-sm-8">
                  <select name="gender" class="form-control" placeholder="gender" required>
                    <option value="">select</option>
                    <option value="male">male</option>
                    <option value="female">female</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">account_no</label>
                <div class="col-sm-8">
                  <input type="text" name="account_no" class="form-control" placeholder="account_no" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">location</label>
                <div class="col-sm-8">
                  <select name="location" class="form-control" placeholder="location" required>
                    <option value="">location</option>
                    <option value="Jan international">Jan international</option>
                    <option value="magomeni">magomeni</option>
                    <option value="posta">posta</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label">Division</label>
                <div class="col-sm-8">
                  <select name="division" class="form-control" placeholder="Division" required>
                    <option value="">Division</option>
                    <option value="Admin">Admin</option>
                    <option value="Human Resource">Human Resource</option>
                    <option value="Accounting">Accounting</option>
                    <option value="Engineering">Engineering</option>
                    <option value="MIS">MIS</option>
                    <option value="Supply">Supply</option>
                    <option value="Maintenance">Maintenance</option>
                    <option value="Control">Control</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label"></label>
                <div class="col-sm-8">
                  <input type="submit" name="submit" class="btn btn-success" value="Submit">
                  <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>


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