

<!DOCTYPE html>
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
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
</style>
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
			<li ><a href="userpg.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="active"><a href="result.php"><em class="fa fa-bar-chart">&nbsp;</em> charts</a></li>
			<li ><a href="updatepg.php"><em class="fa fa-edit">&nbsp;</em> Updates</a></li>
			<li ><a href="search.php"><em class="fa fa-search">&nbsp;</em> Search Student</a></li>
			 <li><a href="resultchart.php"><em class="fa fa-bar-chart">&nbsp;</em>Result charts</a></li>
			<li><a href="index.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->	
	
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Charts</h1>
			</div>
		</div><!--/.row-->
	<div class="panel panel-default">
					<div class="panel-heading">Academic Year wise:</div>
					<div class="panel-body">
						<div class="col-md-6">
						
					<form method="post" action="">
					<div class="form-group">
				<label>Course: </label><input type="text" name="br" class="form-control">
					</div>
					<div class="form-group">
					<label>Academic Year: </label><input type="text" name="aca_year" class="form-control"></div>
					
					<!--year: <input type="text" name="year">-->
			
					 <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
					</form></div>
					
					<br><br>
					<div class="col-md-12">
					
					<?php 
	if(isset($_POST["submit"]))
{
	$year=$_POST['aca_year'];
	$servername = "localhost";
$username = "root";
$password = "toor2020";
$dbname = "acyear$year";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

	
	//$yr=$_POST['year'];
	$br=$_POST['br'];
	$sub=$conn->query("SELECT COUNT(DISTINCT subcode) as sub FROM `regular` where branch='$br'");
	$subj = $sub -> fetch_assoc();
	$subjects=$subj['sub'];
	
	$inserttt= $conn->query("SELECT COUNT(DISTINCT hno) FROM `regular` where branch='$br'");
	
 $row = $inserttt -> fetch_assoc();
  ?>

						<div class="card">
 
  <div class="container">
    <h4><b>Result</b></h4> 
	<p>Total students: <?php echo $row['COUNT(DISTINCT hno)']; ?></p>
	<?php 
	 $cc= $conn->query("SELECT hno from regular where branch='$br' and status='pass' GROUP BY hno HAVING count(hno)>='$subjects'");
	  $rowcount=mysqli_num_rows($cc);

  //$row = $insert -> fetch_assoc();
	?> 
    <p>without backlogs: <?php echo $rowcount; ?> &nbsp;&nbsp;&nbsp;<a href="details.php?dbname=<?php echo $dbname;?>,<?php echo $br;?>">Details</a> </p> 
	<?php 
	 $insert1= $conn->query("SELECT hno from regular where branch='$br' and status='fail' GROUP BY hno HAVING count(hno)>=1");
    $rowcount1=mysqli_num_rows($insert1);

  // $row = $insert1 -> fetch_assoc();
	?>
	<p>with backlogs: <?php echo $rowcount1; ?>&nbsp;&nbsp;&nbsp;<a href="details.php?fdbname=<?php echo $dbname;?>,<?php echo $br;?>">Details</a></p>
	
  </div><?php }?>
                        </div></div><br>
                        <div class="panel-heading">Sem wise:</div>
<div class="panel-body">
<br><br>
						<div class="col-md-6">
						
	<form method="post" action="">
					<div class="form-group">
					<label>Academic Year:</label> <input type="text" name="aca_year" class="form-control"></div>
					<!-- <div class="form-group"><label>Year of exam: </label><input type="text" name="year" class="form-control"> </div>
				--></div>	<div class="col-md-6">
				<div class="form-group">
										<label>Course</label>
										<select name="course" class="form-control">
										    <option>Select</option>
											<option value="CSE">CSE</option>
											<option value="ECE">ECE</option>
											<option value="EEE">EEE</option>
											<!--<option>Option 4</option>-->
										</select>
										</div>
									<div class="form-group">
					
										<label>batch</label>
										<select name="batch" class="form-control">
                                            <option>Select</option>
                                            <option value="1-1">1-1</option>
                                            <option value="1-2">1-2</option>
                                            <option value="2-1">2-1</option>
                                            <option value="2-2">2-2</option>
                                            <option value="3-1">3-1</option>
                                            <option value="3-2">3-2</option>
                                            <option value="4-1">4-1</option>
                                            <option value="4-2">4-2</option>
										</select>
									</div>

								<div class="col-md-6">
					 <input type="submit" name="submityear" class="btn btn-primary" value="Submit"/><br>
					</form> </div>
						<div class="col-md-12">
<?php 
	if(isset($_POST["submityear"]))
{
	$year=$_POST['aca_year'];
	$servername = "localhost";
$username = "root";
$password = "toor2020";
$dbname = "acyear$year";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

	
	$course=$_POST['course'];
	//$yr=$_POST['year'];


	$batch=$_POST['batch'];
	
	$sub=$conn->query("SELECT COUNT(DISTINCT subcode) as sub FROM `regular` where branch='$course' AND course='$batch' ");
	$subj = $sub -> fetch_assoc();
	$subjects=$subj['sub'];
	
	
	$insertt= $conn->query("SELECT count(distinct hno) FROM `regular` WHERE branch='$course' AND course='$batch'");
				 $row = $insertt -> fetch_assoc();
  ?>
  <br>
						<div class="card">
 
  <div class="container">
    <h4><b>Result</b></h4> 
	 <p>Total Students: <?php echo $row['count(distinct hno)']; ?></p>
	<?php 
	 $insert= $conn->query("SELECT count(hno),hno from regular where branch='$course'  AND course='$batch' AND gradepoints>0 GROUP BY hno HAVING count(hno)='$subjects'");

    $rowcount=mysqli_num_rows($insert);
	?>
    <p>without backlogs: <?php echo $rowcount; ?>&nbsp;<a href="semdetails.php?dbname=<?php echo $dbname;?>,<?php echo $batch; ?>,br=<?php echo $course; ?>">Details</a></p>
	<?php 
	 $insert1= $conn->query("SELECT count(hno),hno from regular where branch='$course' AND course='$batch' AND gradepoints=0 GROUP BY hno HAVING count(hno)>=1");
    $rowcount2=mysqli_num_rows($insert1);
	?>
	<p>with backlogs: <?php echo $rowcount2; ?> &nbsp;<a href="semdetails.php?fdbname=<?php echo $dbname;?>,<?php echo $batch; ?>,br=<?php echo $course; ?>">Details</a></p>
	
  </div><?php }?>
</div></div>
   </div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			<div class="col-sm-12">
				<p class="back-link">Designed & developed by Sai Bhavya</p>
			</div>
		</div><!-- /.row -->
	</div><!--/.main-->
	

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<!--<script src="js/chart-data.js"></script>-->
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
	
	</script>
	
		</body>
</html>
			
					
				                                          