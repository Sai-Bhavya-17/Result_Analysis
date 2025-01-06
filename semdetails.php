

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
        <li  ><a href="search.php"><em class="fa fa-search">&nbsp;</em> Search Student</a></li>
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

    <?php
    if(isset($_GET["fdbname"])){


    $servername = "localhost";
    $username = "root";
    $password = "toor2020";
    $dbname = strtok($_GET['fdbname'], ",");


    $sub=strstr($_GET['fdbname'],",");
    $token2 = strtok($sub, ",");//sem
    $brr = strstr($sub, "br=");//branch
    
    $br = strtok($brr, "br=");//branch
    //echo $token2;
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    ?>
    <div class="panel panel-default">
        <div class="panel-heading">With Backlogs</div>
        <div class="panel-body">
            <div class="col-md-6">

                <div class="col-md-12">
                    <?php

                    $insertt= $conn->query("SELECT hno from regular where course='$token2' and branch='$br' and status='fail' GROUP BY hno HAVING count(hno)>=1");
                    while( $row = mysqli_fetch_assoc($insertt) ) {

                        ?>

                        <details>
                            <summary><?php $hno=$row["hno"]; echo $row["hno"];?></summary>

                            <p>
                            <div style="overflow-x:auto;">
                                <table>
                                    <tr>
                                        <!--<th>HNO</th>-->
                                        <th>subcode</th>
                                        <th>subname</th>
                                        <th>grade</th>
                                        <th>gradepoints</th>

                                        <th>Course</th>
                                        <th>year</th>

                                        <th>doe</th>

                                        <th>Status</th>
                                    </tr>
                                    <?php

                                    $insert1= $conn->query("SELECT * from regular where hno='$hno'");
                                    while( $row1 = mysqli_fetch_assoc($insert1) ) {
                                        if($row1["course"]=="$token2")
                                    {
                                    ?>

                                    <tr>
                                        <!-- <td><?php  echo $row1["hno"];?></td>-->
                                        <td><?php  echo $row1["subcode"];?></td>
                                        <td><?php  echo $row1["subname"];?></td>
                                        <td><?php  echo $row1["grade"];?></td>
                                        <td><?php  echo $row1["gradepoints"];?></td>
                                        <!-- <td><?php echo $row1["sub3"];?></td>
   <td><?php  echo $row1["cr3"];?></td>
   <td><?php echo $row1["sub4"];?></td>
   <td><?php  echo $row1["cr4"];?></td>
   <td><?php  echo $row1["sub5"];?></td>
   <td><?php  echo $row1["cr5"];?></td>
   <td><?php echo $row1["sub6"];?></td>
   <td><?php  echo $row1["cr6"];?></td>
   <td><?php echo $row1["sub7"];?></td>
   <td><?php  echo $row1["cr7"];?></td>
   <td><?php  echo $row1["sub8"];?></td>
   <td><?php  echo $row1["cr8"];?></td>
   <td><?php  echo $row1["tot"];?></td>
   <td><?php  echo $row1["percentage"];?></td>-->
                                        <td><?php  echo $row1["branch"];?></td>
                                        <td><?php  echo $row1["course"];?></td>

                                        <td><?php  echo $row1["doe"];?></td>
                                        <td><?php  echo $row1["status"];?></td>

                                        <?php }} ?>
                                    </tr>
                            </div>
                            </table>
                            </p></details>

                        </td>


                        <?php

                    }?>


                </div></div>
            <?php }  ?>

            <?php
            if(isset($_GET["dbname"]))
            {

            $servername = "localhost";
            $username = "root";
            $password = "toor2020";
            $dbname = strtok($_GET['dbname'], ",");


            $sub=strstr($_GET['dbname'],",");
            $token2 = strtok($sub, ",");//sem
            $brr = strstr($sub, "br=");//branch
            
            $br = strtok($brr, "br=");//branch
            // Create connection
            $conn = mysqli_connect($servername, $username, $password,$dbname);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }


            ?>
            <div class="panel panel-default">
                <div class="panel-heading">Without Backlogs</div>
                <div class="panel-body">
                    <div class="col-md-6">

                        <div class="col-md-12">
                            <?php


                            $insertt= $conn->query("SELECT hno from regular where course='$token2' and branch='$br' AND status='pass' GROUP BY hno HAVING count(hno)=8");
                            while( $row = mysqli_fetch_assoc($insertt) ) {


                                ?>

                                <details>
                                    <summary><?php $hno=$row["hno"]; echo $row["hno"];?></summary>
                                    <p>
                                    <div style="overflow-x:auto;">
                                        <table>
                                            <tr>
                                                <!--<th>HNO</th>-->
                                                <th>subcode</th>
                                                <th>subname</th>
                                                <th>grade</th>
                                                <th>gradepoints</th>
                                                <!--<th>sub3</th>
                                                <th>cr3</th>
                                                <th>sub4</th>
                                                <th>cr4</th>
                                                <th>sub5</th>
                                                <th>cr5</th>
                                                <th>sub6</th>
                                                <th>cr6</th>
                                                <th>sub7</th>
                                                <th>cr7</th>
                                                <th>sub8</th>
                                                <th>cr8</th>
                                                <th>Tot</th>
                                                <th>percentage</th>-->
                                                <th>Course</th>
                                                <th>year</th>

                                                <th>doe</th>

                                                <th>Status</th>
                                            </tr>
                                            <?php

                                            $insert1= $conn->query("SELECT * from regular where hno='$hno'");
                                            while( $row1 = mysqli_fetch_assoc($insert1) ) {
                                            if($row1["course"]=="$token2")
                                            {
                                            ?>

                                            <tr>
                                                <!-- <td><?php  echo $row1["hno"];?></td>-->
                                                <td><?php  echo $row1["subcode"];?></td>
                                                <td><?php  echo $row1["subname"];?></td>
                                                <td><?php  echo $row1["grade"];?></td>
                                                <td><?php  echo $row1["gradepoints"];?></td>
                                                <!-- <td><?php echo $row1["sub3"];?></td>
   <td><?php  echo $row1["cr3"];?></td>
   <td><?php echo $row1["sub4"];?></td>
   <td><?php  echo $row1["cr4"];?></td>
   <td><?php  echo $row1["sub5"];?></td>
   <td><?php  echo $row1["cr5"];?></td>
   <td><?php echo $row1["sub6"];?></td>
   <td><?php  echo $row1["cr6"];?></td>
   <td><?php echo $row1["sub7"];?></td>
   <td><?php  echo $row1["cr7"];?></td>
   <td><?php  echo $row1["sub8"];?></td>
   <td><?php  echo $row1["cr8"];?></td>
   <td><?php  echo $row1["tot"];?></td>
   <td><?php  echo $row1["percentage"];?></td>-->
                                                <td><?php  echo $row1["branch"];?></td>
                                                <td><?php  echo $row1["course"];?></td>

                                                <td><?php  echo $row1["doe"];?></td>
                                                <td><?php  echo $row1["status"];?></td>

                                                <?php }} ?>
                                            </tr>
                                    </div>
                                    </table>
                                    </p></details>

                                </td>


                                <?php

                            } ?>

                            <br>
                        </div></div>
                    <?php } ?>
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


</body>
</html>



