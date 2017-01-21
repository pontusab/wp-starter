<!DOCTYPE html>
<html {{ language_attributes() }}>
	<head>
		<meta charset="UTF-8" />
		<title>{{ get_bloginfo( 'name' ) }} | {{ the_title() }}</title>
		<meta name="description" content="{{ get_option('blogdescription') }}">
		<meta name="viewport" content="initial-scale=1.0, width=device-width" />
		<link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/ico" />
		<link rel="stylesheet" href="/assets/css/app.css" />
		{{ wp_head() }}
	</head>
	<body class="{{ $layout }}">
