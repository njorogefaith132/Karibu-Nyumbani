<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '') or die('Database could not connect');
$select = mysqli_select_db( $conn ,"karibunyumbani",) or die('Database could not select');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    chckusername($username, $password);
}

function chckusername($username, $password){

    $check = "SELECT * FROM login WHERE username='$username'";
    $check_q = mysql_query($check) or die("<div class='loginmsg'>Error on checking Username<div>");

    if (mysql_num_rows($check_q) == 1) {
        chcklogin($username, $password);
    }
    else{
        echo "<div id='loginmsg'>Wrong Username</div>";
    }
}

function chcklogin($username, $password){

    $login = "SELECT * FROM login WHERE username='$username'  and password='$password'";
    $login_q = mysql_query($login) or die('Error on checking Username and Password');

    if (mysql_num_rows($login_q) == 1){
        echo "<div id='loginmsg'> Logged in as $username </div>"; 
        $_SESSION['username'] = $username;
        header('Location: ,manage.html');
    }
    else {
        echo "<div id='loginmsg'>Wrong Credentials </div>"; 
        //header('Location: login-problem.php');
    }
}
?>