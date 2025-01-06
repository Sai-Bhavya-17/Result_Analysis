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
			<li ><a href="adminpg.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="active"><a href="adminaction.php"><em class="fa fa-edit">&nbsp;</em> Actions</a></li>
			<li><a href="index.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
			
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-body tabs">
                          <div class="panel-body">
		
		<hr style="border-top:1px dotted #ccc;"/>
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add Database</button>
		<br /><br />
		<table class="table table-bordered">
			<thead class="alert-success">
				<tr>
					<th>Database</th>
					
					<th>Action</th>
				</tr>
			</thead>
			<tbody style="background-color:#fff;">
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
					$insert2= $conn->query("SHOW DATABASES");
					while ($row = mysqli_fetch_assoc($insert2)) {
					    
				?>
				<tr>
					<td><?php echo $row['Database'];?></td>
					
					<td><button class="btn btn-warning" data-toggle="modal" type="button" data-target="#update_modal<?php echo $row['Database']?>"><span class="glyphicon glyphicon-trash"></span></button>  <a href="exportData.php?db=<?php echo $row['Database']?>" class="btn btn-success">Export</a></td>
				</tr>
				<?php
				include 'update_user.php';
					} ?>
			</tbody>
		</table>
	</div>
	
	
	<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="">
					<div class="modal-header">
						<h3 class="modal-title">Add Database</h3>
					</div>
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>DB Name</label>
								<input type="text" name="dbname" class="form-control" required="required"/>
							</div>
							<div class="checkbox">
								<label>
							  <input type='checkbox' name='regular' value='regular' checked> Regular<br>		
							   <input type='checkbox' name='supply' value='supply' checked>		Supply
							 </label>
							 </div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
						<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>	

						</div>
						</div>
					</div>
				</div><!--/.panel-->
			</div><!--/.col-->


</div><!--/.main-->
	<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	
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
if(isset($_POST["save"]))
{
	$ar=$_POST['dbname'];
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
