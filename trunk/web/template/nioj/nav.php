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
          <a class="sui-brand"  style="font-size:32px" href="<?php echo $OJ_HOME?>">
            <?php echo $OJ_NAME?>
          </a>
          <ul class="sui-nav" style="font-size:14px">
      <?php $ACTIVE="class='active'"?>
          <?php if(isset($_SESSION['administrator'])) {?>
            <li <?php if ($url=="problemset.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>problemset.php">Problem Set</a></li>
            <li <?php if ($url=="status.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>status.php">Overall status</a></li>
          <?php }?>
            <li <?php if ($url=="contest.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>contest.php">Interviews</a></li>
            <li <?php if ($url=="faqs.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>faqs.php">Instructions</a></li>

      <?php if(isset($_GET['cid'])){
        $cid=intval($_GET['cid']);
        $contest_tab="contest.php?cid=";
        $status_tab="status.php?cid=";
        $contest_tab .= $cid;
        $status_tab .= $cid;
      ?>
            <li <?php if ($url == $contest_tab) echo " $ACTIVE";?>><a href="<?php echo $path_fix?>contest.php?cid=<?php echo $cid?>">
              Interview Questions
            </a></li>
            <li <?php if ($url == $status_tab) echo " $ACTIVE";?>><a href="<?php echo $path_fix?>status.php?cid=<?php echo $cid?>">
              Sumission Status
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
        </div><!--/.nav-collapse -->
      </div><!--/.container-fluid -->


