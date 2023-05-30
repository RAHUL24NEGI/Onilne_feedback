<?php 
error_reporting(1);
include('../dbconfig.php');
extract($_POST);
if(isset($save))
{
//check user alereay exists or not
$sql=mysqli_query($conn,"select * from subinfo where subcode='$subcode'");

$r=mysqli_num_rows($sql);

if($r==true)
{
$err= "<font color='red'><h3 align='center'>This Subject Code already exists</h3></font>";
}
else
{

$query="insert into subinfo values('$subcode','$subject','$facid','$year','$sem')";
mysqli_query($conn,$query);


$err="<font color='blue'><h3 align='center'>Subject Added !!<h3></font>";

}
}


?>


		<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered" style="margin-bottom:50px">
	<caption><h2 align="center">Add Subject</h2></caption>
	<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>
				<tr>
					<td>Subject Code</td>
					<Td><input  type="text" name="subcode" class="form-control" required/></td>
				</tr>

				<tr>
					<td>Subject</td>
					<Td><input  type="text" name="subject" class="form-control" required/></td>
				</tr>

				<tr>
					<td>Faculty ID</td>
					<Td><input  type="text" name="facid" class="form-control" required/></td>
				</tr>

				<tr>
					<td>Year</td>
					<Td><input  type="text" name="year" class="form-control" required/></td>
				</tr>
				<tr>
					<td>Semester</td>
					<Td><input  type="text" name="sem" class="form-control" required/></td>
				</tr>
				<tr>
					
					
<Td colspan="2" align="center">
<input type="submit" value="Save" class="btn btn-info" name="save"/>
<input type="reset" value="Reset" class="btn btn-info"/>
				
					</td>
				</tr>
			</table>
		</form>
		</div>
		<div class="col-sm-2"></div>
		</div>
	</body>
</html>