<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php wp_title(''); ?></title>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
	<!-- START: Grid-Layout -->
		<div class="grid-container">

		<header class="header" role="banner">
			<div class="inner">

				<h1 id="logo" class="h1"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></h1>

				<button class="hamburger hamburger--spin" type="button">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>

				<nav id="navMenu" role="navigation">
					<?php
						wp_nav_menu(
							array(
								'menu' => 'header-menu',
								'container' => 'ul'
							)
						);
					?>
				</nav>

			</div><!-- /.inner -->
		</header>