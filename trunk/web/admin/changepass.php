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
<center>
   <h2 class="sui-page-header">Change Password</h2>
   <form class="sui-form form-horizontal" action='changepass.php' method=post>
      <div class="control-group">
         <label class="control-label">User ID:</label>
         <div class="controls">
            <input type=text name="user_id" class="input-xlarge input-fat">
         </div>
      </div>

      <div class="control-group">
         <label class="control-label">Password:</label>
         <div class="controls">
            <input type=text size=10 name="passwd" class="input-xlarge input-fat">
         </div>
      </div>

      <?php require_once("../include/set_post_key.php");?>
      <input type='hidden' name='do' value='do'>

      <div class="control-group">
         <div class="controls">
            <input type=submit value='Change' class="sui-btn btn-large btn-primary"> 
         </div>
      </div>
   </form>
</center>
