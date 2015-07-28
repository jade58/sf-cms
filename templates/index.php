<?php
require_once 'system/auth.php';
require_once 'system/registration.php';
?>

<html> 
<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Multipress - Responsive Multipurpose HTML5 Template">
	<meta name="author" content="">

	<title><?php echo $site_title; ?></title>

	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicons -->
	<link rel="shortcut icon" href="templates/img/favicon.ico">
	<link rel="apple-touch-icon" href="http://premiumlayers.com/demos/vcard/img/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="http://premiumlayers.com/demos/vcard/img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="http://premiumlayers.com/demos/vcard/img/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="http://premiumlayers.com/demos/vcard/img/apple-touch-icon-144x144.png">

	<!-- Google Webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700,800,700italic,600italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Neuton:400,200,300' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
	<script src="/js/libs/respond.min.js"></script>
	<![endif]-->

	<!-- Bootstrap Core CSS -->
	<link href="templates/css/bootstrap.css" rel="stylesheet">

	<!-- Theme Styles CSS-->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="templates/css/style.css" >
	<link rel="stylesheet" href="templates/css/flexslider.css"/>
	<link rel="stylesheet" href="templates/css/nivo-lightbox.css" />
	<link rel="stylesheet" href="templates/templates/images/themes/default/default.css" />
	<link rel="stylesheet" href="templates/css/animate.css" />

	<!--[if lt IE 9]>
	<script src="/js/libs/html5.js"></script>
	<![endif]-->

	<!-- Style Switch -->
	<link rel="stylesheet" type="text/css" href="templates/css/colors/yellow-black.css" title="yellow" media="screen" />

</head>
<body>

	<!-- LOADING MASK -->

	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container no-padding">
			<div class="row">
				<div class="col-md-3 l-content">
					<div class="profile-pic">
						<div class="pic-bg"></div>
						<div class="loginbutton">
							<?php if(!isset($_COOKIE['token'])){ ?>
							  <center><a href="index.php?page=registration" class="knopka">Зарегистрироваться</a></center>
							  <center><div class="exit"><font size="3pt">Или <a href="<?php echo $auth_url; ?>"><ins>войти</ins></a></font></div></center>
						    <?php } else {?>
						      <center><a href="<?php echo $auth_url; ?>" class="knopka">Купить прогнозы</a></center>
						      <center><div class="exit">Здравствуй, <?php echo $user_name; ?> | <a href="/">Выйти</a></div></center>
						    <?php } ?>
						</div>
					</div>
					<nav>
						<ul class="navigation">
							<li><a href="index.php?page=main">Главная</a></li>
							<li><a href="index.php?page=bet">Статистика</a></li>
							<li><a href="index.php?page=answer">Частые вопросы</a></li>
							<li><a href="index.php?page=guar">Гарантии</a></li>
						</ul>
					</nav>
				</div>
				<div class="col-md-9 r-content">
					<div class="flexslider">
						<div class="slides">
							<?php include 'templates/'.$curent_page; ?>
						</div>
					</div>

					<!-- FOOTER -->
					<footer>
						<div class="row">
							<div class="col-md-7">
								<p>&copy; 2015 RG. All Rights Reserved | Powered by BetCms</p>
							</div>
						</div>
					</footer>
				</div>
			</div>
		</div>
	</div>
	<!-- MAIN CONTENT -->

	<!-- JavaScript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="templates/js/bootstrap.js"></script>

	<script src="templates/js/jquery.easing.js"></script>
	<script src="templates/js/jquery.mixitup.min.js"></script>
	<script src="templates/js/nivo-lightbox.min.js"></script>

	<script src="templates/js/main.js"></script>
	<script src="templates/js/contact.js"></script>

	<script src="templates/js/gmaps.js"></script>


</body>
</html>
