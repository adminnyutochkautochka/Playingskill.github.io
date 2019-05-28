<?php
/* Include the pData class */ 
include 'pChart/pData.class'; 
include 'pChart/pCache.class'; 
include 'pChart/pChart.class'; 

//создаем объект данных 
$myData = new pData(); 

/* Коннектимся к MySQL базе данных */ 
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

//устанавливаем точки с датами 
//на ось абсцисс 
$myData->SetAbsciseLabelSerie("id"); 
//помечаем данные как предназначеные для 
//отображения 
$myData->AddSerie("summa"); 
//устанавливаем имена 
$myData->SetSerieName( 
mb_convert_encoding("Сумма",'utf-8','windows-1251'), 
"summa"); 
//создаем график шириной в 1000 и высотой в 500 px 
$graph = new pChart(1000,500); 
//устанавливаем шрифт и размер шрифта 
$graph->setFontProperties("Fonts/tahoma.ttf",10); 
//координаты левой верхней вершины и правой нижней 
//вершины графика 
$graph->setGraphArea(85,30,950,400); 
//рисуем заполненный четырехугольник 
$graph->drawFilledRoundedRectangle(7,7,993,493,5,240, 
240,240); 
//теперь незаполненный для эффекта тени 
$graph->drawRoundedRectangle(5,5,995,495,5,230, 
230,230); 
//прорисовываем фон графика 
$graph->drawGraphArea(255,255,255,TRUE); 
//устанавливаем данные для графиков 
$graph->drawScale($myData->GetData(), 
$myData->GetDataDescription(), 
SCALE_NORMAL,150,150,150,true,0,2); 
//рисуем сетку для графика 
$graph->drawGrid(4,TRUE,230,230,230,50); 
//прорисовываем линейные графики 
$graph->drawLineGraph($myData->GetData(), 
$myData->GetDataDescription()); 
// рисуем точки на графике 
$graph->drawPlotGraph($myData->GetData(), 
$myData->GetDataDescription(),3,2,255,255,255); 
// пишем в подвале некоторый текст 
$graph->setFontProperties("Fonts/tahoma.ttf",10); 
$graph->drawTextBox(870,450,990,460,"Powered By pChart", 
0,250,250,250,ALIGN_CENTER,TRUE,-1,-1,-1,30); 
$graph->drawTextBox(805,470,990,480,"http://pchart.sourceforge.net", 
0,250,250,250,ALIGN_CENTER,TRUE,-1,-1,-1,30); 
$graph->drawTextBox(15,450,140,460,"Developed By kv4nt", 
0,250,250,250,ALIGN_CENTER,TRUE,-1,-1,-1,30); 
$graph->drawTextBox(10,470,140,480,"http://www.piarcom.com", 
0,250,250,250,ALIGN_CENTER,TRUE,-1,-1,-1,30); 
//ложим легенду 
$graph->drawLegend(90,35,$myData->GetDataDescription(),255,255,255); 
//Пишем заголовок 
$graph->setFontProperties("Fonts/tahoma.ttf",10); 
$graph->drawTitle(480,22, 
mb_convert_encoding("График", 
'utf-8','windows-1251'), 
50,50,50,-1,-1,true); 
//выводим в браузер 
$graph->Stroke(); 
/** 
* @return array 
*/ 

?>
https://www.pvsm.ru/php-2/12061
?>