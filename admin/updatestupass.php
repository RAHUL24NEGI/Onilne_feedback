<?php 
extract($_POST);
if(isset($save))
{

	if($np=="" || $cp=="" || $id="")
	{
	$err="<font color='red'>fill all the fileds first</font>";	
	}
	else
	{

	    if($np==$cp)
	    {
	    $np=md5($np);
	    $sql=mysqli_query($conn,"update user set pass='$np' where id='$id'");
	
	    $err="<font color='blue'>Password updated </font>";
	    }
	    else
	    {
	    $err="<font color='red'>New  password not matched with Confirm Password </font>";
	    }
    }


}

?>
<h2 align="center">Update Password</h2>
<form method="post">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
    <div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter Student ID</div>
		<div class="col-sm-5">
		<input type="text" name="id" class="form-control"/></div>
	</div>

	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter YOur New Password</div>
		<div class="col-sm-5">
		<input type="password" name="np" class="form-control"/></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter YOur Confirm Password</div>
		<div class="col-sm-5">
		<input type="password" name="cp" class="form-control"/></div>
	</div>
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		
		
		<input type="submit" value="Update Password" name="save" class="btn btn-success"/>
		<input type="reset" class="btn btn-success"/>
		</div>
	</div>
</form>	