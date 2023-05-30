<?php
error_reporting(1);
include('../dbconfig.php');
	extract($_POST);
	if(isset($save))
	{	
		$user_name=$email;
		
	$q=mysqli_query($conn,"select * from faculty where id='$id'");
	$r=mysqli_num_rows($q);	
	if($r)
	{
	$err="<font color='red'>This ID already exists choose diff email.</font>";
	}
	else
	{	
		mysqli_query($conn,"insert into faculty values('$id','$name','$pass')");
		
		$subject ="New User Account Creation";
		$from="info@phptpoint.com";
		$message ="User name: ".$user_name." Password ".$pass;
		$headers = "From:".$from;
		mail($email,$subject,$message,$headers);
		
	$err="<font color='green'>New Faculty Successfully Added.</font>";
	}
	
}	

?>


<h1 class="page-header">Add Faculty</h1>
<div class="col-lg-8" style="margin:15px;">
	<form method="post">
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label><?php echo @$err;?></label>
        </div>
   	</div>

	   <div class="control-group form-group">
    	<div class="controls">
        	<label>FacultyID :</label>
            	<input type="text" value="<?php echo @$id;?>" name="id" class="form-control" required>
        </div>
   	</div>
	
	   <div class="control-group form-group">
    	<div class="controls">
        	<label>Name:</label>
            	<input type="text" value="<?php echo @$name;?>" name="name" class="form-control" required>
        </div>
   	</div>

	<div class="control-group form-group">
    	<div class="controls">
        	<label>Password :</label>
            	<input type="password" value="<?php echo @$pass;?>"  name="pass" class="form-control" required>
        </div>
    </div>
	
	 
	<div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="save" value="Add New Faculty">
        </div>
  	</div>
	</form>


</div>