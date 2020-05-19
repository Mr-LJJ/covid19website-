<?php
error_reporting(E_ALL^E_WARNING);
error_reporting(E_ALL^E_NOTICE);
include("./api.php");//引入数据
if($Virus = json_decode($Virus_api, true)){$apistatus='1';}else{$apistatus='-1';echo "<script src='../assets/sweetalert2/dist/sweetalert2.min.js'><link rel='stylesheet' href='../assets/sweetalert2/dist/sweetalert2.min.css'></script><meta http-equiv='refresh' content='0.1' url='index.php'><script>;Swal.fire({icon: 'error',title: 'Oops...API Boom',text: '悠着点!别刷那么快，1秒后自动刷新!',showConfirmButton: false})</script>";}
header('Content-type:text/html;charset=utf-8');
$totalCured=$Virus['country']['totalCured'];//全国累计治愈
$totalDeath=$Virus['country']['totalDeath'];//全国累计死亡
$incDoubtful=$Virus['country']['incDoubtful'];//全国疑似（较昨日数据对比）
$totalDoubtful=$Virus['country']['totalDoubtful'];//全国目前疑似
$time=$Virus['country']['time'];//时间
$totalConfirmed=$Virus['country']['totalConfirmed'];//全国累计确诊
$updateTime=$Virus['dataSourceUpdateTime']['updateTime'];//截止时间
$dataSource=$Virus['dataSourceUpdateTime']['dataSource'];//各省市地区卫健委
for($i = 0; $i < 34; $i++){
$P_childStatistic[]= $Virus['provinceArray'][$i]['childStatistic'];//省份名称
$P_totalCured[] = $Virus['provinceArray'][$i]['totalCured'];//省份累计治愈
$P_totalDeath[] = $Virus['provinceArray'][$i]['totalDeath'];//省份累计死亡
$P_totalConfirmed[] = $Virus['provinceArray'][$i]['totalConfirmed'];//省份累计确诊
}

?>
