<?php
error_reporting(1);
include('../dbconfig.php');
extract($_POST);
if(isset($save))
	{	

		
	$q=mysqli_query($conn,"select * from faculty where fac_id='$id'");
	$r=mysqli_num_rows($q);	
	if($r)
	{
	$err="<font color='red'>This ID already exists choose diff ID.</font>";
	}
	else
	{	
		mysqli_query($conn,"insert into faculty values('$id','$name','$pass')");
		
		
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
            	<input type="text" name="id" class="form-control" required>
        </div>
   	</div>
	
	   <div class="control-group form-group">
    	<div class="controls">
        	<label>Name:</label>
            	<input type="text" name="name" class="form-control" required>
        </div>
   	</div>

	<div class="control-group form-group">
    	<div class="controls">
        	<label>Password :</label>
            	<input type="password"  name="pass" class="form-control" required>
        </div>
    </div>
	
	 
	<div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="save" value="Add New Faculty">
        </div>
  	</div>
	</form>


</div>