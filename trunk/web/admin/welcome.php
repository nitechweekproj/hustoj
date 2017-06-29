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
   <h1 class="sui-page-header"><i class="sui-icon icon-touch-setting2" style="margin-right:1em;"></i>System Administration</h1>
   <?php require("contest.php"); ?>
   <?php require("template/$OJ_TEMPLATE/contestset_frame.php"); ?>
</body>
</html>

