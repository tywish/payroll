<?php
include("db.php"); //include auth.php file on all secure pages
include("auth.php");

$sql = "SELECT * from deductions WHERE deduction_id='1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

  while ($row = $result->fetch_assoc()) {

    $nssf = $row['nssf'];
    $absent = $row['absent'];
    $loans = $row['loans'];
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
 
    var ScrollMsg = "Payroll and Management System - "
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
    </div><br><br>

    <?php
    $id = $_REQUEST['emp_id'];
    $sql = "SELECT * from employee where emp_id='" . $id . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {

        ?>

        <form class="form-horizontal" action="update_employee.php" method="post" name="form">
          <input type="hidden" name="new" value="1" />
          <input name="id" type="hidden" value="<?php echo $row['emp_id']; ?>" />
          <div class="form-group">
            <label class="col-sm-5 control-label"></label>
            <div class="col-sm-4">
              <h2><?php echo $row['lname']; ?>, <?php echo $row['fname']; ?></h2>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-5 control-label">Lastname :</label>
            <div class="col-sm-4">
              <input type="text" name="lname" class="form-control" value="<?php echo $row['lname']; ?>" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-5 control-label">Firstname :</label>
            <div class="col-sm-4">
              <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']; ?>" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-5 control-label">account_no :</label>
            <div class="col-sm-4">
              
                <input type="text" name="account_no" class="form-control" value="<?php echo $row['account_no']; ?>" required="required">
               
             
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-5 control-label">location :</label>
            <div class="col-sm-4">
              <select name="location" class="form-control" required>
                <option value="<?php echo $row['location']; ?>"><?php echo $row['location']; ?></option>
                <option value="Jan international">Jan internation</option>
                <option value="magomeni">magomeni</option>
                <option value="posta">posta</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-5 control-label">Department :</label>
            <div class="col-sm-4">
              <select name="division" class="form-control" placeholder="Division" required>
                <option value="<?php echo $row['division']; ?>"><?php echo $row['division']; ?></option>
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
          </div><br><br>

          <div class="form-group">
            <label class="col-sm-5 control-label"></label>
            <div class="col-sm-4">
              <input type="submit" name="submit" value="Update" class="btn btn-danger">
              <a href="home_employee.php" class="btn btn-primary">Cancel</a>
            </div>
          </div>
        </form>
    <?php
      }
    }
    ?>

    <!-- this modal is for my Colins -->
    <div class="modal fade" id="tywish" role="dialog">
      <div class="modal-dialog modal-sm">

        <!-- Modal content-->
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