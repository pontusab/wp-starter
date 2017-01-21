<?php $manager = get_field('manager'); ?>

<?php if($manager): ?>
	<?php $title = get_field('title', $manager->ID);
		$avatar_url = wp_get_attachment_image_src(get_field('avatar', $manager->ID), 'researchers-small')[0];
		$user = get_field('user', $manager->ID);; ?>

	<section class="list project-manager">
		<header>
			<h2><?php echo pll__('project_manager'); ?></h2>
		</header>

		<article class="person">
			<img src="<?php echo $avatar_url ? $avatar_url : '/img/avatar.svg'; ?>" width="72" height="72" alt="<?php echo $manager->post_title; ?>">

			<header>
				<h2>
					<a href="<?php echo get_permalink($manager->ID); ?>"><?php echo $manager->post_title; ?></a>
				</h2>
			</header>

			<?php if($title): ?>
        <p class="title"><?php echo $title; ?></p>
      <?php endif; ?>

			<p class="tel"><?php echo Researchers\Researchers::get_phones($manager->ID, false); ?></p>

			<?php if($user['user_email']): ?>
        <p class="email"><a href="mailto:<?php echo antispambot($user['user_email']); ?>"><?php echo strtolower($user['user_email']); ?></a></p>
      <?php endif; ?>
		</article>
	</section>
<?php endif; ?>
