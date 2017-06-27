<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>


<?php
if(file_exists("./admin/msg.txt"))
$view_marquee_msg=file_get_contents($OJ_SAE?"saestor://web/msg.txt":"./admin/msg.txt");
if(file_exists("../admin/msg.txt"))
$view_marquee_msg=file_get_contents($OJ_SAE?"saestor://web/msg.txt":"../admin/msg.txt");


?>
<!--<script type="text/javascript"
  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
</script>
-->
<script>
$(document).ready(function(){
  var msg="<marquee style='margin-top:10px' id=broadcast scrollamount=1 scrolldelay=50 onMouseOver='this.stop()'"+
      " onMouseOut='this.start()' class=toprow>"+<?php echo json_encode($view_marquee_msg); ?>+"</marquee>";
  $(".jumbotron").prepend(msg);
  $("form").append("<div id='csrf' />");
  $("#csrf").load("<?php echo $path_fix?>csrf.php");
  $("body").append("<div id=footer class=center >GPLv2 licensed by <a href='https://github.com/zhblue/hustoj' >HUSTOJ</a> "+(new Date()).getFullYear()+" </div>");
  $("body").append("<div class=center ><a href='https://www.duba.com/?un_454974_116387' title='每天点击一次开发者可获得￥0.06' target='_blank'>捐助系统开发者</a></div>");
});

</script>

