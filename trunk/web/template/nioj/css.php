<?php 

	$dir=basename(getcwd());
	if($dir=="discuss3"||$dir=="admin") $path_fix="../";
	else $path_fix="";
?>

<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="<?php echo $path_fix."template/$OJ_TEMPLATE/"?>bootstrap.min.css">

<link rel="stylesheet" href="<?php echo $path_fix."template/$OJ_TEMPLATE/$OJ_CSS"?>">
<link rel="stylesheet" href="<?php echo $path_fix."template/$OJ_TEMPLATE/"?>katex.min.css">
<link rel="stylesheet" href="<?php echo $path_fix."template/$OJ_TEMPLATE/"?>mathjax.css">
<link rel="stylesheet" href="<?php echo $path_fix."template/$OJ_TEMPLATE/"?>semantic.min.css">

<link href="https://dn-menci.qbox.me/libreoj/mathjax.css" rel="stylesheet">
<link href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css" rel="stylesheet">
