<?php
	include ('arith.lib.php');
	require("config.txt");
	$ext = "php";
	$referredIp  = ARIHT_getipreelle();
    $db = mysql_connect ("wild.game.sql.free.fr", "wild.game", "ccarving");
	mysql_select_db('wild_game') or die('Could not select database');
    $referrerId= mysql_real_escape_string($_GET['referrerId'], $db); 
	 	
	if(strlen($referrerId) >0)
	{
		$query = "SELECT * FROM Contest WHERE  	referredIp='$referredIp' AND referrerId='$referrerId';";
		$resu = mysql_query($query) or die('Query failed: ' . mysql_error()); 
		$nbrows = mysql_num_rows ($resu);
		if ($nbrows <  1  ) 
		{
			$query = "insert into Contest values ('$referrerId', '$referredIp',NOW());"; 
			$resu = mysql_query($query) or die('Query failed: ' . mysql_error()); 
		}
	}	

	mysql_close ($db);
	
	echo "
	<html xmlns=\"http://www.w3.org/1999/xhtml\">
	<head>
<meta property=\"og:image\" content=\"http://wild.game.free.fr/logo.jpg\"/>
<meta property=\"og:title\" content=\"Wild Steel\"/>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' />
<link rel=\"stylesheet\" type=\"text/css\" href=\"share.css\" />
<link type=\"text/css\" rel=\"stylesheet\" media=\"only screen and (max-width: 600px)\" href=\"mobile.css\" />
<script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js\"></script>
<script src=\"share.js\"></script>
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\" />



		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
		<meta name=\"keywords\" content=\"Wild Steel,game ,indie, moto ,bike ,biker ,free-to-play ,free ,chopper ,race ,racing ,fun ,arcade ,trash ,deimos ,cartoon \">
		<meta name=\"description\" content=\"Free arcade chopper bike racing game\">
		<title>Wild Steel</title>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44422722-1', 'mutsu.fr');
  ga('send', 'pageview');

</script>

<div id=\"fb-root\"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = \"//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0\";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

		<style type=\"text/css\">
		<!--
		body {
			font-family: Helvetica, Verdana, Arial, sans-serif;
			background-color: black;
			color: grey;
			text-align: center;
		}
		a:link, a:visited {
			color: #999;
		}
		a:active, a:hover {
			color: #999;
		}
		p.header {
			font-size: small;
		}
		p.header span {
			font-weight: bold;
		}
		p.footer {
			font-size: x-small;
		}
		div.content {
			margin: auto;
			width: 960px;
		}
		div.missing {
			margin: auto;
			position: relative;
			top: 50%;
			width: 193px;
		}
		div.missing a {
			height: 63px;
			position: relative;
			top: -31px;
		}
		div.missing img {
			border-width: 0px;
		}
		div#unityPlayer {
			cursor: default;
			height: 600px;
			width: 960px;
		}
		-->
		</style>
	</head>
	<body>
<div id=\"fb-root\"></div>
<br>
<center><img src=\"marquee.jpg\" alt=\"Wild Steel\"></center> 
<iframe width=\"427\" height=\"240\" src=\"//www.youtube.com/embed/WOlYANBES6g?rel=0&autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>
<br>
<br>
	<u>	<button class=\"alpha\">Download</button></u> PC version (Zipped Setup File 230 MO)
<br>

<br>  <u>
<a href=\"http://wild.game.free.fr/WildPC.zip\" title=\"Latest PC version\">Mirror link</a></u> (Zip File 300 MO) 
<br>
<u>
<a href=\"http://canyon-carving.mutsu.fr/WildLinux.zip\" title=\"Latest Linux version\">Linux version</a> </u>(Zip file 310MO)
<br>
<u>
<a href=\"http://canyon-carving.mutsu.fr/WildMac.zip\" title=\"Latest Mac version\">Mac version</a> </u>(Zip file 310MO)
<br>
<u>
		<a href=\"http://wild.game.blog.free.fr\" title=\"Game blog\">Game blog</a>
	
</u>

<br>
<button class=\"press\">Press Folder</button>
<h1>Support this game with 4 Clicks</h1>
<div class=\"fb-like\" data-href=\"https://www.facebook.com/WildChopperGame\" data-layout=\"standard\" data-action=\"like\" data-show-faces=\"true\" data-share=\"true\"></div>
<br>
<br>
<div id=\"container\">
<ul id=\"actions\">
<button class=\"facebook\">Share</button>
<button class=\"twitter\">Tweet</button>
<button class=\"buy\">Full content</button>

</ul>
</div>
<br>
<br>
<br>
<br>
<div id=\"footer\"></div>

		<br>
		




</html>
"
;
	
?>
