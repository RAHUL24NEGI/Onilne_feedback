<?php
include('../dbconfig.php');
	
	$info=$_GET['subcode'];
	
	mysqli_query($conn,"delete from subinfo where subcode='$info'");
	header('location:dashboard.php?info=display_subinfo');
?>