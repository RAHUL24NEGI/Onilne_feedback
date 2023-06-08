<?php
include('../dbconfig.php');
	
	$info=$_GET['fac_id'];
	
	mysqli_query($conn,"delete from faculty where fac_id='$info'");
	header('location:dashboard.php?info=show_faculty');
?>