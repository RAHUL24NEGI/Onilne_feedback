
<style>
    


    body, table, input, select, textarea {

}


.graph {
	margin-bottom:1em;
  font:normal 100%/150% arial,helvetica,sans-serif;
}

.graph caption {
	font:bold 150%/120% arial,helvetica,sans-serif;
	padding-bottom:0.33em;
}

.graph tbody th {
	text-align:right;
}

@supports (display:grid) {

	@media (min-width:32em) {

		.graph {
			display:block;
      width:1200px;
      height:300px;
		}

		.graph caption {
			display:block;
		}

		.graph thead {
			display:none;
		}

		.graph tbody {
			position:relative;
			display:grid;
			grid-template-columns:repeat(auto-fit, minmax(2em, 1fr));
			column-gap:2.5%;
			align-items:end;
			height:100%;
			margin:3em 0 1em 2.8em;
			padding:0 1em;
			border-bottom:2px solid rgba(0,0,0,0.5);
			background:repeating-linear-gradient(
				180deg,
				rgba(170,170,170,0.7) 0,
				rgba(170,170,170,0.7) 1px,
				transparent 1px,
				transparent 20%
			);
		}

		.graph tbody:before,
		.graph tbody:after {
			position:absolute;
			left:-3.2em;
			width:2.8em;
			text-align:right;
			font:bold 80%/120% arial,helvetica,sans-serif;
		}

		.graph tbody:before {
			content:"5";
			top:-0.6em;
		}

		.graph tbody:after {
			content:"0";
			bottom:-0.6em;
		}

		.graph tr {
			position:relative;
			display:block;
		}

		.graph tr:hover {
			z-index:999;
		}

		.graph th,
		.graph td {
			display:block;
			text-align:center;
		}

		.graph tbody th {
			position:absolute;
			top:-3em;
			left:0;
			width:100%;
			font-weight:normal;
			text-align:center;
      white-space:nowrap;
			text-indent:0;
			transform:rotate(0deg);
		}

		.graph tbody th:after {
			content:"";
		}

		.graph td {
			width:100%;
			height:100%;
			background:#F63;
			border-radius:0.5em 0.5em 0 0;
			transition:background 0.5s;
		}

		.graph tr:hover td {
			opacity:0.7;
		}

		.graph td span {
			overflow:hidden;
			position:absolute;
			left:50%;
			top:50%;
			width:0;
			padding:0.5em 0;
			margin:-1em 0 0;
			font:normal 85%/120% arial,helvetica,sans-serif;
/* 			background:white; */
/* 			box-shadow:0 0 0.25em rgba(0,0,0,0.6); */
			font-weight:bold;
			opacity:0;
			transition:opacity 0.5s;
      color:white;
		}

		.toggleGraph:checked + table td span,
		.graph tr:hover td span {
			width:4em;
			margin-left:-2em; /* 1/2 the declared width */
			opacity:1;
		}


        
    


	} /* min-width:32em */

} /* grid only */
    </style>


<?php 
error_reporting(1);
include('../dbconfig.php');
extract($_POST);
if(isset($save))
{
    $sql=mysqli_query($conn,"select * from stufeedback where subject='$faculty' and acyear='$year' and acsem='$sem'");
    $p=mysqli_num_rows($sql);
    if($p){
        $p*=5;
        while($r=mysqli_fetch_array($sql))
	    {
        $q1+=$r["que1"];
        $q2+=$r["que2"];
        $q3+=$r["que3"];
        $q4+=$r["que4"];
        $q5+=$r["que5"];
        $q6+=$r["que6"];
        $q7+=$r["que7"];
        $q8+=$r["que8"];
        $q9+=$r["que9"];
        $q10+=$r["que10"];
	    }
        $q1=($q1/$p)*100;
        $q2=($q2/$p)*100;
        $q3=($q3/$p)*100;
        $q4=($q4/$p)*100;
        $q5=($q5/$p)*100;
        $q6=($q6/$p)*100;
        $q7=($q7/$p)*100;
        $q8=($q8/$p)*100;
        $q9=($q9/$p)*100;
        $q10=($q10/$p)*100;  

        $q1a=$q1/20;
        $q2a=$q2/20;
        $q3a=$q3/20;
        $q4a=$q4/20;
        $q5a=$q5/20;
        $q6a=$q6/20;
        $q7a=$q7/20;
        $q8a=$q8/20;
        $q9a=$q9/20;
        $q10a=$q10/20;
        
}
    else{
        echo "<h2 style='color:red'>NO RECORD FOUND!!!!!!!!</h2>";
  
}
}
?>


		
		<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered" style="margin-bottom:50px">
	<caption><h2 align="center">Search by Subject</h2></caption>
				<tr>
                <th> Select Subject :</th>
