<?php
$server ="localhost";
$username ="root";
$password ="";
$db="karibunyumbani";
$update= false;


try{
    $conn=mysqli_connect($server,$username,$password,$db);

}catch(Exception $e)
{
    $e->getMessage();

}
mysqli_select_db($conn,"karibunyumbani");
$four="insert into personaldetails(Name,idnumber,Number,Email) 
values('$_POST[Name]','$_POST[idnumber]','$_POST[Number]','$_POST[Email]')";
$five=mysqli_query($conn,$four);
if($five)
{
    echo "succeful, book pending";
    header("location:Gaurdian.html");

}
else
{echo "try again";}

if(isset($_GET['delete'])){
    $sql="DELETE FROM personaldetails where idnumber=$id";
    if($conn->query($sql)===TRUE){
        echo "succefully deleted";
    
    }else{
        "error deleting record" .$conn-> error;
    }
    $conn->close();

}

?>