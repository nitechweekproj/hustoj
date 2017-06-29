<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $OJ_NAME?></title>  
    <?php include("template/$OJ_TEMPLATE/css.php");?>	    


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <?php include("template/$OJ_TEMPLATE/nav.php");?>
    <div class="sui-container">	    
      <?php
        if ($pr_flag){
          echo "<title>$MSG_PROBLEM ".$row['problem_id']." --". $row['title']."</title>";
          echo "<center><h2>$id: ".$row['title']."</h2>";
        }else{
          $PID="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
          $id=$row['problem_id'];
          echo "<title>$MSG_PROBLEM ".$PID[$pid].": ".$row['title']." </title>";
          echo "<center><h2>$MSG_PROBLEM ".$PID[$pid].": ".$row['title']."</h2>";
        }
        echo "<span class=sui-text-info>$MSG_Time_Limit: </span>".$row['time_limit']." Sec&nbsp;&nbsp;";
        echo "<span class=sui-text-info>$MSG_Memory_Limit: </span>".$row['memory_limit']." MB&nbsp;&nbsp;";
        
        if(isset($_SESSION['administrator'])){
          require_once("include/set_get_key.php");
      ?>

      <?php
      }
      echo "</center>";?>

      <?php
      if ($pr_flag){
        echo "[<a href='submitpage.php?id=$id'>Submit in New Window</a>]";
      }else{
        echo "[<a href='submitpage.php?cid=$cid&pid=$pid&langmask=$langmask'>Submit in New Window</a>]";
      }

      if(isset($_SESSION['administrator'])){
      require_once("include/set_get_key.php");
      ?>
      [<a href="admin/problem_edit.php?id=<?php echo $id?>&getkey=<?php echo $_SESSION['getkey']?>" >Edit</a>]
      [<a href='javascript:phpfm(<?php echo $row['problem_id'];?>)'>TestData</a>]
      <?php
      }
      echo "</center>";
      require("submitpage_frame.php");
    ?>

      <div class="sui-container" style="margin-top:20px;width:80%">
        <ul class="sui-nav nav-tabs tab-wraped">
          <li class="active"><a href="#desc" data-toggle="tab">
            <h3>Description</h3>
          </a></li>
          <li><a href="#args" data-toggle="tab">
            <h3>Arguments</h3>
          </a></li>
          <li><a href="#example" data-toggle="tab">
            <h3>Example</h3>
          </a></li>
          <li><a href="#hints" data-toggle="tab">
            <h3>Hints</h3>
          </a></li>
        </ul>
        <div class="tab-content tab-wraped">
          <div id="desc" class="tab-pane active">
            <?php
              echo "<div class=sui-text-xlarge>".$row['description']."</div>";?>
          </div>
          <div id="args" class="tab-pane">
            <?php
              echo "<h2>$MSG_Input</h2><div class=sui-text-large>".$row['input']."</div>";
              echo "<h2>$MSG_Output</h2><div class=sui-text-large>".$row['output']."</div>";?>
          </div>
          <div id="example" class="tab-pane">
            <?php
              $sinput=str_replace("<","&lt;",$row['sample_input']);
              $sinput=str_replace(">","&gt;",$sinput);
              $soutput=str_replace("<","&lt;",$row['sample_output']);
              $soutput=str_replace(">","&gt;",$soutput);
              if(strlen($sinput)) {
                echo "<h2>$MSG_Sample_Input</h2>
                <pre class=sui-text-large><span class=sampledata>".($sinput)."</span></pre>";
              }
              if(strlen($soutput)){
                echo "<h2>$MSG_Sample_Output</h2>
                <pre class=sui-text-large><span class=sampledata>".($soutput)."</span></pre>";
              }?>
          </div>
          <div id="hints" class="tab-pane">
            <?php
              echo "<h2>$MSG_HINT</h2>
              <div class=sui-text-large><p>".nl2br($row['hint'])."</p></div>";?>
          </div>
        </div>
      </div>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>	
<script>
function phpfm(pid){
        //alert(pid);
        $.post("admin/phpfm.php",{'frame':3,'pid':pid,'pass':''},function(data,status){
                if(status=="success"){
                        document.location.href="admin/phpfm.php?frame=3&pid="+pid;
                }
        });
}
</script>	  
  </body>
</html>
