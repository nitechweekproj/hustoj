<html>
<head>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>New Problem</title>
</head>
<body leftmargin="30" >

<?php require_once("../include/db_info.inc.php");?>
<?php require_once("admin-header.php");
if (!(isset($_SESSION['administrator'])||isset($_SESSION['problem_editor']))){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
?>
<?php
include_once("kindeditor.php") ;
?>
<h2 class="sui-page-header">Add New Problem</h2>

<form method=POST action=problem_add.php>
<input type=hidden name=problem_id value="New Problem">
<p align=left class="sui-text-large">Problem Id:&nbsp;&nbsp;New Problem</p>
<p align=left class="sui-text-large">Title:<input class="input input-xxlarge" type=text name=title size=71></p>
<p align=left class="sui-text-large">Time Limit:<input type=text name=time_limit size=20 value=1>S</p>
<p align=left class="sui-text-large">Memory Limit:<input type=text name=memory_limit size=20 value=128>MByte</p>
<p align=left class="sui-text-large">Description:<br> <textarea class="kindeditor" rows=13 name=description cols=80></textarea> </p>
<p align=left class="sui-text-large">Input:<br> <textarea class="input input-xxlarge" rows=8 name=input cols=80></textarea> </p>
<p align=left class="sui-text-large">Output:<br> <textarea  class="input input-xxlarge" rows=8 name=output cols=80></textarea> </p>
<p align=left class="sui-text-large">Sample Input:<br><textarea  class="input input-xxlarge"  rows=8 name=sample_input cols=80></textarea></p>
<p align=left class="sui-text-large">Sample Output:<br><textarea  class="input input-xxlarge"  rows=8 name=sample_output cols=80></textarea></p>
<p align=left class="sui-text-large">Test Input:<br><textarea  class="input input-xxlarge" rows=8 name=test_input cols=80></textarea></p>
<p align=left class="sui-text-large">Test Output:<br><textarea  class="input input-xxlarge"  rows=8 name=test_output cols=80></textarea></p>
<p align=left class="sui-text-large">Hint:<br>
<textarea class="kindeditor" rows=13 name=hint cols=80></textarea>
</p>
<p>SpecialJudge: N<input type=radio name=spj value='0' checked>Y<input type=radio name=spj value='1'></p>
<p align=left class="sui-text-large">Source:<br><textarea name=source rows=1 cols=70></textarea></p>
<p align=left class="sui-text-large">contest:
	<select  name=contest_id>
<?php

 $sql="SELECT `contest_id`,`title` FROM `contest` WHERE `start_time`>NOW() order by `contest_id`";
$result=pdo_query($sql);
echo "<option value=''>none</option>";
if (count($result)==0){
}else{
	foreach($result as $row){
		echo "<option value='{$row['contest_id']}'>{$row['contest_id']} {$row['title']}</option>";
	}
}
?>
	</select>
</p>
<div align=center>
<?php require_once("../include/set_post_key.php");?>
<input type=submit value=Submit name=submit>
</div></form>
<p>
<?php 
require_once("../oj-footer.php");?>
</body></html>

