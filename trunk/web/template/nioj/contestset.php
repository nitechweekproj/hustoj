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
      <!-- Main component for a primary marketing message or call to action -->
      <div class="sui-container">
        <h3>Onsite Interview <?php echo $_SESSION['user_id'] ?></h3>
        <form method="post" role="form" action=contest.php class="sui-form  form-horizontal">
          <div class="control-group">
            <label class="control-label"><?php echo $MSG_SEARCH;?></label>
            <input name=keyword type=text placeholder="Enter title for search" class="input-xfat">
            <div class="controls">
              <button type="submit" class="sui-btn btn-xlarge btn-primary">Go</button>
            </div>
          </div>
        </form>
        ServerTime:<span id=nowdate></span>
      </div>
      <table class='sui-table table-zebra table-bordered' width=90%>
        <thead>
          <tr><td width=10%>ID<td width=50%>Name<td width=30%>Status<td width=10%>Private<td>Creator</tr>
        </thead>
      <tbody>
        <?php
          foreach($view_contest as $row){
            foreach($row as $table_cell){
              echo "<td>";
              echo "\t".$table_cell;
              echo "</td>";
            }
            echo "</tr>";
          }
        ?>
      </tbody>
      </table>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>	    
  <script>
var diff=new Date("<?php echo date("Y/m/d H:i:s")?>").getTime()-new Date().getTime();
//alert(diff);
function clock()
{
var x,h,m,s,n,xingqi,y,mon,d;
var x = new Date(new Date().getTime()+diff);
y = x.getYear()+1900;
if (y>3000) y-=1900;
mon = x.getMonth()+1;
d = x.getDate();
xingqi = x.getDay();
h=x.getHours();
m=x.getMinutes();
s=x.getSeconds();
n=y+"-"+mon+"-"+d+" "+(h>=10?h:"0"+h)+":"+(m>=10?m:"0"+m)+":"+(s>=10?s:"0"+s);
//alert(n);
document.getElementById('nowdate').innerHTML=n;
setTimeout("clock()",1000);
}
clock();
</script>
 </body>
</html>
