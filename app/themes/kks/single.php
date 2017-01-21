{{{
  $news_id = Core\Frontend::get_id_by_template('news');
  $picture_url = wp_get_attachment_image_src(get_field('picture', $post->ID), 'calls')[0];
}}}

@layout('news layout-3')
@module('doctype')
@module('head')

<div id="main">
  <p class="icon back">
    <a href="{{ get_permalink($news_id) }}">{{ pll__('go_back') }} {{ get_the_title($news_id) }}</a>
  </p>

	<div class="content-1">
    @module('submenu')
	</div>

  <section id="news">
		<div class="content-2 body">
      @if($picture_url)
        <img src="{{ $picture_url }}" alt="{{ the_title() }}" />
      @endif

      <header>
        <h1>{{ the_title() }}</h1>
        <time datetime="{{ date_i18n('Y-m-d', strtotime($post->post_date)) }}">
          <span>{{ date_i18n('j', strtotime($post->post_date)) }}</span>
          <span>{{ date_i18n('F', strtotime($post->post_date)) }}</span>
          <span>{{ date_i18n('Y', strtotime($post->post_date)) }}</span>

          {{ Core\Frontend::categories($post->ID) }}
        </time>
      </header>

			{{ apply_filters( 'the_content', $post->post_content ) }}
			@module('block-share')
		</div>

    <div class="content-3">
      @module('block-related')
    </div>
	</section>
</div>

@module('footer')
