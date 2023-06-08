<h1 align="center" style="text-decoration:underline"><a href="">Admin Dashboard</a></h1>
<?php 
//all complaints
$qq=mysqli_query($conn,"select * from faculty ");
$rows=mysqli_num_rows($qq);			
echo "<h2 style='color:green'>Total Number of Faculty : $rows</h2>";	

//all emegency compalints
$q=mysqli_query($conn,"select * from user");
$r1=mysqli_num_rows($q);			
echo "<h2 style='color:orange'>Total Number of Student : $r1</h2>";	

?>


<?php 
error_reporting(1);
include('../dbconfig.php');
extract($_POST);
if(isset($save))
{

	$sql=mysqli_query($conn,"select * from user");
	while($r=mysqli_num_rows($sql))
	{
        $r['sem']+=1;
        if($r['sem']%2)$r['year']++;
	}
}


?>


					</td>
				</tr>
			</table>
		</form>
		</div>
		<div class="col-sm-2"></div>
		</div>
	</body>
</html>