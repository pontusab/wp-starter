<?php $participants = Projects\Projects::get_participants($post->ID); ?>

<?php if($participants): ?>
	<section class="list project-participants">
		<header>
			<h2><?php echo pll__('participants'); ?></h2>
		</header>

		<?php foreach($participants as $participant): ?>

			<?php $title = get_field('title', $participant->ID);
				$avatar_url = wp_get_attachment_image_src(get_field('avatar', $participant->ID), 'researchers-small')[0];; ?>

			<article class="person">
				<img src="<?php echo $avatar_url ? $avatar_url : '/img/avatar.svg'; ?>" width="72" height="72" alt="<?php echo $participant->post_title; ?>">

				<header>
					<h2>
						<a href="<?php echo get_permalink($participant->ID); ?>"><?php echo $participant->post_title; ?></a>
					</h2>
				</header>

				<?php if($title): ?>
	        <p class="title"><?php echo $title; ?></p>
	      <?php endif; ?>
			</article>
		<?php endforeach; ?>

	</section>
<?php endif; ?>
