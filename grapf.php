<?php
$host='localhost'; // им€ хоста (уточн€етс€ у провайдера)
$database='users'; // им€ базы данных, которую вы должны создать
$user='root'; // заданное вами им€ пользовател€, либо определенное провайдером
$pswd=''; // заданный вами пароль
 
$dbh = mysql_connect($host, $user, $pswd) or die("Ќе могу соединитьс€ с MySQL.");
mysql_select_db($database) or die("Ќе могу подключитьс€ к базе.");


$query = "SELECT * FROM `users`";
$res = mysql_query($query);
while($row = mysql_fetch_array($res))
{
	echo "Ќомер: ".$row['id']."<br>"; 
echo "Ћогин: ".$row['login'].' | ';
echo "ѕароль: ".$row['password']."<br>".'  ';
}



?>