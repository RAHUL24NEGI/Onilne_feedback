<?php
use SimpleExcel\SimpleExcel;

if(isset($_POST['import'])){

if(move_uploaded_file($_FILES['excel_file']['tmp_name'],$_FILES['excel_file']['name'])){
require_once('SimpleExcel/SimpleExcel.php'); // load the main class file (if you're not using autoloader)

$excel = new SimpleExcel('csv');                    // instantiate new object (will automatically construct the parser & writer type as XML)

$excel->parser->loadFile($_FILES['excel_file']['name']);            // load an XML file from server to be parsed

$foo = $excel->parser->getField();   // get complete array of the table
$count = 2;
$conn = mysqli_connect('localhost','root','','feedback');
while(count($foo)>$count)
{
    $id=$foo[$count][0];
    $name=$foo[$count][1];
    $pass=$id;
    $year=1;
    $sem=1;
    $query="insert into user values('$id','$name','$pass','$year','$sem')";
    mysqli_query($conn,$query);
    $count++;
}
echo "sfdnjkgvn";
}
}
?>