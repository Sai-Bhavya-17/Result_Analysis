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
* {
    box-sizing: border-box;
}

.columns {
    float: left;
    width: 33.3%;
    padding: 8px;
}

.price {
    list-style-type: none;
    border: 1px solid #eee;
    margin: 0;
    padding: 0;
    -webkit-transition: 0.3s;
    transition: 0.3s;
}

.price:hover {
    box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
    background-color: #111;
    color: white;
    font-size: 25px;
}

.price li {
    border-bottom: 1px solid #eee;
    padding: 20px;
    text-align: center;
}

.price .grey {
    background-color: #eee;
    font-size: 20px;
}

.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    font-size: 18px;
}

@media only screen and (max-width: 600px) {
    .columns {
        width: 100%;
    }
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
            
            
            
            