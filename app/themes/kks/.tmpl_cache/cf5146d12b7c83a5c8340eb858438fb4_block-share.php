<?php $actual_link = Core\Frontend::current_url(); ?>

<script>
  $(document).ready(function() {
    $('.share li a').click(function(e) {
      if($(this).parent().attr('data-service') !== 'email') {
        e.preventDefault();
        var url = $(this).attr('href');
        window.open(url, '', 'toolbar=0, status=0, width=450, height=250');
      }
    });
  });
</script>

<section class="share">
	<header>
  	<h2><?php echo pll__('share_title'); ?></h2>
	</header>
	<ul>
		<li data-service="facebook">
      <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $actual_link; ?>" rel="external">Facebook</a>
    </li>
		<li data-service="twitter">
      <a href="https://twitter.com/intent/tweet?url=<?php echo $actual_link; ?>" rel="external">Twitter</a>
    </li>
		<li data-service="linkedin">
      <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $actual_link; ?>" rel="external">LinkedIn</a>
    </li>
		<li data-service="email">
      <a href="mailto:?body=<?php echo $actual_link; ?>">Email</a>
    </li>
	</ul>
</section>
