<?php

/**
 * 	@Description:

 @author: master

 @time: 2015-6-18
 */
include "conf/conf_inc.php";
if(isset($_POST["name"])) {
	$name = $_POST['name'];
	$title = $_POST['title'];
	$context = $_POST['context'];
	$time = date("YmdHis");
	$sql = "insert into t_message values(null , '$name' , '$time' , '$title' , '$context')";
	$result = @mysql_query($sql);
	if($result && mysql_insert_id() >0) {
		echo "<script>window.location.href='index.php';</script>";
	}
	mysql_free_result($result);
}

$pagesize=4;//每页的记录数
//当前页
$page=intval($_GET['page']);
if(empty($page)){
	$page=1;
}else{
	if($page<1){
		$page=1;
	}else{
		$page=$_GET['page'];
	}
}
//总记录数
$tn="select * from `t_message`";
$result=@mysql_query($tn) or die(mysql_error());
$totalnumber=mysql_num_rows($result);

//总页数
$pagecount=ceil($totalnumber/$pagesize); //取整  floor 四舍五入，round ceil 进位
//偏移位置
$offset=($page-1)*$pagesize;

$sql = "select * from t_message order by id desc limit ".$offset.",".$pagesize;
$result = mysql_query($sql);
?>

<head>
<title>留言板</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="index.css" rel="stylesheet" type="text/css">
</head>

<script type="text/javascript">
	function check(f) {
		if(f.name.value == "") {
			alert("名字不能为空！");
			f.name.focus();
			return false;
		}else if(f.title.value == "") {
			alert("留言主题不能为空！");
			f.title.focus();
			return false;
		}else if(f.context.value == "") {
			alert("留言内容不能为空！");
			f.context.focus();
			return false;
		}

		return true;
	}
</script>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0"
	marginheight="0">
<center><!-- ImageReady Slices (index.jpg) -->
<table id="__01" width="990" height="793" border="0" cellpadding="0"
	cellspacing="0">
	<?php
	while($row = mysql_fetch_array($result)) {
		?>
	<tr>
		<td colspan="2">
		<table width="990" bordercolor="#FF6600" cellspacing="0"
			cellpadding="0" border="1">

			<tr align="center" class="tdfont">
				<td height="27" width="200" background="images/index_09_repeat.gif">留言作者</td>
				<td height="27" background="images/index_09_repeat.gif">留言信息
				<div align="right"><a href="del.php?id=<?php echo $row["id"]?>" onClick="return confirm('您确定要删除该条数据么？')"><span>删除</span></a></div>
				</td>

			</tr>
			<tr>
				<td>
				<table width="200" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td colspan="3" align="center"><img src="images/1.gif" width="75"
							height="75"></td>
					</tr>
					<tr class="tdfont">
						<td align="right">NO:1</td>
						<td width="22" height="15"><img src="images/logo_sanjiao.gif"></td>
						<td align="left" width="90"><?php echo $row["user"] ?></td>
					</tr>
				</table>
				</td>
				<td valign="top">
				<table width="780" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td class="tdfont" width="53">标题：</td>
						<td><?php echo $row["title"] ?></td>
						<td class="tdfont" width="53">时间：</td>
						<td><?php echo $row["time"] ?></td>
						<td>&nbsp;</td>
						<td width="19" height="16"><img src="images/icon_profile.gif"
							alt="住址" width="16" height="16"></td>
						<td width="19" height="16"><img src="images/icon_email.gif"
							alt="邮箱" width="16" height="16"></td>
						<td width="19" height="16"><img src="images/icon_editor_oicq.gif"
							alt="ICQC" width="16" height="16"></td>
						<td width="19" height="16"><img src="images/icon_homepage.gif"
							alt="主页" width="16" height="16"></td>
						<td width="19" height="16"><img src="images/icon_ip.gif" alt="IP"
							width="16" height="16"></td>
					</tr>
					<tr>
						<td colspan="10" height="75"
							background="images/index_09_repeat1.gif"><?php echo $row["context"] ?></td>
					</tr>

				</table>
				</td>
			</tr>
			<?php

	}
	?>

		</table>
		</td>
	</tr>
	<tr>
		<td align="center" valign="bottom" colspan="2" width="990" height="27"><?php
		if($totalnumber>$pagesize){
			echo "共有".$totalnumber."条记录,分为".$pagecount."页";
			echo "当前第".$page."页";
			$first=1;
			if($page>1){
				echo "<a href=?page=".$first.">首页</a>&nbsp";
				echo "<a href=?page=".($page-1).">上一页</a>&nbsp";
			}
			if($page<$pagecount){
				echo "<a href=?page=".($page+1).">下一页</a>&nbsp";
				echo "<a href=?page=".$pagecount.">末页</a>&nbsp";
			}
		}
		?></td>
	</tr>
	<tr height="27">
		<td valign="bottom" colspan="2" width="990" height="27"
			background="images/index_09_repeat.gif"></td>
	</tr>
	<tr>
		<td colspan="2"><img src="images/index_14.gif" width="990" height="9"
			alt=""></td>
	</tr>
	<tr>
		<td colspan="2" width="990" height="380">
		<form action="index.php" name="note" method="post"
			onSubmit="javascript:return check(this)">
		<table class="tdfont" width="990" height="380" border="1"
			cellpadding="0" cellspacing="0" bordercolor="orange">
			<tr align="center">
				<td height="28" colspan="2" background="images/index_09_repeat.gif"><font
					style="font-weight: bold; color: ffffff">签写留言</font></td>
			</tr>
			<tr>
				<td width="233" height="28" align="right">你的名字：</td>
				<td width="523" height="28"><label> <input type="text" name="name" />
				*（必填）</label></td>
			</tr>
			<tr>
				<td height="28">
				<div align="right">留言主题：</div>
				</td>
				<td height="28"><label> <input name="title" type="text" size="40" />
				*（必填）</label></td>
			</tr>
			<!--
  <tr>
    <td height="28"><div align="right">头像：</div></td>
    <td height="28"><input type="file" />
    *（必填）</td>
  </tr>
  -->
			<tr>
				<td>
				<div align="right">留言内容：</div>
				</td>
				<td><textarea name="context" cols="60" rows="16"></textarea> *（必填）</td>
			</tr>
			<tr>
				<td height="28">&nbsp;</td>
				<td height="28"><input name="submit" type="image"
					src="images/button_note_tijiao.gif" /> [按CTRL+ENTER直接发表]</td>
			</tr>
		</table>


		</form>
		</td>
	</tr>
	<tr>
		<td colspan="2"><img src="images/index_16.gif" width="762" height="17"
			alt=""></td>
	</tr>
	<tr>
		<td><img src="images/分隔符.gif" width="104" height="1" alt=""></td>
	</tr>
</table>
<!-- End ImageReady Slices --></center>
</body>
