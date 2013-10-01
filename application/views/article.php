<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : WellFormed 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130731

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href=<?php echo base_url()?>style/default.css rel="stylesheet" type="text/css" media="all" />
<link href=<?php echo base_url()?>style/fonts.css rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="logo" class="container">
	<a href="#"><img src=<?php echo base_url()?>style/images/OPA.gif width="375" height="95" alt="" /></a>
</div>
<div id="menu" class="container">
	<ul>
		<li <?php if(isset($focus) && $focus == 'home' )echo 'class="current_page_item"'?>>     <a href="<?php echo base_url()."index.php/home/index" ?>" accesskey="1" title="">Homepage</a></li>
		<li <?php if(isset($focus) && $focus =='' )echo 'class="current_page_item"'?>>          <a href="#" accesskey="2" title="">Over OPA</a></li>
		<li <?php if(isset($focus) && $focus == '' )echo 'class="current_page_item"'?>>         <a href="#" accesskey="3" title="">Media</a></li>
		<li <?php if(isset($focus) && $focus == 'audities' )echo 'class="current_page_item"'?>> <a href="<?php echo base_url()."index.php/audition" ?>" accesskey="4" title="">Audities</a></li>
		<li <?php if(isset($focus) && $focus == '' )echo 'class="current_page_item"'?>>         <a href="#" accesskey="5" title="">Contact</a></li>
		<li <?php if(isset($focus) && $focus == 'inloggen' )echo 'class="current_page_item"'?>>     <a href="<?php echo base_url()."index.php/login" ?>" accesskey="1" title="">Inloggen</a></li>
        </ul>
</div>
<div id="three-column" class="container">
<p> <?php echo $contents ?> </p>
</div>
<div id="page" class="container">
	<div id="content">
		<div class="title">
			<h2>Welkom <span class="byline">op onze site</span></h2>
		</div>
		<a href="#" class="image image-full"><img src=<?php echo base_url()?>style/images/OPA1.jpg alt="" /></a>
		<p>Deze groep leerlingen die elke vrijdagmiddag bij elkaar komt, is verantwoordelijk voor de sketch- & muziekavond en de vastenactieshow. Hierbij is een combinatie van creativiteit, techniek en inzet nodig, en deze unieke combinatie resulteert in humoristische filmpjes. Verder verzorgt OPA de videoregistratie en montage van verschillende activiteiten op school, alsmede externe evenementen zoals de museumnacht en festivals. </p>
	</div>
	<div id="sidebar">
		<div id="fbox3">
		<h2 class="title">Social</h2>
		<ul class="style1">
			<li class="first"><a href="#">Email</a></li>
			<li><a href="#">Facebook</a></li>
			<li><a href="#">Youtube</a></li>
			<li><a href="#">Google +</a></li>
		</ul>
		</div>
	</div>
</div>
<div id="copyright" class="container">
	<p>Copyright (c) 2013 OPASchondeln.nl. All rights reserved. | Code by Joris Veens | Text by Sanne Telder</a>. | Dank aan Roel</p>
</div>
</body>
</html>
