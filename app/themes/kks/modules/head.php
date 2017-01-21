<header>
	<div>
		<h1>
			<a href="{{get_bloginfo('url')}}" id="logo">{{ get_bloginfo('name') }}</a>
		</h1>
	</div>

	<div id="bar">
		<div>
			<nav>
				<ul>
					{{ wp_list_pages([
						'depth' => 1,
						'title_li' => '',
						'walker' => new Core\Walker,
					]) }}
			</ul>
		</nav>
	</div>
	</div>
</header>
