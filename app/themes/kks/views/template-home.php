<?php // Template Name: Startsida ?>

@layout('start layout-1')
@module('doctype')
@module('head')

@module('hero')

<div id="main">
  <div class="content-1">
    @module('latest-seminars')
  </div>

  <div class="content-2">
    @module('latest-news')
  </div>

  <div class="content-3">
    @module('profile')
    @module('register')
  </div>
</div>

@module('owners')
@module('footer')
