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
	
	echo "<th>Faculty ID</th>";
	echo "<th>Subject Code</th>";
	echo "<th>Subject</th>";
    echo "<th>Delete</th>";
	echo "</tr>";

	$que=mysqli_query($conn,"select * from subinfo");
	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$row['facid']."</td>";
		echo "<td>".$row['subcode']."</td>";
		echo "<td>".$row['subject']."</td>";
		
		echo "<td class='text-center'><a href='#' onclick='deletes($row[subcode])'><span class='glyphicon glyphicon-remove' style=color:red;></span></a></td>";
		echo "</tr>";
	}
	
?>