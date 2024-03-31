<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<article class="post-single">
	<header class="post-header">
		<div class="breadcrumbs"><?php echo $breadcrumb;?></div>
		<h1 class="post-title entry-hint-parent"><?php echo $static->title;?></h1>
		<?php if (authorized($static)):?><a href="<?php echo $static->url;?>/edit?destination=front"><?php echo i18n('edit');?></a><?php endif;?>
	</header> 

	<div class="post-content" id="post-content">
		<?php echo $static->body;?>
	</div>
	
<footer class="post-footer">
	<nav class="paginav">
	<?php if (!empty($next)): ?>
	  <a class="prev" href="<?php echo $next['url'];?>">
		<span class="title">« <?php echo i18n('prev');?></span>
		<br>
		<span><?php echo $next['title'];?></span>
	  </a>
	  <?php endif;?>
	<?php if (!empty($prev)): ?>
	  <a class="next" href="<?php echo $prev['url'];?>">
		<span class="title"><?php echo i18n('next');?> »</span>
		<br>
		<span><?php echo $prev['title'];?></span>
	  </a>
	  <?php endif;?>
	</nav>
</footer>	
	
</article>