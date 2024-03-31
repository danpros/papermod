<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<div class="profile">
	<div class="profile_inner">
		<img src="<?php echo theme_path();?>img/avatar.png" height="150" width="150" alt="<?php echo $static->title;?>">
		<h1><?php echo $static->title;?></h1>
		<?php if (authorized($static)):?><a href="<?php echo site_url();?>front/edit?destination=front"><?php echo i18n('edit');?></a><?php endif;?>
		<div class="profile_content"><?php echo $static->body;?></div>
        <div class="social-icons">
			<?php echo social();?>
		</div>
		<div class="terms-tags"><?php echo category_list();?></div>
	</div>
</div>