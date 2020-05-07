<?php
$mysqli = new mysqli('localhost','root','','karibunyumbani') or die(mysqli_error($mysqli));
if(isset($_POST['save'])){
     $Name=$_POST['Name'];
     $idnumber=$_POST['idnumber'];
     $Number=$_POST['Number'];
     $Email=$_POST['Email'];
    
     $mysqli->query("INSERT into management(Name,idnumber,Number,Email) VALUES('$Name','$idnumber','$Number','$Email')") or die($mysql->error);
     header('location: manage2.php');
}
if(isset($_GET['delete'])){
    $idnumber=$_GET['delete'];
    $mysqli->query("DELETE from management where idnumber=$idnumber") or die($mysql->error);
    header('location: manage2.php');
}
$id="";
$Name="";
$update = false;
$delete = false;
$Number="";
$Email = "";
if(isset($_GET['edit'])){
    $idnumber=$_GET['edit'];
    $update= true;
    $result = $mysqli->query("SELECT * from management where idnumber=$idnumber") or die($mysql->error);
    $row = mysqli_fetch_array($result);
    $id=$row['idnumber'];
    $Name=$row['Name'];
     $Number=$row['Number'];
     $Email=$row['Email'];
}

if(isset($_POST['update'])){
    $Name=$_POST['Name'];
    $idnumber=$_POST['idnumber'];
    $Email=$_POST['Email'];
    $Number=$_POST['Number'];
    $mysqli->query("UPDATE `management` SET `Name`='$Name',`Number`= '$Number' ,`Email`= '$Email' WHERE `idnumber`= '$idnumber' ") or die($mysql->error);
    header('location: manage2.php');
}
?>