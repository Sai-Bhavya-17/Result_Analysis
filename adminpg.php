<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Result</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>PROJECT</span>DEMO</a>
				
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Admin</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		
		<ul class="nav menu">
			<li class="active"><a href="demo.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li ><a href="adminaction.php"><em class="fa fa-edit">&nbsp;</em> Actions</a></li>
			<li><a href="index.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
			<div class="col-lg-12">
				<h2>Academic Year </h2>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-body tabs">
                          <div class="panel-body">		
                             <form role="form" method="post" action="" enctype="multipart/form-data">
							 
							 <div class="form-group">
							 Academic year: <input type='text' name='acyear' class='form-control'>							
							 </div>
							 TABLES:
							<div class="checkbox">
								<label>
							  <input type='checkbox' name='regular' value='regular'> Regular<br>		
							   <input type='checkbox' name='supply' value='supply'>		Supply
							 </label>
							 </div>
							  <div class="form-group">
							  <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
							  </div>
							 
</form>							 
						</div>
						</div>
					</div>
				</div><!--/.panel-->
			</div><!--/.col-->


</div><!--/.main-->
	
		<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "toor2020";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST["submit"]))
{
	$ar=$_POST['acyear'];
	$acyear="acyear$ar";
	$reg=$_POST['regular'];
	$sup=$_POST['supply'];	
  
 $insert= $conn->query("CREATE DATABASE $acyear");
 
 $conn2 = mysqli_connect($servername, $username, $password,$acyear);

// Check connection
if (!$conn2) {
  die("Connection failed: " . mysqli_connect_error());
}
 $insert2= $conn->query("CREATE TABLE `$acyear`.`regular` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hno` varchar(20) NOT NULL,
  `subcode` varchar(10) NOT NULL,
  `subname` varchar(50) NOT NULL,
   `grade` varchar(10) NOT NULL,
   `gradepoints` varchar(10) NOT NULL,
   `course` varchar(20) NOT NULL,
   `regulation` varchar(10) NOT NULL,
   `extype` varchar(20) NOT NULL,
  `tot` int(10) NOT NULL,
  `percentage` varchar(10) NOT NULL,
  `doe` date NOT NULL,
  
  `status` varchar(10) NOT NULL,
  `branch` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)) ENGINE = InnoDB;");
 
 $insert3= $conn->query("CREATE TABLE `$acyear`.`supply` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hno` varchar(20) NOT NULL,
  `subcode` varchar(10) NOT NULL,
  `subname` varchar(50) NOT NULL,
   `grade` varchar(10) NOT NULL,
   `gradepoints` varchar(10) NOT NULL,
   `course` varchar(20) NOT NULL,
   `regulation` varchar(10) NOT NULL,
   `extype` varchar(20) NOT NULL,
  `tot` int(10) NOT NULL,
  `percentage` varchar(10) NOT NULL,
  `doe` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `branch` varchar(10) NOT NULL,
  
 PRIMARY KEY (`id`)) ENGINE = InnoDB;");
 
 
 if($insert && $insert2 && $insert3 ){
            echo ("<SCRIPT LANGUAGE='JavaScript'>
         var r= window.confirm('Succesfully created..');
    if (r)
    {
      window.location.href='';
    }
    else
   {
    window.location.href='';
       
    }
       </SCRIPT>
       ");
 }else{
            echo '<script language="javascript">';
echo 'alert("Record upload failed, please try again.")';
echo '</script>';
           
        } 
    
 }
?>