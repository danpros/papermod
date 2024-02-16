<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<div class="profile">
	<div class="profile_inner">
		<img src="<?php echo theme_path();?>img/avatar.png" alt="<?php echo $static->title;?>">
		<h1><?php echo $static->title;?></h1>
		<?php if (login()):?><a href="<?php echo site_url();?>front/edit?destination=front"><?php echo i18n('edit');?></a><?php endif;?>
		<div class="profile_content"><?php echo $static->body;?></div>
        <div class="social-icons">
			<?php if(!empty(config('social.github'))):?>
			<a href="<?php echo config('social.github');?>" target="_blank" title="Github profile">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
			</a>
			<?php endif;?>
			<?php if(!empty(config('social.twitter'))):?>
			<a href="<?php echo config('social.twitter');?>" target="_blank" title="Twitter profile">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path></svg>
			</a>
			<?php endif;?>
			<?php if(!empty(config('social.facebook'))):?>
			<a href="<?php echo config('social.facebook');?>" target="_blank" title="Facebook profile">
				<svg version="1.1" viewBox="0 0 512 512" xml:space="preserve" height="30px" width="30px" fill="currentColor">
                <path d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-106.468,0l0,-192.915l66.6,0l12.672,-82.621l-79.272,0l0,-53.617c0,-22.603 11.073,-44.636 46.58,-44.636l36.042,0l0,-70.34c0,0 -32.71,-5.582 -63.982,-5.582c-65.288,0 -107.96,39.569 -107.96,111.204l0,62.971l-72.573,0l0,82.621l72.573,0l0,192.915l-191.104,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Z"></path>
            </svg>
			</a>
			<?php endif;?>
			<a href="<?php echo site_url();?>feed/rss" title="RSS">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" height="23"><path d="M4 11a9 9 0 0 1 9 9"></path><path d="M4 4a16 16 0 0 1 16 16"></path><circle cx="5" cy="19" r="1"></circle></svg>
			</a>
		</div>
		<div class="terms-tags"><?php echo category_list();?></div>
	</div>
</div>