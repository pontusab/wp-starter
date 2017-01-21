<?php // Template Name: Profil ?>
{{ acf_form_head() }}
@layout('profile layout-4')
@module('doctype')
@module('head')

<div id="main">
  <section id="profile">
    <div class="content-1">
      @module('profilemenu')
      @module('researcher-profile')
    </div>

    <div class="content-2">
      <article class="body">
        <header>
  				<h1 class="hyphenate">{{ the_title() }}</h1>
  			</header>
      </article>

      {{ Core\Profile::init()->form() }}
    </div>
  </section>
</div>

@module('footer')
