<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("bibleqa.php");
if(!isset($_GET['fw'])){
$_SESSION['biblefw'] = 0;
}else{
$_SESSION['biblefw'] = $_GET['fw'];
}

if($_SESSION['biblefw']=='1'){ $mu = 0;$fw = "摩西五经";}
if($_SESSION['biblefw']=='2'){ $mu = 1;$fw = "历史诗歌书";}
if($_SESSION['biblefw']=='3'){ $mu = 2;$fw = "大小先知书";}
if($_SESSION['biblefw']=='4'){
   $fw = "四福音书";
   if(rand(0,1)=='0') $mu = 3;
   else $mu = 5;
}   
if($_SESSION['biblefw']=='5') {$mu = 4;$fw = "新约书信";}
if($_SESSION['biblefw']=='0') {$mu = rand(0,5);$fw = "随机";}

$tm = rand(1,count($array_qn[$mu]));
$_SESSION['biblemu']= $array_qn[$mu][$tm];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>圣经知识测试中心</title>
<meta content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width" name="viewport" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta name="keywords" content="圣经知识测试中心" />
<meta name="description" content="圣经知识测试中心" />
<link href="../chajing/css/main.css" rel="stylesheet" type="text/css" />
<SCRIPT language="JavaScript">
function setFontSize(size){document.getElementById('content').style.fontSize=size+'pt'}
</SCRIPT>
<style type="text/css">
.select{text-align:center;margin:5px 0;background:#f8f8f8;border-top:#ccc 1px solid;border-bottom:#ccc 1px solid;height:33px;line-height:33px;}
.select:hover{background:#eee;cursor:pointer}
.result{border:1px solid #d3d3d3;margin:3% auto 8%;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;-moz-box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);-webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);}
</style>
</head>
<body>
<div class="box">
  <div class="header">
    <div class="header_left"><a href="index.html" target="_self">返回</a></div>
    <div class="header_right"></div>
  </div>
  <div class="news_t"><b><?php echo $fw; ?>-经文测试</b></div>
  <div class="news_t1"><span>导航：</span> <span >首页&gt;<?php echo $fw; ?></span> <span style="float: right;">字号：<a id="contentFontp14" href="javascript:setFontSize(14);"  href="#">A</a> | <a id="contentFontp18" href="javascript:setFontSize(18);" style="font-size: 18px;">A</a></span> </div>
  <div id="content" class="news">
    <p style="border:1px solid #d3d3d3;margin:1% auto 0;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;-moz-box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);-webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);"><b><?php echo $_SESSION['biblemu'][0]; ?></b></p>
  </div>
  <div class="news">
  <font color="#006699" size="-1">请选择：</font>
  <div class="select" onClick="choose('a');" >A.<?php echo $_SESSION['biblemu'][1]; ?></div>
  <div class="select" onClick="choose('b');">B.<?php echo $_SESSION['biblemu'][2]; ?></div>
  <div class="select" onClick="choose('c');">C.<?php echo $_SESSION['biblemu'][3]; ?></div>
  <div class="select" onClick="choose('d');">D.<?php echo $_SESSION['biblemu'][4]; ?></div>
  </div>  
  <div class="result"><b>&nbsp;测试结果:&nbsp;&nbsp;<span id="re"></span></b></div>

  <script language="javascript">
	function choose(t){
	var correct = "<?php echo strtolower($_SESSION['biblemu'][5]); ?>";
		if(t == correct){
		document.getElementById('re').innerHTML = '<font color="#0000FF">恭喜你！答对了，2秒钟自动进入下一题。</font>';
		setTimeout("location.reload()",2000);  
		}else{
		document.getElementById('re').innerHTML = '<font color="#FF0000">答错啦！请您参考：【<?php echo $_SESSION['biblemu'][6]; ?>】</font>';
		}
	}
  </script>
  <div class="footer"> 网上整理，仅供参考
    <p></p>
    <span>&copy; 香柏林 2016</span> </div>
</div>
</body>
</html>
