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
    <div id=center class="sui-container">
      <table id=result-tab class="sui-table table-zebra" align=center width=80%>
        <thead>
          <tr>
            <th><?php echo $MSG_RUNID?>
            <th><?php echo $MSG_USER?>
            <th><?php echo $MSG_PROBLEM?>
            <th><?php echo $MSG_RESULT?>
            <th><?php echo $MSG_MEMORY?>
            <th><?php echo $MSG_TIME?>
            <th><?php echo $MSG_LANG?>
            <th><?php echo $MSG_CODE_LENGTH?>
            <th ><?php echo $MSG_SUBMIT_TIME?>
            <th><?php echo $MSG_JUDGER?>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach($view_status as $row){
              foreach($row as $table_cell){
              	echo "<td>";
              	echo $table_cell;
              	echo "</td>";
              }
              echo "</tr>\n";
            }
          ?>
        </tbody>
      </table>
      <div id=center class="sui-container">
      <?php echo "[<a href=status.php?".$str2.">Top</a>]&nbsp;&nbsp;";
      if (isset($_GET['prevtop']))
      echo "[<a href=status.php?".$str2."&top=".intval($_GET['prevtop']).">Previous Page</a>]&nbsp;&nbsp;";
      else
      echo "[<a href=status.php?".$str2."&top=".($top+20).">Previous Page</a>]&nbsp;&nbsp;";
      echo "[<a href=status.php?".$str2."&top=".$bottom."&prevtop=$top>Next Page</a>]";
      ?>
      </div>
  </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>	    
	<script>var i=0;
		var judge_result=[<?php
		foreach($judge_result as $result){
		echo "'$result',";
		}
		?>''];

		var judge_color=[<?php
		 foreach($judge_color as $result){
		 echo "'$result',";
		 }
		?>''];
	</script>
	<script src="template/<?php echo $OJ_TEMPLATE?>/auto_refresh.js" ></script>
  </body>
</html>
