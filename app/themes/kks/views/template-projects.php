<?php // Template Name: Projekt ?>

@layout('projects layout-2')
@module('doctype')
@module('head')

{{{ $projects = Projects\Projects::get_posts() }}}

<div id="main">
  <section id="projects" class="list">
    <div class="content-1">
      <header>
				<h1>{{ the_title() }}</h1>
			</header>

      <p>{{the_field('description')}}</p>
    </div>

    <div class="content-2">
      @foreach($projects as $project)
        @module('project')
      @endforeach
    </div>
  </section>

  <div class="content-3">
    @module('projects-filter')
    @module('projects-tags')
  </div>
</div>

@module('footer')
