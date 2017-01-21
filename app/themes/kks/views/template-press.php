<?php // Template Name: Press ?>

@layout('press layout-3')
@module('doctype')
@module('head')

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

      <div class="logo-download">
				<img src="/img/logo-kf_ex.png" alt="Logo">
				<p>{{ pll__('print') }}:<a href="/app/uploads/2016/04/KF-logo_CMYK.eps">KF-logo_CMYK.eps</a></p>
				<p>{{ pll__('print') }}:<a href="/app/uploads/2016/04/KF-logo_PMS.eps">KF-logo_PMS.eps</a></p>
				<p>{{ pll__('web') }}:<a href="/app/uploads/2016/04/KF-logo_RGB.eps">KF-logo_RGB.eps</a></p>
			</div>
    </article>
  </div>

  <div class="content-3">
    @module('press-contact')
  </div>
</div>

@module('footer')
