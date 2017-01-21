<?php // Template Name: Inställningar ?>

{{ acf_form_head() }}
@layout('settings layout-4')
@module('doctype')
@module('head')

<div id="main">
  <section id="profile">
    <div class="content-1">
      @module('profilemenu')
      @module('researcher-profile')
    </div>

    <div class="content-2">
      @module('settings-updated')
      @module('settings-form')
    </div>
  </section>
</div>

@module('footer')
