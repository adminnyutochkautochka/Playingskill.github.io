<?php
$host='localhost'; // ��� ����� (���������� � ����������)
$database='users'; // ��� ���� ������, ������� �� ������ �������
$user='root'; // �������� ���� ��� ������������, ���� ������������ �����������
$pswd=''; // �������� ���� ������
 
$dbh = mysql_connect($host, $user, $pswd) or die("�� ���� ����������� � MySQL.");
mysql_select_db($database) or die("�� ���� ������������ � ����.");


$query = "SELECT * FROM `users`";
$res = mysql_query($query);
while($row = mysql_fetch_array($res))
{
	echo "�����: ".$row['id']."<br>"; 
echo "�����: ".$row['login'].' | ';
echo "������: ".$row['password']."<br>".'  ';
}



?>