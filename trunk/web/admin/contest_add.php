<?php require_once("admin-header.php");?>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>Add interview</title>

<?php
	require_once("../include/db_info.inc.php");
	require_once("../lang/$OJ_LANG.php");
	require_once("../include/const.inc.php");

$description="";
 if (isset($_POST['syear']))
{
	
	require_once("../include/check_post_key.php");
	
	$starttime=intval($_POST['syear'])."-".intval($_POST['smonth'])."-".intval($_POST['sday'])." ".intval($_POST['shour']).":".intval($_POST['sminute']).":00";
	$endtime=intval($_POST['eyear'])."-".intval($_POST['emonth'])."-".intval($_POST['eday'])." ".intval($_POST['ehour']).":".intval($_POST['eminute']).":00";
	//	echo $starttime;
	//	echo $endtime;

        $title=$_POST['title'];
        $private=$_POST['private'];
        $password=$_POST['password'];
        $description=$_POST['description'];
        if (get_magic_quotes_gpc ()){
                $title = stripslashes ($title);
                $private = stripslashes ($private);
                $password = stripslashes ($password);
                $description = stripslashes ($description);
        }

    $lang=$_POST['lang'];
    $langmask=0;
    foreach($lang as $t){
			$langmask+=1<<$t;
	} 
$langmask=((1<<count($language_ext))-1)&(~$langmask);
	//echo $langmask;	
	
        $sql="INSERT INTO `contest`(`title`,`start_time`,`end_time`,`private`,`langmask`,`description`,`password`)
                VALUES(?,?,?,?,?,?,?)";
	echo $sql;
	$cid=pdo_query($sql,$title,$starttime,$endtime,$private,$langmask,$description,$password) ;
	echo "Add Contest ".$cid;
	$sql="DELETE FROM `contest_problem` WHERE `contest_id`=$cid";
	$plist=trim($_POST['cproblem']);
	$pieces = explode(",",$plist );
	if (count($pieces)>0 && intval($pieces[0])>0){
		$sql_1="INSERT INTO `contest_problem`(`contest_id`,`problem_id`,`num`) 
			VALUES (?,?,?)";
		$plist="";
		for ($i=0;$i<count($pieces);$i++){
			
			if($plist)$plist.=",";
			$plist.=$pieces[$i];
			pdo_query($sql_1,$cid,$pieces[$i],$i);
		}
		//echo $sql_1;
		
		$sql="update `problem` set defunct='N' where `problem_id` in ($plist)";
		pdo_query($sql) ;
	}
	$sql="DELETE FROM `privilege` WHERE `rightstr`=?";
	pdo_query($sql,"c$cid");
	$sql="insert into `privilege` (`user_id`,`rightstr`)  values(?,?)";
	pdo_query($sql,$_SESSION['user_id'],"m$cid");
	$_SESSION["m$cid"]=true;
	$pieces = explode("\n", trim($_POST['ulist']));
	if (count($pieces)>0 && strlen($pieces[0])>0){
		$sql_1="INSERT INTO `privilege`(`user_id`,`rightstr`) 
			VALUES (?,?)";
		for ($i=0;$i<count($pieces);$i++){
			
			pdo_query($sql_1,trim($pieces[$i]),"c$cid") ;
		}
	}
	echo "<script>window.location.href=\"contest_list.php\";</script>";
}
else{
	
   if(isset($_GET['cid'])){
		   $cid=intval($_GET['cid']);
		   $sql="select * from contest WHERE `contest_id`=?";
		   $result=pdo_query($sql,$cid);
		    $row=$result[0];
		   $title=$row['title'];
		   
			$plist="";
			$sql="SELECT `problem_id` FROM `contest_problem` WHERE `contest_id`=? ORDER BY `num`";
			$result=pdo_query($sql,$cid) ;
			for ($i=count($result);$i>0;$i--){
				$row=$result[0];
				$plist=$plist.$row[0];
				if ($i>1) $plist=$plist.',';
			}
			
   }
	else if(isset($_POST['problem2contest'])){
	   $plist="";
	   //echo $_POST['pid'];
	   sort($_POST['pid']);
	   foreach($_POST['pid'] as $i){		    
			if ($plist) 
				$plist.=','.$i;
			else
				$plist=$i;
	   }
	}else if(isset($_GET['spid'])){
	require_once("../include/check_get_key.php");
		   $spid=intval($_GET['spid']);
		 
			$plist="";
			$sql="SELECT `problem_id` FROM `problem` WHERE `problem_id`>=? ";
			$result=pdo_query($sql,$spid) ;
			foreach ($result as $row){
				if ($plist) $plist.=',';
				$plist.=$row[0];
			}
	}  
  include_once("kindeditor.php") ;?>


	<h2 class="sui-page-header">Add Onsite Interview</h2>
	<form class="sui-form form-horizontal" method=post>
		<div class="control-group">
			<lable class="control-label">Title:</lable>
	     	<div class="controls">
	        	<input type=text name=title class="input-xlarge input-xfat" value="<?php echo isset($title)?$title:""?>">
	     	</div>
	    </div>
	    <div class="control-group">
	    	<lable class="control-label">Start Time:</lable>
	    	<div class="controls">
	            <lable>Hour</lable>
	            <input class="input-xfat" type=text name=shour size=2 value=<?php echo date('H')?>>
	            <lable>Minute</lable>
	            <input class="input-xfat" type=text name=sminute value=00 size=2 ></p>
	        </div>
	    </div>
	    <div class="control-group">
	    	<lable class="control-label">End Time:</lable>
	    	<div class="controls">
	            <lable>Hour</lable>
	            <input class="input-xfat" type=text name=ehour size=2 value=<?php echo (date('H')+2)%24?>>
	            <lable>Minute</lable>
	            <input class="input-xfat" type=text name=eminute value=00 size=2 ></p>
	        </div>
	    </div>

	    <div class="control-group">
	    	<lable class="control-label">Public:</lable>
	    	<div class="controls">
	    		<select name=private>
	 				<option value=0>Public</option>
	  				<option value=1>Private</option>
	  			</select>
	        </div>
	        <lable class="control-label">Password:</lable>
	        <div class="controls">
	        	<input type=text class="input-large" name=password value="">
	        </div>
	    </div>

	    <div class="control-group">
	    	<lable class="control-label">Language:</lable>
	    	<div class="controls">
	            <select name="lang[]" multiple="multiple" style="height:100px;width:100px">
		            <?php
						$lang_count=count($language_ext);
	 					$langmask=$OJ_LANGMASK;
	 					for($i=0;$i<$lang_count;$i++){
	                 		echo "<option value=$i selected>
	                        	".$language_name[$i]."
	                 		</option>";
	  					}?>
	  			</select>
	        </div>
	    </div>
	    <?php require_once("../include/set_post_key.php");?>

	    <div class="control-group">
	    	<lable class="control-label">Problems:</lable>
	    	<div class="controls">
	    		<input class=input-xlarge placeholder="Example:1000,1001,1002" type=text name=cproblem value="<?php echo isset($plist)?$plist:""?>">
	        </div>
	    </div>

	    <div class="control-group">
	    	<lable class="control-label">Description:</lable>
	    	<div class="controls">
	    		<textarea class=kindeditor rows=13 name=description cols=80></textarea>
	        </div>
	    </div>

	    <div class="control-group">
	    	<lable class="control-label">Users:</lable>
	    	<div class="controls">
	    		<textarea name="ulist" rows="3" cols="80"></textarea>
	        </div>
	    </div>

	    <div class="control-group">
	    	<div class="controls">
	    		<input type=submit value=Submit name=submit class="sui-btn btn-large btn-primary">
	    		<input type=reset value=Reset name=reset class="sui-btn btn-large btn-primary">
	        </div>
	    </div>
	</form>
<?php }?>

