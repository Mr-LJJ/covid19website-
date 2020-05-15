<?php
include("./analysis.php");//引入数据
header('Content-Type: application/json; charset=UTF-8');
$port=isset($_GET['port'])?$_GET['port']:null;
$sf_id=$_GET['sf_id'];
?>
<?php
switch ($port) {
case "cx":
    $sf = $Virus['provinceArray'][$sf_id]['cityArray'];
	if(!$sf){
		$json[0]=1;
	}else{

		$json[0]=$P_childStatistic[$sf_id];
		foreach($sf as $value){
      $nowconfirm2 = '0';
      $nowconfirm2 = $value['totalConfirmed'] - $value['totalDeath'] - $value['totalCured'];//计算现有病例
		$json[]= '<tr>'.
			'<td>'.$value['childStatistic'].'</td>'.
			'<td>'.$value['totalCured'].'</td>'.
			'<td>'.$value['totalDeath'].'</td>'.
			'<td>'.$value['totalConfirmed'].'</td>'.
      '<td>'.$nowconfirm2.'</td>'.
			'<td><a href="./">
            <i class="fa fa-sign-out" style="color:#000000;"></i></a>
			</td>'.
			'</tr>';
        }

	}
   echo json_encode($json);
break;
}
?>
