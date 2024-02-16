<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<article class="first-entry home-info">
    <header class="entry-header">
		<div class="breadcrumbs"><?php echo $breadcrumb;?></div>
        <h1><?php echo $author->name;?> <a href="<?php echo $author->url;?>/feed"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" height="23">
        <path d="M4 11a9 9 0 0 1 9 9"></path>
        <path d="M4 4a16 16 0 0 1 16 16"></path>
        <circle cx="5" cy="19" r="1"></circle>
      </svg></a></h1>
    </header>
    <div class="entry-content">
		<?php echo $author->about;?>
    </div>
    <footer class="entry-footer">
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
    </footer>
</article>

<?php foreach ($posts as $post):?>
<?php $img = get_image($post->body);?>
<article class="post-entry">

<?php if (!empty($post->image)) {?>
	<figure class="entry-cover"><a href="<?php echo $post->url;?>"><img title="<?php echo $post->title;?>" src="<?php echo $post->image;?>" width="100%"></a></figure>
<?php } elseif (!empty($img)) {?>
	<figure class="entry-cover"><a href="<?php echo $post->url;?>"><img title="<?php echo $post->title;?>" src="<?php echo $img;?>" width="100%"></a></figure>
<?php } ?>

<?php if(!empty($post->video)):?>
	<iframe width="100%" height="315px" class="embed-responsive-item media-wrapper" src="https://www.youtube.com/embed/<?php echo get_video_id($post->video); ?>" frameborder="0" allowfullscreen></iframe>
<?php endif;?>
<?php if(!empty($post->audio)):?>
	<iframe width="100%" height="200px" class="embed-responsive-item media-wrapper" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $post->audio;?>&amp;auto_play=false&amp;visual=true"></iframe>
<?php endif;?>

<?php if(!empty($post->quote)):?>
	<div class="post-content">
		<blockquote class="quote" style="margin-top:0;"><?php echo $post->quote ?></blockquote>
	</div>
<?php endif;?>

  <header class="entry-header">
    <?php if(!empty($post->link)) { ?>
		<h2 class="entry-hint-parent"><a target="_blank" href="<?php echo $post->link;?>"><?php echo $post->title;?></a> <svg fill="none" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" width="20"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"></path><path d="M15 3h6v6"></path><path d="M10 14L21 3"></path></svg>
		</h2>
	<?php } else {?>
		<h2 class="entry-hint-parent"><a href="<?php echo $post->url;?>"><?php echo $post->title;?></a></h2>
	<?php } ?>
  </header>
  <div class="entry-content">
    <p><?php echo $post->description;?> [...]</p>
  </div>
  <footer class="entry-footer"><span><?php echo format_date($post->date);?></span>&nbsp;·&nbsp;<?php echo $post->readTime;?> min&nbsp;·&nbsp;<a href="<?php echo $post->authorUrl;?>"><?php echo $post->authorName;?></a><?php if (disqus_count()):?>&nbsp;·&nbsp;<a href="<?php echo $post->url ?>#disqus_thread"> <?php echo i18n('Comments');?></a><?php endif;?><?php if (facebook()):?><a href="<?php echo $post->url ?>#comments"><span><fb:comments-count href=<?php echo $post->url ?>></fb:comments-count> <?php echo i18n('Comments');?></span></a><?php endif;?><?php if(login()):?></a>&nbsp;·&nbsp;<a href="<?php echo $post->url;?>/edit?destination=post"><?php echo i18n('edit');?></a><?php endif;?></footer>
</article>
<?php endforeach;?>

<footer class="page-footer">
<?php if (!empty($pagination['prev']) || !empty($pagination['next'])): ?>
	<nav class="pagination">
        <?php if (!empty($pagination['prev'])): ?>
            <a href="?page=<?php echo $page - 1 ?>" class="prev"s rel="prev">« <?php echo i18n('Newer'); ?></a>
        <?php endif; ?>
        <?php if (!empty($pagination['next'])): ?>
            <a href="?page=<?php echo $page + 1 ?>" class="next" rel="next"><?php echo i18n('Older'); ?> »</a>
        <?php endif; ?>
	</nav>
<?php endif;?>
</footer>
<?php if (disqus_count()): ?>
    <?php echo disqus_count() ?>
<?php endif; ?>