<?php // Template Name: Seminarier ?>

@layout('seminars layout-2')
@module('doctype')
@module('head')

{{{ $seminars = Seminars\Seminars::get_posts() }}}

<div id="main">
  <section id="seminars" class="list">
    <div class="content-1">
      <header>
				<h1>{{ the_title() }}</h1>
			</header>

      <p>{{the_field('description')}}</p>
    </div>

    <div class="content-2">
      @foreach( $seminars as $seminar )
        @module('seminar')
      @endforeach
    </div>
  </section>

  <div class="content-3">
    @module('seminars-filter')
    @module('quote')
  </div>
</div>

@module('footer')
