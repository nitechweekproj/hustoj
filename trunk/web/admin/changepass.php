<?php require_once("admin-header.php");?>
<?php if (!(isset($_SESSION['administrator'])|| isset($_SESSION['password_setter']) )){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
if(isset($_POST['do'])){
	//echo $_POST['user_id'];
	require_once("../include/check_post_key.php");
	//echo $_POST['passwd'];
	require_once("../include/my_func.inc.php");
	
	$user_id=$_POST['user_id'];
    $passwd =$_POST['passwd'];
    if (get_magic_quotes_gpc ()) {
		$user_id = stripslashes ( $user_id);
		$passwd = stripslashes ( $passwd);
	}
	$passwd=pwGen($passwd);
	$sql="update `users` set `password`=? where `user_id`=?  and user_id not in( select user_id from privilege where rightstr='administrator') ";
	
	if (pdo_query($sql,$passwd,$user_id)==1) echo "Password Changed!";
  else echo "No such user! or He/Her is an administrator!";
}
?>
<form action='changepass.php' method=post>
	<h2>Change Password</h2><br />
	User:<input type=text size=10 name="user_id"><br />
	Pass:<input type=text size=10 name="passwd"><br />
	<?php require_once("../include/set_post_key.php");?>
	<input type='hidden' name='do' value='do'>
	<input type=submit value='Change'>
</form>
