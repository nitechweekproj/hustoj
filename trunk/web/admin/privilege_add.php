<?php require_once("admin-header.php");?>
<?php if (!(isset($_SESSION['administrator']))){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
if(isset($_POST['do'])){
	require_once("../include/check_post_key.php");
	$user_id=$_POST['user_id'];
	$rightstr =$_POST['rightstr'];
	$sql="insert into `privilege` values(?,?,'N')";
	$rows=pdo_query($sql,$user_id,$rightstr);
	echo "$user_id $rightstr added!";
	
}
?>
<h2 class="sui-page-header">Add Privilege or Interview to User</h2>
<form method=post>
<?php require("../include/set_post_key.php");?>
	<b>Add privilege for User:</b><br />
	User:<input type=text name="user_id"><br />
	Privilege:
	<select name="rightstr">
<?php
$rightarray=array("administrator");
while(list($key, $val)=each($rightarray)) {
	if (isset($rightstr) && ($rightstr == $val)) {
		echo '<option value="'.$val.'" selected>'.$val.'</option>';
	} else {
		echo '<option value="'.$val.'">'.$val.'</option>';
	}
}
?></select><br />
	<input type='hidden' name='do' value='do'>
	<input class="sui-btn btn-primary" type=submit value='Add'>
</form>
<form method=post>
	<b>Add Interview for User:</b><br />
	User:<input type=text name="user_id"><br />
	Interview:<input type=text name="rightstr">interview title<br />
	<input type='hidden' name='do' value='do'>
	<input class="sui-btn btn-primary" type=submit value='Add'>
	<input type=hidden name="postkey" value="<?php echo $_SESSION['postkey']?>">
</form>
