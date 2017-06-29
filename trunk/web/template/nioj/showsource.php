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
      <!-- Main component for a primary marketing message or call to action -->
      <div class="sui-container">
	
<link href='highlight/styles/shCore.css' rel='stylesheet' type='text/css'/>
<link href='highlight/styles/shThemeDefault.css' rel='stylesheet' type='text/css'/>
<script src='highlight/scripts/shCore.js' type='text/javascript'></script>
<script src='highlight/scripts/shBrushCpp.js' type='text/javascript'></script>
<script src='highlight/scripts/shBrushCss.js' type='text/javascript'></script>
<script src='highlight/scripts/shBrushJava.js' type='text/javascript'></script>
<script src='highlight/scripts/shBrushDelphi.js' type='text/javascript'></script>
<script src='highlight/scripts/shBrushRuby.js' type='text/javascript'></script>
<script src='highlight/scripts/shBrushBash.js' type='text/javascript'></script>
<script src='highlight/scripts/shBrushPython.js' type='text/javascript'></script>
<script src='highlight/scripts/shBrushPhp.js' type='text/javascript'></script>
<script src='highlight/scripts/shBrushPerl.js' type='text/javascript'></script>
<script src='highlight/scripts/shBrushCSharp.js' type='text/javascript'></script>
<script src='highlight/scripts/shBrushVb.js' type='text/javascript'></script>
<script language='javascript'>
SyntaxHighlighter.config.bloggerMode = false;
SyntaxHighlighter.config.clipboardSwf = 'highlight/scripts/clipboard.swf';
SyntaxHighlighter.all();
</script>
<?php
if ($ok==true || isset($_SESSION['administrator'])){
  $brush=strtolower($language_name[$slanguage]);
  if ($brush=='pascal') $brush='delphi';
  if ($brush=='obj-c') $brush='c';
  if ($brush=='freebasic') $brush='vb';
  if ($brush=='swift') $brush='csharp';
  echo "<pre class=\"brush:".$brush.";\">";
  ob_start();
  echo "/**************************************************************\n";
  echo "\tProblem: $sproblem_id\n\tUser: $suser_id\n";
  echo "\tLanguage: ".$language_name[$slanguage]."\n\tResult: ".$judge_result[$sresult]."\n";
  if ($sresult==4){
  echo "\tTime:".$stime." ms\n";
  echo "\tMemory:".$smemory." kb\n";
  }
  echo "****************************************************************/\n\n";
  $auth=ob_get_contents();
  ob_end_clean();
  echo htmlentities(str_replace("\n\r","\n",$view_source),ENT_QUOTES,"utf-8")."\n".$auth."</pre>";
  }else{
    echo "<div class=\"sui-msg msg-large msg-block msg-stop\">
      <div class=\"msg-con\">Sorry, you cannot view this code.</div>
      <s class=\"msg-icon\"></s>
      </div>";
  }
?>
</div>
<?php require("template/$OJ_TEMPLATE/nioj_footer.php");?>  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>	    
  </body>
</html>
