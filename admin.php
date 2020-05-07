<?php
$server="localhost";
$user="root";
$password="";
$database="karibunyumbani";

$conn=mysqli_connect($server,$user,$password,$database);

$username=$_POST['username'];
$password=$_POST['password'];

mysqli_select_db($conn,'karibunyumbani');
$sql="select * from login where username='$username' && password='$password'";
$RESULT=mysqli_query($conn,$sql);
$ROW=mysqli_fetch_array($RESULT);
if ($ROW['username'] == $username && $ROW['password'] == $password)
{
  header ("location:manage2.php");
  echo "Login Successful";
 /*echo '<script language= "javascript">';
  echo 'alert("Login Successful")';
  echo '</script>';
  */
}
else
{
  echo "Incorrect login credentials";
 /* echo '<script language= "javascript">';
  echo 'alert("Incorrect login credentials")';
  echo '</script>';
  */
}
?>