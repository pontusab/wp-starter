<?php // Template Name: Nyheter ?>

@layout('newslist layout-3')
@module('doctype')
@module('head')

{{{
  $category = isset($_GET['category']) ? $_GET['category'] : false;
  $year = isset($_GET['y']) ? $_GET['y'] : date('Y');
  $args = ['posts_per_page' => -1];

  if ($category) {
    $args['tax_query'] = [
      [
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $category,
      ]
    ];
  } else {
    $args['date_query'] = [['year' => $year]];
  }

  $articles = new WP_Query($args)
}}}

<div id="main">
  <div class="content-1">
    @module('submenu')
  </div>

  <div class="content-2">
    <section id="news" class="list">
      <header>
				<h1>{{ the_title() }}</h1>
			</header>

      @if($articles->have_posts())
        @foreach( $articles->posts as $article )
          @module('news')
        @endforeach
      @endif
    </section>
  </div>

  <div class="content-3">
    @module('news-filter')
    @module('news-tags')
  </div>
</div>

@module('footer')
