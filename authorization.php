<?php
    header('Content-type: text/html; charset=utf-8');
session_start();
$login=$_POST['login'];
$password=$_POST['password'];
$db=mysqli_connect('localhost', 'root', '', 'users');
$query="SELECT * FROM users WHERE login='$login' AND BINARY password='$password'";
$result=mysqli_query($db, $query);
if (mysqli_num_rows($result))
$_SESSION['login']=$login;
else
$_SESSION['login']='er login';
        include("/index1.html"); //Переменная выводится
mysqli_close($db);
?>