<?php // Template Name: Partner ?>

@layout('partners layout-4')
@module('doctype')
@module('head')

{{{$partners = get_posts([
  'post_type' => 'programmes',
  'posts_per_page' => -1
])}}}

<div id="main">
  <section id="partners">
    <div class="content-1">
      <header>
				<h1>{{ the_title() }}</h1>
			</header>

      <p>{{get_field('description')}}</p>
    </div>

    <div class="content-2">
      @foreach($partners as $partner)
        @module('partner')
      @endforeach
    </div>
  </section>
</div>

@module('footer')
