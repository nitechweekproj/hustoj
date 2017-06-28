
<div class="sui-container">  
  <!-- Main component for a primary marketing message or call to action -->
  <div class="sui-container">
    <h3>Check out onsite programming test</h3>
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
