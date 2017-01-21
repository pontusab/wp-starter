<header>
	<div class="logo">
		<h1>
			<a href="{{get_bloginfo('url')}}">{{ get_bloginfo('name') }}</a>
		</h1>
	</div>

	<nav>
		<ul>
			{{ wp_list_pages([
				'depth' => 1,
				'title_li' => '',
				'walker' => new Core\Walker,
			]) }}
		</ul>
	</nav>
</header>
