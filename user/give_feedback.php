<?php 
extract($_POST);
if(isset($sub))
{
  $user=$_SESSION['user'];

  $sql=mysqli_query($conn,"select * from stufeedback where stuid='$user' and subject='$faculty'");
  $r=mysqli_num_rows($sql);
  
  if($r==true)
  {
  echo "<h2 style='color:red'>You already given feedback to this faculty</h2>";
  }
  else
  {
  $sql=mysqli_query($conn,"select * from subinfo where sem='".$users['sem']."' and subject='$faculty'");
  $r=mysqli_fetch_array($sql);
  
  $query="insert into stufeedback values('$user','$faculty','$que1','$que2','$que3','$que4','$que5','$que6','$que7','$que8','$que9','$que10','".$r['acyear']."','".$r['acsem']."')";
  
  mysqli_query($conn,$query);
  
echo "<h2 style='color:green'>Thank you </h2>";
  }
}


?>
<form method="post">
<fieldset>
<h2><center><u>Give Feedback here</u></center><br></h2>
 
<fieldset>



<h3>Please give your answer about the following question by circling the given grade on the scale:</h3>


<button type="button" style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:3px">Strongly Agree 5</button>
<button type="button" style="font-size:7pt;color:white;background-color:Brown;border:2px solid #336600;padding:3px">Agree 4</button>
<button type="button" style="font-size:7pt;color:white;background-color:blue;border:2px solid #336600;padding:3px">Neutral 3</button>
<button type="button" style="font-size:7pt;color:white;background-color:Black;border:2px solid #336600;padding:3px"> Disagree 2</button>
<button type="button" style="font-size:7pt;color:white;background-color:red;border:2px solid #336600;padding:3px">Strongly Disagree 1</button><br>

<table class="table table-bordered" style="margin-top:50px">
<tr>

<th> Select Faculty :</th>
<td>
<select name="faculty" class="form-control">
<option>click for options</option>
	<?php
$sql=mysqli_query($conn,"select * from subinfo where sem='".$users['sem']."' ");

	while($r=mysqli_fetch_array($sql))
	{
	echo "<option>".$r['subject']."</option>";
	}
		 ?>
</select>
</td>
</tr>
</table>

<table class="table table-bordered" style="margin-top:50px">
<tr>
<td>
<b>1:</b> Teacher is good at stimulating the interest in the course content:</td>
<td> 
<input type="radio" name="que1" value="5" required> 5
<input type="radio" name="que1" value="4">4
  <input type="radio" name="que1" value="3"> 3
<input type="radio" name="que1" value="2">2
<input type="radio" name="que1" value="1">1</td>
</tr>
<tr>
<td><b>2:</b> Teacher is good at explaining the subject matter:</td>
<td>
 <input type="radio" name="que2" value="5" required> 5
  <input type="radio" name="que2" value="4">4
  <input type="radio" name="que2" value="3"> 3
<input type="radio" name="que2" value="2">2
<input type="radio" name="que2" value="1">1</td>
</tr>

<tr><td>
<b>3:</b> Teacher's presentation was clear,loud ad easy to understand:</td>
<td> <input type="radio" name="que3" value="5" required> 5
  <input type="radio" name="que3" value="4">4
  <input type="radio" name="que3" value="3"> 3
<input type="radio" name="que3" value="2">2
<input type="radio" name="que3" value="1">1</td>

<tr>
<td>
<b>4:</b> Teacher is good at using innovative teaching methods/ways:</td><td> 
<input type="radio" name="que4" value="5" required> 5
  <input type="radio" name="que4" value="4">4
  <input type="radio" name="que4" value="3">3
<input type="radio" name="que4" value="2">2
<input type="radio" name="que4" value="1">1</td>
</tr>


<Td><b>5:</b> Teacher is punctual,arrives on time and leaves on time:</td>
<td> <input type="radio" name="que5" value="5" required> 5
  <input type="radio" name="que5" value="4">4
  <input type="radio" name="que5" value="3"> 3
<input type="radio" name="que5" value="2">2
<input type="radio" name="que5" value="1">1
</td>


<tr>
<td>
<b>6:</b> Teacher is available and helpful during counseling hours:</td> 
<td><input type="radio" name="que6" value="5" required>5
  <input type="radio" name="que6" value="4">4
  <input type="radio" name="que6" value="3"> 3
<input type="radio" name="que6" value="2">2
<input type="radio" name="que6" value="1">1</td>
</tr>
<tr>
<td>
<b>7:</b> Teacher has competed the whole course as per course outline:</td>
<td>
 <input type="radio" name="que7" value="5" required> 5
  <input type="radio" name="que7" value="4">4
  <input type="radio" name="que7" value="3"> 3
<input type="radio" name="que7" value="2">2
<input type="radio" name="que7" value="1">1</td>
</tr>

<tr>
<td><b>8:</b>Teacher was always fair and impartial:</td>
<td>
 <input type="radio" name="que8" value="5" required> 5
  <input type="radio" name="que8" value="4">4
  <input type="radio" name="que8" value="3"> 3
<input type="radio" name="que8" value="2">2
<input type="radio" name="que8" value="1">1</td>
</tr>

<tr>
<td><b>9:</b>Assessments conducted are clearly connected to maximize learining objectives:</td>
<td><input type="radio" name="que9" value="5" required>5
  <input type="radio" name="que9" value="4">4
  <input type="radio" name="que9" value="3"> 3
<input type="radio" name="que9" value="2">2
<input type="radio" name="que9" value="1">1</td>
</tr>

<Td><b>10:</b> Teacher provided the course outline having weekly content plan with list of required text book:</td>
<td>
 <input type="radio" name="que10" value="5" required> 5
  <input type="radio" name="que10" value="4">4
  <input type="radio" name="que10" value="3"> 3
<input type="radio" name="que10" value="2">2
<input type="radio" name="que10" value="1">1</td>

</table>



<p align="center"><button type="submit" style="font-size:7pt;color:white;background-color:brown;border:2px solid #336600;padding:7px" name="sub">Submit</button></p>


</form>
</fieldset>


<!--<a href="transport.html"><p align="right"><button type="Button"style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:7px">Next</button></p></a>
<a href="About.php"><p align="right"><button type="Button" style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:7px">Back</button></p></a>-->

</div><!--close content_item-->
      </div><!--close content-->   
	
	</div><!--close site_content-->  	
  
    
    </div><!--close main-->
  </form>
<center>