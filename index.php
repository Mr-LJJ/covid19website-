<!DOCTYPE html>
<!--PHP开始-->
<?php
include("./analysis.php");
date_default_timezone_set ("PRC");
?>
<html lang="zh" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!--代码By:Mr.LJJ(LJJ Studios 随笔生活组) 注释:L雷 J佳 J杰  LOL-->
    <!--比赛项目自2020.5.12开坑-->
    <!--本代码遵循MIT协议-->
    <title>实时更新|新冠肺炎疫情动态</title>
    <!--每十分钟刷新页面-->
    <meta http-equiv="refresh" content="600">
    <meta name="keywords" content="实时疫情动态,疫情动态,疫情,新型冠状病毒">
    <meta name="description" content="关注疫情实时动态，了解最新疫情数据">
    <!--链接文件-->
    <script src="../assets/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../assets/sweetalert2/dist/sweetalert2.min.css">
    <link href="../assets/css/index.css" rel="stylesheet" type="text/css"/>
    <link href="./assets/font/css/font-awesome.min.css" rel="stylesheet"/>
    <link href=/data-ncov/static/css/app.b53224b7.css rel=stylesheet>
    <script src="../assets/jquery-3.5.0.min.js"></script>
    <!--图标-->
    <link rel="Shortcut Icon" href="../assets/icon/icon.ico" type="image/x-icon" />
  </head>
  <body>
    <!--横幅  -->
    <div class="banner" align="center">
      <img src="../assets/img/bj.jpg"></img>
    </div>
    <!--主方块-->
    <div class="mainblock">
      <div class="data_china">
        <div class="data_input">
          <h4>累计确诊</h4>
          <div class="number" id="number" style="color:<?php if ($totalConfirmed > '50000'){echo 'RGB(163,29,19)';}//判断数字大小颜色 ?>;">
            <?php echo $totalConfirmed; ?></div>
        </div>
        <div class="data_nosynptom">
          <h4>全国疑似(较昨日数据对比)</h4>
          <div class="number" id="number" style="color:<?php if ($incDoubtful > '10'){echo 'RGB(228,74,61)';}elseif($incDoubtful > '0'){echo 'RGB(255,163,82)';}elseif($incDoubtful == '0'){echo 'RGB(0,141,94)';} ?>;">
            <?php echo $incDoubtful; ?></div>
        </div>
        <div class="data_todayconfirm" onclick="Swal.fire({icon: 'question',title: '疫情数据说明：',html: '<h3>1.数据含义：</h3>' + '<p>“现有确诊数”为当前正在治疗中的确诊人数，此数值会随疫情数据的实时更新而发生变化。</p><br>' + '<h3>2.计算方法：</h3>' + '<p>现有确诊数=累计确诊数-累计死亡数-累计治愈数</p></br>',showConfirmButton: false})">
          <h4>现有疑似病例
            <img src="../assets/icon/problem.png">
            <img></h4>
          <div class="number" id="number" style="color:<?php if ($totalDoubtful > '10') {echo 'RGB(228,74,61)';}elseif($totalDoubtful > '0'){echo 'RGB(255,163,82)';}elseif($totalConfirmed == '0'){echo 'RGB(0,141,94)';} ?>;">
            <?php echo $totalDoubtful; ?></div>
        </div>
        <div class="data_confirm" onclick="Swal.fire({icon: 'question',title: '疫情数据说明：',html: '<h4>4月17日，武汉市订正新冠肺炎病例数，确诊病例核增325例，死亡病例核增1290例，治愈出院核减965人次。</h4><br>',showConfirmButton: false})">
          <h4>湖北省累计确诊
            <img src="../assets/icon/problem.png">
            <img></h4>
          <div class="number" id="number" style="color:<?php echo " RGB(163,29,19) ";?>;">
            <?php echo $Virus[ 'provinceArray'][0][ 'totalConfirmed']; ?></div>
        </div>
        <div class="data_dead" onclick="Swal.fire({icon: 'question',title: '疫情数据说明：',html: '<h4>4月17日，武汉市订正新冠肺炎病例数，确诊病例核增325例，死亡病例核增1290例，治愈出院核减965人次。</h4><br>',showConfirmButton: false})">
          <h4>累计死亡
            <img src="../assets/icon/problem.png">
            <img></h4>
          <div class="number" id="number" style="color:RGB(51,51,51);">
            <?php echo $totalDeath; ?></div>
        </div>
        <div class="data_heal" onclick="Swal.fire({icon: 'question',title: '疫情数据说明：',html: '<h4>4月17日，武汉市订正新冠肺炎病例数，确诊病例核增325例，死亡病例核增1290例，治愈出院核减965人次。</h4><br>',showConfirmButton: false})">
          <h4>累计治愈
            <img src="../assets/icon/problem.png">
            <img></h4>
          <div class="number" id="number" style="color:RGB(0,141,94);">
            <?php echo $totalCured; ?></div>
        </div>
        <div class="lasttime" onclick="Swal.fire({icon: 'question',title: '疫情数据说明：',html: '<p>1. 数据来源：国家卫健委、各省市区卫健委、各省市区政府、港澳台官方渠道公开数据。</p><br><p>2. 数据更新时间：实时更新全国、各省市区数据，因核实计算需要，与官方的发布时间相比，将有一定时间延迟。</p><br><p>3. 实时数据统计原则：</p><br><p>① 每日上午优先将全国各类数据与国家卫健委公布数据对齐（此时各省市区数据尚未及时更新，会出现全国数据大于各省市区合计数的情况）；</p><br><p>② 数据实时更新过程中，各省市区卫健委陆续公布数据，如果各省市区公布数据总和大于之前国家公布数据，则全国数据切换为各省市区合计数；</p><br><p>② 数据实时更新过程中，各省市区卫健委陆续公布数据，如果各省市区公布数据总和大于之前国家公布数据，则全国数据切换为各省市区合计数；</p><br><p>③ “较昨日+”的数据以国家卫健委每日公布的新增数据为基线，实时根据各省市区陆续公布的数据进行更新；</p><br><p>④ 由于各省市区数据发布时间和统计时间各不相同，因此在部分时段可能出现国家总数与各省市区总数不等的情况。</p><br><p>4. 疫情趋势图：全国数据使用国家卫健委公布的截至前一日24:00数据，每日更新一次。</p>',showConfirmButton: false})"><br>
            <p><?php echo $updateTime; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp数据说明</p>
        </div>
      </div>
      <hr align=center width=750 color=#8e8e88 SIZE=1></hr>
        <div class="cont">
        <span class="heading"><center><h2 id="bt" style="color:RGB(51,51,51);" onclick="Swal.fire({icon: 'question',title: '表格使用说明：',html: '<h4>点击表格右方图标可以展开各省情况</h4><br><h4>再次点击回到主页</h4>',showConfirmButton: false})">国内疫情<img src="../assets/icon/problem.png"><img></h2></center></span>
        <div class="tab_box2" id="tab_box2">
          <table class="table table-expandable caozuo">
                    <thead>
                        <tr>
                            <th>地区</th>
                            <th>累计治愈</th>
                            <th>累计死亡</th>
                            <th>累计确诊</th>
                            <th>现有病例</th>
                <th></th>
                        </tr>
                    </thead>
            <!--国内疫情表格-->
            <tbody id="xqsj">
            <?php
            for($i = 0; $i < 34; $i++){
              $nowconfirm1 = '0';
              $nowconfirm1 = $P_totalConfirmed[$i] - $P_totalDeath[$i] - $P_totalCured[$i];//计算现有病例
              echo '<tr>'.
                   '<td>'.$P_childStatistic[$i].'</td>'.
                   '<td>'.$P_totalCured[$i].'</td>'.
                   '<td>'.$P_totalDeath[$i].'</td>'.
                   '<td>'.$P_totalConfirmed[$i].'</td>'.
                   '<td>'.$nowconfirm1.'</td>'.
                   '<td><a id="'.$i.'" onclick="xq(this.id)">
                               <i class="fa fa-sign-in" style="color:#000000;"></i></a>
                   </td>'.
                 '</tr>';
                    }
            ?>

              <tr>
                <td colspan="5">
                  <h4>说明：</h4>
                  <ul>
                    <li>1.主要来源：国家卫健委、各省市区卫健委、各省市区政府、港澳台官方渠道公开数据。</li>
                    <li>2.数据更新：实时更新全国、各省市区数据，因需要核实计算，与官方发布的时间相比，将有一定的时间延迟。</li>
                  </ul>
                </td>
              </tr>
            </tbody>
                </table>
          </div>
        </div><!--引入地图-->
        <div class='map_data'><center><h2 style="color:RGB(51,51,51);"  onclick="Swal.fire({icon: 'question',title: '地图说明：',html: '<h4>本地图位于LJJ Studios Network服务器中,并通过iframe引入</h4><br><h4>源码,数据,地图可视库来源在地图右下侧标记</a></h4>',showConfirmButton: false})">疫情地图<img src="../assets/icon/problem.png"></h2></center>
          <iframe src="http://datamap.ljjserver.cn"></iframe>
        </div>
        </div>
    </div>
    <div id="return-top" class="top_e">
        <img src="/assets/icon/arrow_up.png" width="60" id="img" >
      <div style="width:60px;margin:auto;"></div>
      </div>

    </div>
    <footer>
      <div class="footer">
        <center><p id="footerword">Copyright &copy2020 team 随笔生活(LJJ Studios) All rights reserved &nbsp&nbsp&nbsp&nbsp<a href="http://www.beian.miit.gov.cn/" target="_blank">粤ICP备20029412-1</a></p></center>
      </div>
    </footer>
    <script>
    function myFunction(){
    alert("数据来源：国家卫健委、各省市区卫健委、各省市区政府、港澳台官方渠道公开数据。所有数据并不代表本站立场！");
    }
    function xq(id)
    {
    var xhr = new XMLHttpRequest;
    xhr.open('GET', './ajax.php?port=cx&sf_id='+id);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send();
    xhr.onreadystatechange = function() {
            if(xhr.readyState == 4 && (xhr.status == 200 || xhr.status ==304)) {			//响应完成并且响应码为200或304
    		var Data = JSON.parse(xhr.responseText);
    		    if(Data[0] == 1){
    			   document.getElementById("xqsj").innerHTML="<h3>不存在</h3>";
    		    }else{
    				var a = '';
    				document.getElementById("bt").innerHTML=Data[0];
    			    for (var i=1;i<Data.length;i++) {
    		        a += Data[i];
    			    }
    			document.getElementById("xqsj").innerHTML=a;
    		    }
    		}else{
    			document.getElementById("xqsj").innerHTML=a;
    		}
    }
    }
    // 控制按钮的显示和消失
    $(window).scroll(function(){
            if($(window).scrollTop()>300){
                $('#return-top').fadeIn(300);
                }
                else{$('#return-top').fadeOut(200);}
                })
    // 点击按钮，使得页面返回顶部
    $("#return-top").click(function(){
    scrollTo(0,0);
    });
    // 鼠标悬浮按钮之上，图片消失，文字显示
    $(".top_e").mouseover(function(){
      $("#img").hide();
      $("#font").show();
    })
    //鼠标离开，文字消失，图片显示。
    $(".top_e").mouseout(function(){
      $("#font").hide();
      $("#img").show();
    })
    </script>
  </body>
</html>
