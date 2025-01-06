<?php
	if(isset($_POST['update']))
{
	$servername = "localhost";
$username = "root";
$password = "toor2020";
$dbname=$_POST['db'];
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
    $course=$_POST['course'];
	
	$sem=$_POST['sem'];
	$batch=$_POST['batch'];
	$hno=$_POST['hno'];
	$sub1=$_POST['sub1'];
	$sub2=$_POST['sub2'];
	$sub3=$_POST['sub3'];
	$sub4=$_POST['sub4'];
	$sub5=$_POST['sub5'];
	$sub6=$_POST['sub6'];
	$sub7=$_POST['sub7'];
	$sub8=$_POST['sub8'];
	$cr1=$_POST['cr1'];
	$cr2=$_POST['cr2'];
	$cr3=$_POST['cr3'];
	$cr4=$_POST['cr4'];
	$cr5=$_POST['cr5'];
	$cr6=$_POST['cr6'];
	$cr7=$_POST['cr7'];
	$cr8=$_POST['cr8'];
	$tot=$_POST['tot'];
	$per=$_POST['per'];
	$status=$_POST['status'];
	
	$update= $conn->query(" Update `regular` SET sub1='$sub1',cr1='$cr1',sub2='$sub2',cr2='$cr2',sub3='$sub3',cr3='$cr3',sub4='$sub4',cr4='$cr4',
	                                          sub5='$sub5',cr5='$cr5',sub6='$sub6',cr6='$cr6',sub7='$sub7',cr7='$cr7',sub8='$sub8',cr8='$cr8',tot='$tot',percentage='$per',status='$status' where hno='$hno' AND course='$course' AND year='$batch' AND sem='$sem'");
 if($update){

 echo ("<SCRIPT LANGUAGE='JavaScript'>
         var r= window.confirm('Succesfully updated..');
    if (r)
    {
      window.location.href='updatepg.php?db=$dbname,course=$course,sem=$sem,batch=$batch';
    }
    else
   {
    window.location.href='updatepg.php?db=$dbname,course=$course,sem=$sem,batch=$batch';
       
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