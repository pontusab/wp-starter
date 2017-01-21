<?php // Template Name: Om oss ?>

@layout('about layout-3')
@module('doctype')
@module('head')

{{{ $coworkers = Coworkers\Coworkers::get_posts('managment') }}}

<div id="main">
  <div class="content-1">
    @module('submenu')
  </div>

  <div class="content-2">
    <article class="body">
      <header>
        <h1>{{ the_title() }}</h1>
      </header>

      {{ apply_filters( 'the_content', $post->post_content ) }}

      <section class="list">
        <header>
          <h2>{{pll__('management_list')}}</h2>
        </header>

        @if($coworkers)
          @foreach($coworkers as $coworker)
            @module('person')
          @endforeach
        @endif

      </section>
    </article>
  </div>
</div>

@module('footer')
