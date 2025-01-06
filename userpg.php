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
			<li class="active"><a href="userpg.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li ><a href="result.php"><em class="fa fa-bar-chart">&nbsp;</em> charts</a></li>
				<li ><a href="updatepg.php"><em class="fa fa-edit">&nbsp;</em> Updates</a></li>
				<li ><a href="search.php"><em class="fa fa-search">&nbsp;</em> Search Student</a></li>
				 <li><a href="resultchart.php"><em class="fa fa-bar-chart">&nbsp;</em>Result charts</a></li>
			<li><a href="index.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Forms</li>
			</ol>
		</div><!--/.row-->
		
		
	
				<div class="panel panel-default">
					<div class="panel-heading">Forms</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="post" action="" enctype="multipart/form-data">
								
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
										<label>Academic Year</label>
										<!--<select name="ac_year" class="form-control">
										<option>Select</option>
											<option value="acyear2012">2012-2016</option>
											<option value="acyear2013">2013-2017</option>
											<option value="acyear2014">2014-2018</option>
											<option value="acyear2016">2016-2020</option>
										</select>-->
										<input type="text" name="ac_year" class="form-control">
									</div>
									<div class="form-group">
										<label>Year</label>
										<select name="year" class="form-control">
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

								
				
								</div>
								<div class="col-md-6">
									
									
									<div class="form-group">
										<label>Exam Type</label>
										<select name="ex_type" class="form-control">
										<option>Select</option>
											<option value="regular">Regular</option>
											<option value="supply">Supply</option>
											
										</select>
									</div>
									<div class="form-group">
										<label>Date of Examination</label>
										<input type="date" name="doe" class="form-control">
										</div>
										<div class="form-group">
									<label>File input</label>
									<input name="file" type="file" accept=".csv">
									
								
									</div></div>
								<br><br><br><br><center>	<input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
									<button type="reset" class="btn btn-default">Reset Button</button></center>
								
							</form>
							</div>
							<br><br>
							
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
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
	$ac_year=$_POST['ac_year'];
$servername = "localhost";
$username = "root";
$password = "toor2020";
$dbname = "acyear$ac_year";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

	$roww = 0;
	$branch=$_POST['course'];
	
	$year=$_POST['year'];
	$ex_type=$_POST['ex_type'];
	$doe=$_POST['doe'];
	if($ex_type=="regular"){
	   
	    set_time_limit(400);
	 
	    $count=0;
	$i= $conn->query("SELECT DISTINCT course,branch FROM regular");

	while( $row = mysqli_fetch_assoc($i)){
	    if(($row['course']==$year)&&($row['branch']==$branch))
	    {
	       $count++;
	    }
	}
	 if($count!=0){
	     echo ("<SCRIPT LANGUAGE='JavaScript'>
         var r= window.confirm('File Already Existed');
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
	     
	     
	  }else {
	
	
	
 $file = $_FILES["file"]["tmp_name"];
 $file_open = fopen($file,"r");
  
 while(($csv = fgetcsv($file_open, 1000, ",")) !== false)
 {
	
  $roww++;//starts off with $row = 1
    if ($roww>5)
	{
 
 $insert= $conn->query("
 INSERT INTO `regular` VALUES ('', '$csv[0]', '$csv[1]', '$csv[2]', '$csv[3]', '$csv[4]', '$year', '', '$ex_type', '', '', '$doe', '', '$branch')");
	} }
 
     
 
 if($insert){
	 
	 $update= $conn->query("Update regular SET status='pass' where gradepoints>0 ");
	 $update2=$conn->query("Update regular SET status='fail' where gradepoints=0");

            echo ("<SCRIPT LANGUAGE='JavaScript'>
         var r= window.confirm('Succesfully inserted..');
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
           
 }}}
 elseif($ex_type=="supply"){
	   
	    set_time_limit(400);
	 
	    $count=0;
	$i= $conn->query("SELECT DISTINCT course,branch FROM supply");

	while( $row = mysqli_fetch_assoc($i)){
	    if(($row['course']==$year)&&($row['branch']==$branch))
	    {
	       $count++;
	    }
	}
	 if($count!=0){
	     echo ("<SCRIPT LANGUAGE='JavaScript'>
         var r= window.confirm('File Already Existed');
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
	     
	     
	  }else {
	
	
	
 $file = $_FILES["file"]["tmp_name"];
 $file_open = fopen($file,"r");
  
 while(($csv = fgetcsv($file_open, 1000, ",")) !== false)
 {
	
  $roww++;//starts off with $row = 1
    if ($roww>5)
	{
 
 $insert= $conn->query("
 INSERT INTO `supply` VALUES ('', '$csv[0]', '$csv[1]', '$csv[2]', '$csv[3]', '$csv[4]', '$year', '', '$ex_type', '', '', '$doe', '', '$branch')");
	} }
 
     
 
 if($insert){
	 
	 $update= $conn->query("Update supply SET status='pass' where gradepoints>0 ");
	 $update2=$conn->query("Update supply SET status='fail' where gradepoints=0");

            echo ("<SCRIPT LANGUAGE='JavaScript'>
         var r= window.confirm('Succesfully inserted..');
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
           
 }}}

}
?>