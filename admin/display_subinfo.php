<script type="text/javascript">
function deletes(subcode)
{
	a=confirm('Are You Sure To Remove This Record ?')
	 if(a)
     {
        window.location.href='delete_subinfo.php?subcode='+subcode;
     }
}
</script>	


<?php
	
	echo "<table class='table table-responsive table-bordered table-striped table-hover' style=margin:15px;>";
	echo "<tr class='success'>";
	
	echo "<th>Subject Name</th>";
	echo "<th>Subject Code</th>";
	echo "<th>Faculty</th>";
	echo "<th>Year</th>";
	echo "<th>Sem</th>";
	echo "<th>Academic Year</th>";
	echo "<th>Odd/Even Sem</th>";
	
	echo "</tr>";

	$que=mysqli_query($conn,"select * from subinfo");
	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$row['subject']."</td>";
		echo "<td>".$row['subcode']."</td>";
		echo "<td>".$row['facname']."</td>";
		echo "<td>".$row['year']."</td>";
		echo "<td>".$row['sem']."</td>";
		echo "<td>".$row['acyear']."</td>";
		echo "<td>".$row['acsem']."</td>";
		
		echo "</tr>";
	}
	
?>