<td>
<select name="faculty" class="form-control">
<option>click for options</option>
	<?php
    $user=$_SESSION['user'];
$sql=mysqli_query($conn,"select * from subinfo");

	while($a=mysqli_fetch_array($sql))
	{
	echo "<option>".$a['subject']."</option>";
	}
		 ?>
</select>
                <td>
					Academic Year
				</td>
				<Td><select name="year" class="form-control" required>
                    <option>-</option>
					<option>2021</option>
					<option>2022</option>
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>
                    <option>2027</option>
					<option>2028</option>
					</select>
					</td>
				<td>
					Odd/Even Sem
				</td>
				<Td><select name="sem" class="form-control" required>
                    <option>-</option>
					<option>Odd</option>
					<option>even</option>
					</select>
					

					
<Td colspan="2" align="center">
<input type="submit" value="Save" class="btn btn-info" name="save"/>
<input type="reset" value="Reset" class="btn btn-info"/>
				
					</td>
				</tr>
			</table>
		</form>


    

	</body>
</html>


<div>
<table class="graph">
	<caption>Average feedback given by Student according to given questions in</caption>
	<thead>
		<tr>
			<th scope="col">Item</th>
			<th scope="col">Percent</th>
		</tr>
	</thead><tbody>
		<tr style="height:<?php echo"$q1";?>%">
			<th scope="row">QUES1</th>
			<td><span><?php echo"$q1a";?>%</span></td>
		</tr>
		<tr style="height:<?php echo"$q2";?>%">
			<th scope="row">QUES2</th>
			<td><span><?php echo"$q2a";?>%</span></td>
		</tr>
		<tr style="height:<?php echo"$q3";?>%">
			<th scope="row">QUES3</th>
			<td><span><?php echo"$q3a";?>%</span></td>
		</tr>
		<tr style="height:<?php echo"$q4";?>%">
			<th scope="row">QUES4</th>
			<td><span><?php echo"$q4a";?>%</span></td>
		</tr>
		<tr style="height:<?php echo"$q5";?>%">
			<th scope="row">QUES5</th>
			<td><span><?php echo"$q5a";?>%</span></td>
		</tr>
		<tr style="height:<?php echo"$q6";?>%">
			<th scope="row">QUES6</th>
			<td><span><?php echo"$q6a";?>%</span></td>
		</tr>
		<tr style="height:<?php echo"$q7";?>%">
			<th scope="row">QUES7</th>
			<td><span><?php echo"$q7a";?>%</span></td>
		</tr>
		<tr style="height:<?php echo"$q8";?>%">
			<th scope="row">QUES8</th>
			<td><span><?php echo"$q8a";?>%</span></td>
		</tr>
        </tr>
		<tr style="height:<?php echo"$q9";?>%">
			<th scope="row">QUES9</th>
			<td><span><?php echo"$q9a";?>%</span></td>
		</tr>

		<tr style="height:<?php echo"$q10";?>%">
			<th scope="row">QUES10</th>
			<td><span><?php echo"$q10a";?>%</span></td>
		</tr>
	</tbody>
</table>
</div>
<br><br><br>
<br>
<br>
<br>



<table class="table table-bordered" style="margin-bottom:50px">
	
    <tr>
        <td><b>1:</b> Teacher is good at stimulating the interest in the course content:</td>
        <td><b>2:</b> Teacher is good at explaining the subject matter:</td>
    </tr>

    <tr>
    <td><b>3:</b> Teacher's presentation was clear,loud ad easy to understand:</td>
    <td><b>4:</b> Teacher is good at using innovative teaching methods/ways:</td>
    </tr>

    <tr>
    <Td><b>5:</b> Teacher is punctual,arrives on time and leaves on time:</td>
    <td><b>6:</b> Teacher is available and helpful during counseling hours:</td> 
    </tr>

    <tr>
    <td><b>7:</b> Teacher has competed the whole course as per course outline:</td>
    <td><b>8:</b>Teacher was always fair and impartial:</td> 

    </tr>
    <tr>
    <td><b>9:</b>Assessments conducted are clearly connected to maximize learining objectives:</td>
    <Td><b>10:</b> Teacher provided the course outline having weekly content plan with list of required text book:</td>

    </tr>
    
</table>