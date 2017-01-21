<?php // Template Name: Forskare ?>

@layout('researchers layout-2')
@module('doctype')
@module('head')

{{{ $researchers = Researchers\Researchers::get_posts() }}}

<div id="main">
  <section id="researchers" class="list">
    <div class="content-1">
      <header>
				<h1>{{ the_title() }}</h1>
			</header>

      <p>{{the_field('description')}}</p>

      @module('register')
    </div>

    <div class="content-2" id="content-primary">
      {{ Researchers\Researchers::init()->letters_filter() }}

      @foreach($researchers as $researcher)
        @module('researcher')
      @endforeach
    </div>
  </section>

  <div class="content-3">
    @module('researchers-tags')
  </div>
</div>

@module('footer')
