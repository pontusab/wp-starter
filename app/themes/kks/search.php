@layout('search layout-5')
@module('doctype')
@module('head')

{{{
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $count = 10;
  $results = new WP_Query([
    's' => get_search_query(),
    'paged' => $paged,
    'posts_per_page' => $count,
  ]);
}}}

<div id="main">
  <div class="content-1">
    <section class="search list">
			<header>
				<h1>{{ pll__('search') }}</h1>
			</header>

			@module('search-form')

      <p class="hits">{{ $results->found_posts }} {{ pll__('hits') }}</p>

      @if($results->have_posts())
        @foreach( $results->posts as $result )
          @module('search-result')
        @endforeach
      @endif

      {{ Core\Frontend::paging($results->found_posts, $paged, $count) }}
  </div>
</div>

@module('footer')
