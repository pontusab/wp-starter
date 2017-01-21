{{{ $contact_id = Core\Frontend::get_id_by_template('contact') }}}

<header>
	<div>
		<h1>
			<a href="{{get_bloginfo('url')}}" id="logo">{{ get_bloginfo('name') }}</a>
		</h1>
		<ul class="links">
			<li>
				<a href="{{get_permalink($contact_id)}}">{{ get_the_title($contact_id) }}</a>
			</li>

			{{ Core\Frontend::language_switcher()}}
			{{ Core\Frontend::init()->user_menu() }}

		</ul>
	</div>

	<div id="bar">
		<div>
			<nav>
				<ul>
					{{ wp_list_pages([
						'depth' => 1,
						'title_li' => '',
						'walker' => new Core\Walker,
						'exclude' => Core\Frontend::get_posts_by_slug(true)
					]) }}
			</ul>
		</nav>

		@module('search-form')
	</div>
	</div>
</header>
