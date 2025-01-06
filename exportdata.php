<?php
if(isset($_GET['db']))
{
    $db=$_GET['db'];
    $servername = "localhost";
    $username = "root";
    $password = "toor2020";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    


//get records from database
$query = $conn->query("SELECT * FROM regular ORDER BY id ASC");
$query2 = $conn->query("SELECT * FROM supply ORDER BY id ASC");
if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "students_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('ID', 'Hno', 'subcode', 'subname', 'grade', 'gradepoints','course','regulation','extype','doe','status','branch','name');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        
        $lineData = array($row['id'], $row['hno'], $row['subcode'], $row['subname'], $row['grade'], $row['gradepoints'], $row['course'], $row['regulation'], $row['extype'], $row['doe'], $row['status'], $row['branch'], $row['name']);
        fputcsv($f, $lineData, $delimiter);
    }
    //set column headers
    $fields = array('ID', 'Hno', 'subcode', 'subname', 'grade', 'gradepoints','course','regulation','extype','doe','status','branch');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query2->fetch_assoc()){
        
        $lineData = array($row['id'], $row['hno'], $row['subcode'], $row['subname'], $row['grade'], $row['gradepoints'], $row['course'], $row['regulation'], $row['extype'], $row['doe'], $row['status'], $row['branch']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}



}
exit;

?>