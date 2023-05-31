<?php 
error_reporting(1);
include('../dbconfig.php');
extract($_POST);
if(isset($save))
{
//check user alereay exists or not
$sql=mysqli_query($conn,"select * from user where id='$id'");

$r=mysqli_num_rows($sql);

	if($r==true)
	{
		$err= "<font color='red'><h3 align='center'>This user already exists</h3></font>";
	}
	else
	{

		//encrypt your password
		$pass=md5($p);
		$query="insert into user values('$id','$n','$pass','$year','$sem')";
		if($sem==2*$year || $sem==2*$year-1)
		{
			mysqli_query($conn,$query);
			$err="<font color='blue'><h3 align='center'>Registration successfull !!<h3></font>";
		}
		else{
 			$err="<font color='red'><h3 align='center'>Fill Year/Semester Correctly";
		}
	}
}

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
    $id=$foo[$count][0];
    $name=$foo[$count][1];
    $pass=$id;
    $year=$foo[$count][2];
    $sem=$foo[$count][3];
    $query="insert into user values('$id','$name','$pass','$year','$sem')";
    mysqli_query($conn,$query);
    $count++;
}

echo "<script>window.location.href='dashboard.php?info=confirmation';</script>";
}
}


?>


		<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered" style="margin-bottom:50px">
	<caption><h2 align="center">Registration Form</h2></caption>
	<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>
				<tr>
					<td>Student ID</td>
					<Td><input  type="text" name="id" class="form-control" required/></td>
				</tr>

				<tr>
					<td>Enter Your name</td>
					<Td><input  type="text" name="n" class="form-control" required/></td>
				</tr>

				<tr>
					<td>Year</td>
					<Td><input  type="text" name="year" class="form-control" required/></td>
				</tr>

				<tr>
					<td>sem</td>
					<Td><input type="text" name="sem" class="form-control" required/></td>
				</tr>
				
				<tr>
					<td>Enter Your Password </td>
					<Td><input type="password" name="p" class="form-control" required/></td>
				</tr>
				
				<tr>
					
					
<Td colspan="2" align="center">
<input type="submit" value="Save" class="btn btn-info" name="save"/>
<input type="reset" value="Reset" class="btn btn-info"/>
				
					</td>
				</tr>
			</table>
		</form>


		<Tr>
		<Td colspan="2"><?php echo @$ett;?></Td>
	</Tr>
	<div align="center">
		<h2>Or Upload Student Details</h2>
		<br>
		<form method="post" action="add_student.php" enctype="multipart/form-data">
    	<input type="file"  name="excel_file" accept=".csv">
   		<input type="submit" name="import" class="btn btn-info" value="Import">
    </form>
</div>


		</div>
		<div class="col-sm-2"></div>
		</div>


	

	</body>
</html>