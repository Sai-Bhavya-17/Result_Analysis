<?php

$servername = "localhost";
$username = "root";
$password = "toor2020";
$dbname = "acyear2016";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query1=$conn->query("select * from supply");
//=$conn->query("select hno,subcode from regular");
while( $row = mysqli_fetch_assoc($query1))
{
   $shno= $row['hno'];
    $s1=$row['subcode'];

       $grade=$row['grade'];
       $grpoints=$row['gradepoints'];
       $status=$row['status'];
       $update=$conn->query("update regular set grade='$grade',gradepoints='$grpoints',status='$status' where hno='$shno' AND subcode='$s1'");


}
if($update)
{
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


}
?>

