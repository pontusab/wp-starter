<?php $contact_id = Core\Frontend::get_id_by_template('contact'); ?>

<header>
	<div>
		<h1>
			<a href="<?php echo get_bloginfo('url'); ?>" id="logo"><?php echo get_bloginfo('name'); ?></a>
		</h1>
		<ul class="links">
			<li>
				<a href="<?php echo get_permalink($contact_id); ?>"><?php echo get_the_title($contact_id); ?></a>
			</li>

			<?php echo Core\Frontend::language_switcher(); ?>
			<?php echo Core\Frontend::init()->user_menu(); ?>

		</ul>
	</div>

	<div id="bar">
		<div>
			<nav>
				<ul>
					<?php echo wp_list_pages([
						'depth' => 1,
						'title_li' => '',
						'walker' => new Core\Walker,
						'exclude' => Core\Frontend::get_posts_by_slug(true)
					]); ?>
			</ul>
		</nav>

		<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/search-form.php', get_defined_vars());?>
	</div>
	</div>
</header>
