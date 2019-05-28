<?php
header('Content-type: text/html; charset=utf-8');
$login=$_POST['login'];
$password=$_POST['password'];
$db=mysqli_connect('localhost', 'root', '', 'users');
$query="INSERT INTO users (login, password) VALUES ('$login', '$password')";
$result=mysqli_query($db, $query);
if ($result)
header("Location: nach.php");
mysqli_close($db);
11
?>










