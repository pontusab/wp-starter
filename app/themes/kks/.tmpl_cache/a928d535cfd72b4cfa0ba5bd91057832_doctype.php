<!DOCTYPE html>
<html <?php echo language_attributes(); ?> class="no-js">
	<head>
		<script>document.documentElement.className = document.documentElement.className.replace(/(\s|^)no-js(\s|$)/, '$1js$2');</script>
		<meta charset="UTF-8" />
		<title><?php echo get_bloginfo( 'name' ); ?> | <?php echo the_title(); ?></title>
		<?php if( is_front_page() ): ?>
			<meta name="description" content="<?php echo get_option('blogdescription'); ?>">
			<meta property="og:description" content="<?php echo get_option('blogdescription'); ?>" />
		<?php elseif( is_singular() ): ?>
			<meta name="description" content="<?php echo get_field('description'); ?>">
			<meta property="og:description" content="<?php echo get_field('description'); ?>" />
		<?php endif; ?>
		<meta name="viewport" content="initial-scale=1.0, width=device-width" />
		<meta property="og:url" content="<?php echo get_permalink( $post->ID ); ?>" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="<?php echo get_bloginfo( 'name' ); ?> | <?php echo the_title(); ?>" />
		<meta property="og:image" content="https://www.kunskapsformedlingen.se/img/KF.png" />
		<link rel="shortcut icon" href="/favicon.ico" type="image/ico" />
		<link rel="stylesheet" href="/css/stylesheet.css?v=20160821" />
		<link rel="stylesheet" href="/css/app.css" />
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript" src="/js/jquery.breakpoint-min.js"></script>
		<script type="text/javascript" src="/js/scripts.js?v=20150128"></script>
		<script type="text/javascript" src="/js/hyphenate.js"></script>
		<script type="text/javascript" src="/js/modernizr.min.js"></script>
		<script type="text/javascript" src="/js/orientationchangefix.js"></script>
		<!--[if lt IE 9]>
			<link rel="stylesheet" href="/css/ie.css?v=20150128" />
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->
			<!--[if lte IE 9]>
			<link rel="stylesheet" href="/css/ie9.css?v=20150128" />
		<![endif]-->
		<?php echo wp_head(); ?>
	</head>
	<body class="<?php echo $layout; ?>">
