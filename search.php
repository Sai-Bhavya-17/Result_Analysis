
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
        }

        tr:nth-child(even) {background-color: #f2f2f2;}

        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            border: 2px solid black;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
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
        <li ><a href="updatepg.php"><em class="fa fa-edit">&nbsp;</em> Updates</a></li>
        <li class="active" ><a href="search.php"><em class="fa fa-search">&nbsp;</em> Search Student</a></li>
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
        <div class="panel-heading">Search Students</div>
        <div class="panel-body">
            <div class="col-md-6">

                <form method="post" action="">
                    <div class="form-group">
                        <label>Branch: </label><input type="text" name="br" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Academic Year: </label><input type="text" name="aca_year" class="form-control"></div>

                    <div class="form-group">
                        <label>HallTicket No: </label><input type="text" name="hno" class="form-control"></div>


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
                   $hno=$_POST['hno'];
                   $br=$_POST['br'];
                   
                   $in= $conn->query("select hno from regular where hno='$hno' ");
                   
                    $first = mysqli_fetch_assoc($in);
                ?>

                 <h4 ><b>HNO:</b><?php echo $hno;?>&nbsp;<!--<b>Name:</b><?php echo $first['name'];?>&nbsp;-->
               <b>Branch:</b><?php echo $br;?>
              <!-- <img src="images/<?php echo $first['img'];?>" height="150px" width="150px"> -->
               </h4>
               
               <!-- Supply -->
               
               <button type="button" class="collapsible">Supply</button>
<div class="content">
  <ul>
   <?php
   $insertt= $conn->query("select * from supply where hno='$hno' ");
                       
                        if(mysqli_num_rows($insertt)!=0)
                        {
                        while( $dis = mysqli_fetch_assoc($insertt)){
                      
                        ?>
  <li><p><h4>Course:<?php echo $dis['course'];?>, Subject:<?php echo $dis['subname']; ?>, Grade:<?php echo $dis['grade'];?>, Status:<?php echo $dis['status'];?></h4></p></li>
  <?php }}else{
      ?>
      <p><h4>No Supplies</h4></p>
      <?php 
  }?>
  </ul>
</div>
<!-- Supply end -->
               <br><br>
               
              <div class="row">
                       <!-- column1 data-->
                        <?php

                        $insertt= $conn->query("select distinct(course),doe from regular where hno='$hno' ");
                        while( $dis = mysqli_fetch_assoc($insertt)){
                            
                           
                            $c=$dis['course'];  
                      
                        ?>
                          
                    <div class="column" style="background-color:#fff;">
                        
                        <div style="overflow-x:auto;">
                            <table>

                                <tr>
                                   
                                   
                                    <td><b>YEAR:</b></td><td><?php echo $c;?></td>

                                    <td><b>DOE:</b></td><td><?php echo $dis["doe"];?></td>
                                </tr>
                                <tr>

                                    <th>subcode</th>
                                    <th>subname</th>
                                    <th>grade</th>
                                    <th>gradepoints</th>


                                    <th>Status</th>
                                </tr>

                                
                                <?php
                                $s11= $conn->query("select * from regular where hno='$hno' AND course='$c' ");
                                while($row11 = mysqli_fetch_assoc($s11)) {
                                    
                                    
                                    ?>

                                    <tr>

                                        <td><?php echo $row11["subcode"];?></td>
                                        <td><?php  echo $row11["subname"];?></td>
                                        <td><?php echo $row11["grade"];?></td>
                                        <td><?php  echo $row11["gradepoints"];?></td>
                                        <td><?php  echo $row11["status"];?></td>


                                    </tr> <?php

                                }?>
                                <tr>
                                    <td></td>
                                    <td></td>

                                    <td><b>TOTAL</b></td>
                                    <td><?php
                                        $in= $conn->query("select sum(gradepoints) from `regular` where branch='$br' AND hno='$hno' AND course='$c' ");
                                        $rowsum = mysqli_fetch_assoc($in);

                                        echo $rowsum["sum(gradepoints)"];?>
                                    </td>
                                </tr>



                        </table>
                        </div>

                        <!--column1 data -->
                    </div>
                    
                     <?php } ?>
               
                <!--while close-->
            </div><?php }?>
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">Designed & developed by Sai Bhavya</p>
    </div>
</div><!-- /.row -->
</div><!--/.main-->

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
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
			