<?php $news_id = Core\Frontend::get_id_by_template('news');
  $articles = get_posts([
    'posts_per_page' => 5,
  ]);; ?>

<section id="news" class="list block">
  <header>
    <h1><?php echo pll__('news'); ?></h1>
  </header>

  <?php foreach($articles as $article): ?>
    <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/article.php', get_defined_vars());?>
  <?php endforeach; ?>

  <p class="more">
    <a href="<?php echo get_permalink($news_id); ?>"><?php echo pll__('more_news'); ?></a>
  </p>
</section>
