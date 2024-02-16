<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<article class="post-single">
	<header class="post-header">
		<div class="breadcrumbs"><?php echo $breadcrumb;?></div>
		<h1 class="post-title entry-hint-parent">Search results not found!</h1>
	</header> 

	<div class="post-content" id="post-content">
        <p>Please search again, or would you like to visit our <a href="<?php echo site_url() ?>">homepage</a> instead?</p>
        <?php echo search() ?>
	</div>
	
</article>