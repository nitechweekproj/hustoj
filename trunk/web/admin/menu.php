<?php require_once("admin-header.php");

	if(isset($OJ_LANG)){
		require_once("../lang/$OJ_LANG.php");
	}
	

?>
<html>
<head>
<title><?php echo $MSG_ADMIN?></title>
</head>

<body>
<hr>
<h4>
<ol class="sui-nav nav-list">
	<li class="nav-header">Admin</li>
	<li>
		<a href="../index.php" target="main"><b>Home Page</b></a></li>	
<?php
if (isset($_SESSION['administrator'])||isset($_SESSION['problem_editor'])){
?>
	<li>
		<a href="problem_add_page.php" target="main"><b><?php echo $MSG_ADD." ".$MSG_PROBLEM?></b></a></li>
<?php }
if (isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])||isset($_SESSION['problem_editor'])){
?>
	<li>
		<a href="problem_list.php" target="main"><b><?php echo $MSG_PROBLEM." ".$MSG_LIST?></b></a></li>
<?php }
if (isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])){
?>		
<li>
	<a href="contest_add.php" target="main"><b><?php echo $MSG_ADD." ".$MSG_CONTEST?></b></a></li>
<?php }
if (isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])){
?>
<li>
	<a href="contest_list.php" target="main"><b><?php echo $MSG_CONTEST." ".$MSG_LIST?></b></a></li>
<?php }
if (isset($_SESSION['administrator'])||isset( $_SESSION['password_setter'] )){
?><li>
	<a href="changepass.php" target="main"><b><?php echo $MSG_SETPASSWORD?></b></a></li>
<?php }
if (isset($_SESSION['administrator'])){
?><li>
	<a href="rejudge.php" target="main"><b><?php echo $MSG_REJUDGE?></b></a></li>
<?php }
if (isset($_SESSION['administrator'])){
?><li>
	<a href="privilege_add.php" target="main"><b><?php echo $MSG_ADD." ".$MSG_PRIVILEGE?></b></a></li>
<?php }
if (isset($_SESSION['administrator'])){
?><li>
	<a href="privilege_list.php" target="main"><b><?php echo $MSG_PRIVILEGE." ".$MSG_LIST?></b></a></li>
<?php }
if (isset($_SESSION['administrator'])){
?><li>
	<a href="problem_import.php" target="main"><b><?php echo $MSG_IMPORT." ".$MSG_PROBLEM?></b></a></li>
<?php }?>
</ol>
</body>
</html>
