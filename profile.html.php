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
            <?php echo social();?>
		</div>
    </footer>
</article>

<?php foreach ($posts as $post):?>
<?php $img = get_image($post->body);?>
<article class="post-entry">

<?php if (!empty($post->image)) {?>
	<figure class="entry-cover"><a href="<?php echo $post->url;?>"><img title="<?php echo $post->title;?>" src="<?php echo $post->image;?>" width="100%"></a></figure>
<?php } elseif (!empty($img) && empty($post->quote) && empty($post->video) && empty($post->audio)) { ?>
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
  <footer class="entry-footer"><span><?php echo format_date($post->date);?></span>&nbsp;·&nbsp;<?php echo $post->readTime;?> min&nbsp;·&nbsp;<a href="<?php echo $post->authorUrl;?>"><?php echo $post->authorName;?></a><?php if (disqus_count()):?>&nbsp;·&nbsp;<a href="<?php echo $post->url ?>#disqus_thread"> <?php echo i18n('Comments');?></a><?php endif;?><?php if (facebook()):?><a href="<?php echo $post->url ?>#comments"><span><fb:comments-count href=<?php echo $post->url ?>></fb:comments-count> <?php echo i18n('Comments');?></span></a><?php endif;?><?php if(authorized($post)):?></a>&nbsp;·&nbsp;<a href="<?php echo $post->url;?>/edit?destination=post"><?php echo i18n('edit');?></a><?php endif;?></footer>
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
