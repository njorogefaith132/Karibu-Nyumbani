<?php
$server ="localhost";
$username ="root";
$password ="";
$db="karibunyumbani";

try{
    $conn=mysqli_connect($server,$username,$password,$db);

}catch(Exception $e)
{
    $e->getMessage();

}
mysqli_select_db($conn,"karibunyumbani");
$four="insert into gaurdian(Name,idnumber,Number,Email,Relation) 
values('$_POST[Name]','$_POST[idnumber]','$_POST[Number]','$_POST[Email]','$_POST[Relation]')";
$five=mysqli_query($conn,$four);
if($five)
{
    echo "succeful, book pending";
    header("location:submit.html");

}
else
{echo "try again";}
?>