<?php 
	$url=basename($_SERVER['REQUEST_URI']);
	$dir=basename(getcwd());
	if($dir=="discuss3") $path_fix="../";
	else $path_fix="";
	if($OJ_ONLINE){
		require_once('./include/online.php');
		$on = new online();
	}
?>
      <!-- Static navbar -->
      <div class="sui-navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="sui-container">
              <a class="sui-brand" href="<?php echo $OJ_HOME?>"><?php echo $OJ_NAME?></a>
              <ul class="sui-nav">
  	      <?php $ACTIVE="class='active'"?>
              <?php if(isset($_SESSION['administrator'])) {?>
                <li <?php if ($url=="problemset.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>problemset.php"><?php echo $MSG_PROBLEMS?></a></li>
                <li <?php if ($url=="status.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>status.php"><?php echo $MSG_STATUS?></a></li>
              <?php }?>
                <li <?php if ($url=="contest.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>contest.php"><?php echo $MSG_CONTEST?></a></li>
                <li <?php if ($url=="faqs.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>faqs.php"><?php echo $MSG_FAQ?></a></li>

          <?php if(isset($_GET['cid'])){
            $cid=intval($_GET['cid']);
            $contest_tab="contest.php?cid="
            $status_tab="status.php?cid="
            $contest_tab .= $cid
            $status_tab .= $cid
          ?>
                <li <?php if ($url == $contest_tab) echo " $ACTIVE";?>><a href="<?php echo $path_fix?>contest.php?cid=<?php echo $cid?>">
                  <?php echo $MSG_CONTEST?>
                </a></li>
                <li <?php if ($url == $status_tab) echo " $ACTIVE";?>><a href="<?php echo $path_fix?>status.php?cid=<?php echo $cid?>">
                  <?php echo $MSG_INTERVIEWSTATUS?>
                </a></li>
          <?php }?>
              </ul>
              <ul class="sui-nav pull-right">
                  <li class="sui-dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><span id="profile">Login</span><i class="caret"></i></a>
                    <ul role="menu" class="sui-dropdown-menu">
                      <script src="<?php echo $path_fix."template/$OJ_TEMPLATE/profile.php?".rand();?>" ></script>
                    </ul>
                  </li>
              </ul>
            </div>
        </div><!--/.nav-collapse -->
      </div><!--/.container-fluid -->


