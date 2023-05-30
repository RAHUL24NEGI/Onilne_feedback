<?php 
error_reporting(1);
include('../dbconfig.php');
extract($_POST);

use SimpleExcel\SimpleExcel;

if(isset($import)){
if(move_uploaded_file($_FILES['excel_file']['tmp_name'],$_FILES['excel_file']['name'])){
require_once('SimpleExcel/SimpleExcel.php'); // load the main class file (if you're not using autoloader)

$excel = new SimpleExcel('csv');                    // instantiate new object (will automatically construct the parser & writer type as XML)

$excel->parser->loadFile($_FILES['excel_file']['name']);            // load an XML file from server to be parsed
$foo = $excel->parser->getField();   // get complete array of the table
$count = 1;
$conn = mysqli_connect('localhost','root','','feedback');
while(count($foo)>$count)
{
    $stuid=$foo[$count][0];
    $subcode=$foo[$count][1];
    $que1=$foo[$count][3];
    $que2=$foo[$count][4];
    $que3=$foo[$count][5];
    $que4=$foo[$count][6];
    $que5=$foo[$count][7];
    $que6=$foo[$count][8];
    $que7=$foo[$count][9];
    $que8=$foo[$count][10];
    $que9=$foo[$count][11];
    $que10=$foo[$count][12];
    $sesyear=$sesyear;
    $sem=$sem;
    
    
    $query="insert into stufeedback values('$id','$subcode','$quest1','$quest2','$quest3','$quest4','$quest5','$quest6','$quest7','$quest8','$quest9','$quest10','$sesyear','$sem')";
    mysqli_query($conn,$query);
    $count++;
}

echo "<script>window.location.href='dashboard.php?info=confirmation';</script>";
}
}


?>
<br>
<br>
<h3 text align='center'>Upload student feedback on basis of these Questions of a subject to a 
    faculty teaching that subject over the semester,with attachment of their marks in that semester</h3>


<p>1.Teacher is good at stimulating the interest in the course content:</p>

<p>2.Teacher is good at explaining the subject matter:</p>

<p>3.Teacher's presentation was clear,loud ad easy to understand:</p>

<p>4.Teacher is good at using innovative teaching methods/ways:</p> 

<p>5.Teacher is punctual,arrives on time and leaves on time:</p>

<p>6. Teacher is available and helpful during counseling hours:</p> 

<p>7. Teacher has competed the whole course as per course outline:</p>

<p>8.Teacher was always fair and impartial:</p>

<p>9. Assessments conducted are clearly connected to maximize learining objectives:</p>

<p>10. Teacher provided the course outline having weekly content plan with list of  required text book:</p>


<h1 class="page-header">Upload feedbak here</h1>
<div class="col-lg-8" style="margin:15px;">
	<form method="post">
	
	   <div class="control-group form-group">
    	<div class="controls">
        	<label>YEAR</label>
            <Td><select name="sesyear" class="form-control" required>
                    <option>-</option>
					<option>2021</option>
					<option>2022</option>
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>
                    <option>2027</option>
					<option>2028</option>
					</select>
					</td>
        </div>
   	</div>

	<div class="control-group form-group">
    	<div class="controls">
        	<label>Semester</label>
            <Td><select name="sem" class="form-control" required>
            <option>-</option>
            <option>odd</option>
					<option>even</option>
					</select>
					</td>
        </div>
    </div>
	
	 
    <form method="post" action="add_student.php" enctype="multipart/form-data">
    	<input type="file"  name="excel_file" accept=".csv">
        <br>
        
   		<input type="submit" name="import" class="btn btn-info" value="Import">

</div>
