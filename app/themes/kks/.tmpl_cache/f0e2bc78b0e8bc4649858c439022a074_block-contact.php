<?php $user = get_field('user', $post->ID); ?>

<?php if(isset($user['user_email'])): ?>
	<section class="block contact-info">
		<header>
			<h1><?php echo pll__('contact'); ?></h1>
		</header>

		<?php echo Researchers\Researchers::get_phones($post->ID); ?>

		<p><?php echo pll__('email'); ?>: <a href="mailto:<?php echo antispambot($user['user_email']); ?>"><?php echo strtolower($user['user_email']); ?></a></p>
	</section>
<?php endif; ?>
