<?php // Template Name: Utlysningar ?>

@layout('calls layout-2')
@module('doctype')
@module('head')

{{{ $calls = Calls\Calls::get_posts() }}}

<div id="main">
  <section id="calls" class="list">
    <div class="content-1">
      <header>
				<h1>{{ the_title() }}</h1>
			</header>

      <p>{{ the_field('description') }}</p>
    </div>

    <div class="content-2">
      @foreach($calls as $call)
        @module('call')
      @endforeach
    </div>
  </section>

  <div class="content-3">
    @module('calls-filter')
    @module('calls-tags')
  </div>
</div>

@module('footer')
