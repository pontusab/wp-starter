<?php // Template Name: Registrera dig ?>

@layout('register layout-5')
@module('doctype')
@module('head')

<div id="main">
	<div class="content-1">
		<section class="register body">
			<header>
				<h1>{{ the_title() }}</h1>
			</header>

			{{ apply_filters( 'the_content', $post->post_content ) }}

      @module('register-form')
		</section>
	</div>
</div>

@module('footer')
