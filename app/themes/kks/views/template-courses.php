<?php // Template Name: Kurser ?>

@layout('courses layout-2')
@module('doctype')
@module('head')

{{{ $courses = Courses\Courses::get_posts() }}}

<div id="main">
  <section id="courses" class="list">
    <div class="content-1">
      <header>
				<h1>{{ the_title() }}</h1>
			</header>

      <p>{{the_field('description')}}</p>
    </div>

    <div class="content-2">
      @foreach( $courses as $course )
        @module('course')
      @endforeach
    </div>
  </section>

  <div class="content-3">
    @module('courses-filter')
    @module('courses-groups')
  </div>
</div>

@module('footer')
