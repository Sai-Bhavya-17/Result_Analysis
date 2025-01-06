
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
	
table {
  border-collapse: collapse;
  width: 100%;
 
}

th, td {
  text-align: left;
  padding: 8px;
   border-bottom: 1px solid #ddd;
}

tr:hover {background-color: #f5f5f5;}
</style>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
			<li><a href="result.php"><em class="fa fa-bar-chart">&nbsp;</em> Results</a></li>
			<li ><a href="updatepg.php"><em class="fa fa-edit">&nbsp;</em> Updates</a></li>
			<li ><a href="search.php"><em class="fa fa-search">&nbsp;</em> Search Student</a></li>
			<li class="active"><a href="resultchart.php"><em class="fa fa-bar-chart">&nbsp;</em>Result charts</a></li>
			<li><a href="index.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->	
	
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Charts</h1>
			</div>
		</div><!--/.row-->
	
		
		<div class="row">
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">
						Pie Chart-For Total Year
							
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<form method="post" action="">
					Year: <input type="text" name="yr1">
					Branch: <input type="text" name="br1">			
					sem: <input type="text" name="crs1">
					<br><br>
					Year: <input type="text" name="yr2">
					Branch: <input type="text" name="br2">			
					sem: <input type="text" name="crs2">
					<br><br>
					Year: <input type="text" name="yr3">
					Branch: <input type="text" name="br3">			
					sem: <input type="text" name="crs3">
					<br><br>
					Year: <input type="text" name="yr4">
					Branch: <input type="text" name="br4">			
					sem: <input type="text" name="crs4">
					<br><br>
					 <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
					</form>
					<div class="panel-body">
					<br><br>
						
	<?php 
	if(isset($_POST["submit"]))
{
    $year=$_POST['yr1'];
    $servername = "localhost";
    $username = "root";
    $password = "toor2020";
    $dbname = "acyear$year";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    
    //create connection for 2nd database
    $year2=$_POST['yr2'];
    $dbname2 = "acyear$year2";
    // Create connection
    $conn2 = mysqli_connect($servername, $username, $password,$dbname2);
    
    //create connection for 3rd database
    $year3=$_POST['yr3'];
    $dbname3 = "acyear$year3";
    // Create connection
    $conn3 = mysqli_connect($servername, $username, $password,$dbname3);
    
    //create connection for 2nd database
    $year4=$_POST['yr4'];
    $dbname4 = "acyear$year4";
    // Create connection
    $conn4 = mysqli_connect($servername, $username, $password,$dbname4);
    
    
    // Check connection
    if (!$conn && !$conn2 && !$conn3 && !$conn4 ) {
        die("Connection failed: " . mysqli_connect_error());
    }
	$batch=$_POST['crs1'];
	$br=$_POST['br1'];
	//$sem=$_POST['sem'];
				 $insert= $conn->query("SELECT count(hno) from regular where branch='$br' AND course='$batch' AND gradepoints>0 GROUP BY hno HAVING count(hno)=8");
  $row = $insert -> fetch_assoc();
   $rc=mysqli_num_rows($insert);
   $in= $conn->query("SELECT count(distinct hno) from regular where branch='$br' AND course='$batch'");
   $rowin = $in -> fetch_assoc();
  $rc1=$rowin['count(distinct hno)'];
   $per=round(($rc/$rc1)*100);
   
   $batch1=$_POST['crs2'];
   $br1=$_POST['br2'];
   $insert1= $conn2->query("SELECT count(hno) from regular where branch='$br1' AND course='$batch1' AND gradepoints>0 GROUP BY hno HAVING count(hno)=8");
   
   $rc2=mysqli_num_rows($insert1);
   $in2= $conn2->query("SELECT count(distinct hno) from regular where branch='$br1' AND course='$batch1'");
   $rowin2 = $in2 -> fetch_assoc();
   $rc3=$rowin2['count(distinct hno)'];
   $per2=round(($rc2/$rc3)*100);
   
   $batch3=$_POST['crs3'];
   $br3=$_POST['br3'];
   $insert3= $conn3->query("SELECT count(hno) from regular where branch='$br3' AND course='$batch3' AND gradepoints>0 GROUP BY hno HAVING count(hno)=8");
   
   $rc4=mysqli_num_rows($insert3);
   $in3= $conn3->query("SELECT count(distinct hno) from regular where branch='$br3' AND course='$batch3'");
   $rowin3 = $in3 -> fetch_assoc();
   $rc5=$rowin3['count(distinct hno)'];
   $per3=round(($rc4/$rc5)*100);
   
   $batch4=$_POST['crs4'];
   $br4=$_POST['br4'];
   $insert4= $conn4->query("SELECT count(hno) from regular where branch='$br4' AND course='$batch4' AND gradepoints>0 GROUP BY hno HAVING count(hno)=8");
   
   $rc6=mysqli_num_rows($insert4);
   $in4= $conn4->query("SELECT count(distinct hno) from regular where branch='$br4' AND course='$batch4'");
   $rowin4 = $in4 -> fetch_assoc();
   $rc7=$rowin4['count(distinct hno)'];
   $per4=round(($rc6/$rc7)*100);
   
   
  	?>
  	
  			<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $per; ?>" ><span class="percent"><?php echo $per; ?>%</span></div>
				       
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $per2; ?>" ><span class="percent"><?php echo $per2; ?>%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $per3; ?>" ><span class="percent"><?php echo $per3; ?>%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $per4; ?>" ><span class="percent"><?php echo $per4; ?>%</span></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
  	
  	
  	<div style="overflow-x:auto;">
  	 <table id="countit" width="300" border="1">
        <thead>
            <tr>
                <th>Year</th>
                <th>Sem</th>
                <th>Branch</th>
                <th>Students</th>
                <th>Pass</th>
                <th>Pass %</th>
                <th>Topper</th>
               <th> info </th>
               
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $year;?></td>
                <td><?php echo $batch;?></td>
                <td><?php echo $br;?></td>
                <td class="count-me"><?php echo $rc1;?></td>
                <td class="count"><?php echo $rc;?></td>
                 <td><?php echo $per;?></td>
                 <td>
                 <?php 
                 $tp1=$conn->query("select hno, sum(grade) from regular where branch='$br' and course='$batch' group by hno ORDER BY SUM(grade) DESC LIMIT 1");
                 $topper1 = $tp1 -> fetch_assoc();
                 echo $topper1['hno']."-".$topper1['sum(grade)'];
                 ?>
                 </td>
                 <td>	<button type="button" class="btn" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-exclamation-sign"></span></button>
                	
                	<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				
					<div class="modal-header">
						<h3 class="modal-title">Highest Marks-Subject wise</h3>
					</div>
					<div class="modal-body">
						<div style="overflow-y:auto;">
						   <table>
							<?php 
							$insert= $conn->query("select subname, grade, hno from regular where (subname,grade) in ( select subname, max(gradepoints) from regular where branch='$br' and course='$batch' group by subcode ) order by subname, hno");
							while($row = $insert -> fetch_assoc()){
							?>
							<tr><td><?php echo $row['subname'];?></td>
							<td><?php echo $row['grade'];?></td>
							<td><?php echo $row['hno'];?></td>
							</tr>
				
							<?php }?>
							</table>					
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						
						<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					</div>
					</div>
			</div>
		</div> 
		</td>
            </tr>
            <tr>
                <td><?php echo $year2;?></td>
                <td><?php echo $batch1;?></td>
                <td><?php echo $br1;?></td>
                <td class="count-me"><?php echo $rc3;?></td>
                <td class="count"><?php echo $rc2;?></td>
                <td><?php echo $per2;?></td>
                <td>
                 <?php 
                 $tp2=$conn2->query("select hno, sum(grade) from regular where branch='$br1' and course='$batch1' group by hno ORDER BY SUM(grade) DESC LIMIT 1");
                 $topper2 = $tp2 -> fetch_assoc();
                 echo $topper2['hno']."-".$topper2['sum(grade)'];
                 ?>
                </td>
                 <td>	<button type="button" class="btn" data-toggle="modal" data-target="#form_modal1"><span class="glyphicon glyphicon-exclamation-sign"></span></button>
                	
                	<div class="modal fade" id="form_modal1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				
					<div class="modal-header">
						<h3 class="modal-title">Highest Marks-Subject wise</h3>
					</div>
					<div class="modal-body">
						<div style="overflow-y:auto;">
						   <table>
							<?php 
							$insert= $conn2->query("select subname, grade, hno from regular where (subname,grade) in ( select subname, max(grade) from regular where branch='$br1' and course='$batch1' group by subcode ) order by subname, hno");
							while($row = $insert -> fetch_assoc()){
							?>
							<tr><td><?php echo $row['subname'];?></td>
							<td><?php echo $row['grade'];?></td>
							<td><?php echo $row['hno'];?></td>
							</tr>
				
							<?php }?>
							</table>					
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						
						<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					</div>
					</div>
			</div>
		</div> 
		</td>
            </tr>
             <tr>
                <td><?php echo $year3;?></td>
                <td><?php echo $batch3;?></td>
                <td><?php echo $br3;?></td>
                <td class="count-me"><?php echo $rc5;?></td>
                <td class="count"><?php echo $rc4;?></td>
                <td><?php echo $per3;?></td>
                 <td>
                 <?php 
                 $tp3=$conn3->query("select hno, sum(grade) from regular where branch='$br3' and course='$batch3' group by hno ORDER BY SUM(grade) DESC LIMIT 1");
                 $topper3 = $tp3 -> fetch_assoc();
                 echo $topper3['hno']."-".$topper3['sum(grade)'];
                 ?>
                </td>
                 <td>	<button type="button" class="btn" data-toggle="modal" data-target="#form_modal2"><span class="glyphicon glyphicon-exclamation-sign"></span></button>
                	
                	<div class="modal fade" id="form_modal2" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				
					<div class="modal-header">
						<h3 class="modal-title">Highest Marks-Subject wise</h3>
					</div>
					<div class="modal-body">
						<div style="overflow-y:auto;">
						   <table>
							<?php 
							$insert= $conn3->query("select subname, grade, hno from regular where (subname,grade) in ( select subname, max(grade) from regular where branch='$br3' and course='$batch3' group by subcode ) order by subname, hno");
							while($row = $insert -> fetch_assoc()){
							?>
							<tr><td><?php echo $row['subname'];?></td>
							<td><?php echo $row['grade'];?></td>
							<td><?php echo $row['hno'];?></td>
							</tr>
				
							<?php }?>
							</table>					
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						
						<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					</div>
					</div>
			</div>
		</div> 
		</td>
            </tr>
             <tr>
                <td><?php echo $year4;?></td>
                <td><?php echo $batch4;?></td>
                <td><?php echo $br4;?></td>
                <td class="count-me"><?php echo $rc7;?></td>
                <td class="count"><?php echo $rc6;?></td>
                <td><?php echo $per4;?></td>
                 <td>
                 <?php 
                 $tp4=$conn4->query("select hno, sum(grade) from regular where branch='$br4' and course='$batch4' group by hno ORDER BY SUM(grade) DESC LIMIT 1");
                 $topper4 = $tp4 -> fetch_assoc();
                 echo $topper4['hno']."-".$topper4['sum(grade)'];
                 ?>
                </td>
                 <td>	<button type="button" class="btn" data-toggle="modal" data-target="#form_modal3"><span class="glyphicon glyphicon-exclamation-sign"></span></button>
                	
                	<div class="modal fade" id="form_modal3" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				
					<div class="modal-header">
						<h3 class="modal-title">Highest Marks-Subject wise</h3>
					</div>
					<div class="modal-body">
					
						<div style="overflow-y:auto;">
						   <table>
							<?php 
							$insert= $conn4->query("select subname, grade, hno from regular where (subname,grade) in ( select subname, max(grade) from regular where branch='$br4' and course='$batch4' group by subcode ) order by subname, hno");
							while($row = $insert -> fetch_assoc()){
							?>
							<tr><td><?php echo $row['subname'];?></td>
							<td><?php echo $row['grade'];?></td>
							<td><?php echo $row['hno'];?></td>
							</tr>
				
							<?php }?>
							</table>					
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						
						<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					</div>
					</div>
			</div>
		</div> 
		</td>
            </tr>
        </tbody>
       
    </table></div>
  		<?php   }?>
	
	</div>       </div>              </div>
															
		</div>
			
		
		
	</div>	<!--/.main-->
	  
<script language="javascript" type="text/javascript">
            var tds = document.getElementById('countit').getElementsByTagName('td');
            var sum = 0;
            var summ = 0;
            for(var i = 0; i < tds.length; i ++) {
                if(tds[i].className == 'count-me') {
                    sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
                }
            }
             for(var i = 0; i < tds.length; i ++) {
                if(tds[i].className == 'count') {
                    summ += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
                }
            }
            document.getElementById('countit').innerHTML += '<tr><td></td><td></td><td><b>Total</b></td><td>' + sum + '</td><td>' + summ + '</td><td>'+(Math.round((summ/sum)*100))+'</td><td></td><td></td></tr>';
      
        </script>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<!--<script src="js/chart-data.js"></script>-->
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
