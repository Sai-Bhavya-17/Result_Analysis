<?php
session_start();

?>

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
	 <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
<style type="text/css">
    .Table
    {
          border-collapse: collapse;
  width: 50%;
    }
    
    .Heading
    {
        display: table-row;
        font-weight: bold;
       text-align: left;
  padding: 8px;
    }
    .Row
    {
        display: table-row;
    }
    .Cell
    {
        display: table-cell;
        border: solid;
        border-width: thin;
       text-align: left;
  padding: 8px;
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
			<li ><a href="result.php"><em class="fa fa-bar-chart">&nbsp;</em> charts</a></li>
			<li class="active"><a href="updatepg.php"><em class="fa fa-edit">&nbsp;</em> Updates</a></li>
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
					<div class="panel-heading">Photographs</div>
	
		
<div class="panel-body">

						<div class="col-md-6">
						
	<form method="post" action="" >
					<div class="form-group">
					<label>Academic Year:</label> <input type="text" name="aca_year" class="form-control"></div>
					<!--<div class="form-group"><label>Year of exam: </label><input type="text" name="year" class="form-control"> </div>-->
					
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
									
								<center>
					 <input type="submit" name="submityear" class="btn btn-primary" value="Submit"/><br></center>
					</div>	</form> 
						<div class="col-md-12">
						
    <?php 
    if(isset($_GET['year']))
    {
        $year=strtok($_GET['year'], ",");
        
        
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
        ?>

 <div style="overflow-x:auto;">
 
 <div class="Table">
    
    <div class="Heading">
	 <div class="Cell">HNO</div>
	
	<div class="Cell">Action</div>
	<div class="Cell">Image</div>
	</div>
	
	<?php
	$sub=strstr($_GET['year'],",");
	$course = strtok($sub, ",crs=");
	
	
	
	
	$insertt= $conn->query("SELECT distinct hno,img FROM `regular` WHERE branch='$course' ");
				 // Associative array
	while( $row = mysqli_fetch_assoc($insertt) ) {
		
		
		
  ?>
  <div class="Row">
        <div class="Cell"><?php $hno=$row["hno"]; echo $row["hno"];?> </div>
 
  <div class="Cell">
  <form method="POST" action="" enctype="multipart/form-data"> 
    <input type="text" value="<?php echo $hno;?>" name="hno" hidden>
     <input type="text" value="<?php echo $year;?>" name="year" hidden>
      <input type="file" name="uploadfile" value=""> 
        <input type="submit" class="btn btn-primary" name="picc" value="Upload">
     </form> 
</div>
 <div class="Cell"> <img src="images/<?php echo $row['img'];?>" height="150px" width="150px"></div>
 </div>
   <?php }?>
 <?php 
        
    }
    else {
    ?>
  
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
?>

 <div style="overflow-x:auto;">
 
 <div class="Table">
    
    <div class="Heading">
	 <div class="Cell">HNO</div>
	
	<div class="Cell">Action</div>
	<div class="Cell">Image</div>
	</div>
	
	<?php
	$course=$_POST['course'];
	
	
	
	$insertt= $conn->query("SELECT distinct hno,img FROM `regular` WHERE branch='$course' ");
				 // Associative array
	while( $row = mysqli_fetch_assoc($insertt) ) {
		
		
		
  ?>
  <div class="Row">
        <div class="Cell"><?php $hno=$row["hno"]; echo $row["hno"];?> </div>
 
  <div class="Cell">
  <form method="POST" action="" enctype="multipart/form-data"> 
    <input type="text" value="<?php echo $hno;?>" name="hno" hidden>
     <input type="text" value="<?php echo $year;?>" name="year" hidden>
     <input type="text" value="<?php echo $course;?>" name="crs" hidden>
      <input type="file" name="uploadfile" value=""> 
        <input type="submit" class="btn btn-primary" name="pic" value="Upload">
     </form> 
</div>
 <div class="Cell"> <img src="images/<?php echo $row['img'];?>" height="150px" width="150px"></div>
 </div>
   <?php }}?>
 
  
  <?php } ?>
	
   
</div>
</div>


</div>
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
	<?php
 
  // If upload button is clicked ... 
		if(isset($_POST["pic"]))
		{
		    
		    $year=$_POST['year'];
		    
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
		    $cr=$_POST['crs'];
     $hno=$_POST['hno'];
    $filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
        $folder = "images/".$filename; 
          
   // $db = mysqli_connect("localhost", "root", "", "photos"); 
  
        // Get all the submitted data from the form 
        $sql= $conn->query("update regular set img='$filename' where hno='$hno'"); 
  
        // Execute query 
      //  mysqli_query($conn, $sql); 
          
        // Now let's move the uploaded image into the folder: image 
        if (move_uploaded_file($tempname, $folder)){
            
            
            echo ("<SCRIPT LANGUAGE='JavaScript'>
         var r= window.confirm('Succesfully inserted..');
    if (r)
    {
      window.location.href='updatepg.php?year=$year,crs=$cr';
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
  //$result = mysqli_query($db, "SELECT * FROM image"); 
?> 
  			
<?php
 
  // If upload button is clicked ... 
		if(isset($_POST["picc"]))
		{
		    
		    $year=$_POST['year'];
		    
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
     $hno=$_POST['hno'];
    $filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
        $folder = "images/".$filename; 
          
   // $db = mysqli_connect("localhost", "root", "", "photos"); 
  
        // Get all the submitted data from the form 
        $sql= $conn->query("update regular set img='$filename' where hno='$hno'"); 
  
        // Execute query 
      //  mysqli_query($conn, $sql); 
          
        // Now let's move the uploaded image into the folder: image 
        if (move_uploaded_file($tempname, $folder)){
            
            
            echo ("<SCRIPT LANGUAGE='JavaScript'>
         var r= window.confirm('Succesfully inserted..');
    if (r)
    {
      window.location.href='updatepg.php?year=$year';
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
  //$result = mysqli_query($db, "SELECT * FROM image"); 
?> 	
 			                        		
		                  