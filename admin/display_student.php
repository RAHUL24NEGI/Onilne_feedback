<script type="text/javascript">
function deletes(id)
{
	a=confirm('Are You Sure To Remove This Record ?')
	 if(a)
     {
        window.location.href='delete_student.php?id='+id;
     }
}
</script>	


<?php
	echo "<table class='table table-responsive table-bordered table-striped table-hover' style=margin:15px;>";
	echo "<tr class='success'>";
	
	echo '<th  style="text-align:center">COLLEGE ID</th>';
	echo '<th  style="text-align:center">NAME</th>';
	echo '<th  style="text-align:center">YEAR</th>';
	echo '<th  style="text-align:center">SEMESTER</th>';
	echo '<th  style="text-align:center">UPDATE</th>';
	echo '<th  style="text-align:center">DELETE</th>';
	echo "</tr>";
	$que=mysqli_query($conn,"select * from user");
	
	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo '<td  style="text-align:center">'.$row['id'].'</td>';
		echo '<td  style="text-align:center">'.$row['name'].'</td>';
		echo '<td  style="text-align:center">'.$row['year'].'</td>';
		echo '<td  style="text-align:center">'.$row['sem'].'</td>';
		echo "<td class='text-center'><a href='dashboard.php?id=$row[id]&info=updatestupass'><span class='glyphicon glyphicon-pencil'style=color:green;></span></a></td>";
		echo "<td class='text-center'><a href='#' onclick='deletes($row[id])'><span class='glyphicon glyphicon-remove' style=color:red;></span></a></td>";
		echo "</tr>";
	}
	
?>