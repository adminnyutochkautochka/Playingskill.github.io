<?php
/* Include the pData class */ 
include 'pChart/pData.class'; 
include 'pChart/pCache.class'; 
include 'pChart/pChart.class'; 

//������� ������ ������ 
$myData = new pData(); 

/* ����������� � MySQL ���� ������ */ 
$db = mysql_connect("localhost", "root", "",users); 
if ( $db == "" ) { echo " DB Connection error...rn"; exit(); } 

mysql_select_db("dle",$db); 

$Requete = "SELECT `summa`,`id` FROM `maz_shop_orders`"; 
$result = mysql_query($Requete,$db); 
while($row = mysql_fetch_array($result)) 
{ 
$myData->AddPoint($row["id"],"id"); 
$myData->AddPoint($row["summa"],"summa"); 
} 

//������������� ����� � ������ 
//�� ��� ������� 
$myData->SetAbsciseLabelSerie("id"); 
//�������� ������ ��� �������������� ��� 
//����������� 
$myData->AddSerie("summa"); 
//������������� ����� 
$myData->SetSerieName( 
mb_convert_encoding("�����",'utf-8','windows-1251'), 
"summa"); 
//������� ������ ������� � 1000 � ������� � 500 px 
$graph = new pChart(1000,500); 
//������������� ����� � ������ ������ 
$graph->setFontProperties("Fonts/tahoma.ttf",10); 
//���������� ����� ������� ������� � ������ ������ 
//������� ������� 
$graph->setGraphArea(85,30,950,400); 
//������ ����������� ��������������� 
$graph->drawFilledRoundedRectangle(7,7,993,493,5,240, 
240,240); 
//������ ������������� ��� ������� ���� 
$graph->drawRoundedRectangle(5,5,995,495,5,230, 
230,230); 
//������������� ��� ������� 
$graph->drawGraphArea(255,255,255,TRUE); 
//������������� ������ ��� �������� 
$graph->drawScale($myData->GetData(), 
$myData->GetDataDescription(), 
SCALE_NORMAL,150,150,150,true,0,2); 
//������ ����� ��� ������� 
$graph->drawGrid(4,TRUE,230,230,230,50); 
//������������� �������� ������� 
$graph->drawLineGraph($myData->GetData(), 
$myData->GetDataDescription()); 
// ������ ����� �� ������� 
$graph->drawPlotGraph($myData->GetData(), 
$myData->GetDataDescription(),3,2,255,255,255); 
// ����� � ������� ��������� ����� 
$graph->setFontProperties("Fonts/tahoma.ttf",10); 
$graph->drawTextBox(870,450,990,460,"Powered By pChart", 
0,250,250,250,ALIGN_CENTER,TRUE,-1,-1,-1,30); 
$graph->drawTextBox(805,470,990,480,"http://pchart.sourceforge.net", 
0,250,250,250,ALIGN_CENTER,TRUE,-1,-1,-1,30); 
$graph->drawTextBox(15,450,140,460,"Developed By kv4nt", 
0,250,250,250,ALIGN_CENTER,TRUE,-1,-1,-1,30); 
$graph->drawTextBox(10,470,140,480,"http://www.piarcom.com", 
0,250,250,250,ALIGN_CENTER,TRUE,-1,-1,-1,30); 
//����� ������� 
$graph->drawLegend(90,35,$myData->GetDataDescription(),255,255,255); 
//����� ��������� 
$graph->setFontProperties("Fonts/tahoma.ttf",10); 
$graph->drawTitle(480,22, 
mb_convert_encoding("������", 
'utf-8','windows-1251'), 
50,50,50,-1,-1,true); 
//������� � ������� 
$graph->Stroke(); 
/** 
* @return array 
*/ 

?>
https://www.pvsm.ru/php-2/12061
?>