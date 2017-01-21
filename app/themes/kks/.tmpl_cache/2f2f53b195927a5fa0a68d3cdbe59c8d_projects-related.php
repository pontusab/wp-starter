<?php $projects = Projects\Projects::related_projects($post->ID); ?>


<?php if($projects): ?>
<section class="list similar">
  <header>
    <h2><?php echo pll__('similar_projects'); ?></h2>
  </header>

  <?php foreach($projects as $project): ?>
    <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/project.php', get_defined_vars());?>
  <?php endforeach; ?>

</section>
<?php endif; ?>
