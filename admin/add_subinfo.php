<?php 
error_reporting(1);
include('../dbconfig.php');
extract($_POST);
if(isset($save))
{

	$sql=mysqli_query($conn,"select * from subinfo where subject='$subject' and acyear='$year' and acsem='$sem'" );
	$r=mysqli_num_rows($sql);
	
	if($r==true)
	{
	echo "<h2 style='color:red'>You already given feedback to this faculty</h2>";
	}
	else
	{

$query="insert into subinfo values('$subcode','$subject','$facname','$year','$sem','$acyear','$acsem')";
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
					<td>Faculty Name</td>
					<td>
<select name="facname" class="form-control">
<option>-</option>
	<?php
$sql=mysqli_query($conn,"select * from faculty");

	while($r=mysqli_fetch_array($sql))
	{
	echo "<option>".$r['name']."</option>";
	}
		 ?>
</select>
</td>
				</tr>

				<tr>
					<td>Year</td>
					<Td><select name="year" class="form-control" required>
                    <option>-</option>
					<option>1</option>
					<option>2</option>
                    <option>3</option>
                    <option>4</option>
				</tr>
				<tr>
					<td>Semester</td>
					<Td><select name="sem" class="form-control" required>
                    <option>-</option>
					<option>1</option>
					<option>2</option>
                    <option>3</option>
                    <option>4</option>
					<option>5</option>
                    <option>6</option>
					<option>7</option>
                    <option>8</option>
				</tr>


				<tr>
				<td>
					Academic Year
				</td>
				<Td><select name="acyear" class="form-control" required>
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
				</tr>

				<tr>
				<td>
					Odd/Even Sem
				</td>
				<Td><select name="acsem" class="form-control" required>
                    <option>-</option>
					<option>Odd</option>
					<option>even</option>
					</select>
					</td>
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