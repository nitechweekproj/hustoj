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
    <div class="jumbotron" style="background-color:#eee">
      <div class="sui-container">
        <h1> Welcome to National Instruments Onsite Programming Test</h1>
        <?php if(!isset($_SESSION['user_id'])) {?>
        <div class="sui-container" style="margin-top:20px">  
          <p class="sui-lead">Login to the system with the user name and password given by the interviewer</p>
          <form action="login.php" method="post" role="form" class="sui-form form-horizontal">
            <div class="control-group">
              <label class="control-label"><?php echo $MSG_USER_ID?></label>
              <div class="controls">
                <input name="user_id" class="input-xfat" placeholder="<?php echo $MSG_USER_ID?>" type="text">
              </div>
              <label class="control-label"><?php echo $MSG_PASSWORD?></label>
              <div class="controls">
                <input name="password" class="input-xfat" placeholder="<?php echo $MSG_PASSWORD?>" type="password">
              </div>
              <label class="control-label"></label>
              <button type="submit" class="sui-btn btn-xlarge btn-primary"><?php echo $MSG_LOGIN; ?></button>
            </div>
          </form>       
        </div> <!-- /container -->
        <?php }else{ if(!isset($_SESSION['administrator'])){?>
          <div class="sui-container" style="margin-top:20px">  
            <p class="sui-lead">Check out the interview questions:</p>
            <?php include("contest.php"); ?>
          </div>
        <?php } else{?>
          <div class="sui-container" style="margin-top:20px">  
            <p class="sui-lead">For administration functions, go to user->Admin</p>
          </div>
        <?php }?>
      </div>
    </div>
    <!-- Placed at the end of the document so the pages load faster -->
    <?php if(!isset($_SESSION['administrator'])) include("template/$OJ_TEMPLATE/js.php");?>	    
  </body>
</html>
