<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<article class="post-single">
<header class="post-header">
	<div class="breadcrumbs"><?php echo $breadcrumb;?></div>
	<?php if(!empty($post->link)) { ?>
	<a href="<?php echo $post->link;?>" target="_blank"><h1 class="post-title entry-hint-parent"><?php echo $post->title;?> <svg fill="none" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" width="20"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"></path><path d="M15 3h6v6"></path><path d="M10 14L21 3"></path></svg></h1></a>
	<?php } else {?>
	<h1 class="post-title entry-hint-parent"><?php echo $post->title;?></h1>
	<?php } ?>
	<div class="post-meta"><span><?php echo format_date($post->date);?></span>&nbsp;·&nbsp;<?php echo $post->readTime;?> min&nbsp;·&nbsp;<a href="<?php echo $post->authorUrl;?>"><?php echo $post->authorName;?></a><?php if (disqus_count()):?>&nbsp;·&nbsp;<a href="<?php echo $post->url ?>#disqus_thread"> <?php echo i18n('Comments');?></a><?php endif;?><?php if (facebook()):?><a href="<?php echo $post->url ?>#comments"><span><fb:comments-count href=<?php echo $post->url ?>></fb:comments-count> <?php echo i18n('Comments');?></span></a><?php endif;?><?php if(authorized($post)):?>&nbsp;·&nbsp;<a href="<?php echo $post->url;?>/edit?destination=post"><?php echo i18n('edit');?></a><?php endif;?>

	</div>
</header> 

<div class="post-content" id="post-content">
	
	<?php if(!empty($post->image)):?>
		<img class="media-wrapper" title="<?php echo $post->title;?>" src="<?php echo $post->image;?>"/>
	<?php endif;?>
	<?php if(!empty($post->video)):?>
		<iframe width="100%" height="315px" class="embed-responsive-item media-wrapper" src="https://www.youtube.com/embed/<?php echo get_video_id($post->video); ?>" frameborder="0" allowfullscreen></iframe>
	<?php endif;?>
	<?php if(!empty($post->audio)):?>
		<iframe width="100%" height="200px" class="embed-responsive-item media-wrapper" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $post->audio;?>&amp;auto_play=false&amp;visual=true"></iframe>
	<?php endif;?>
	<?php if(!empty($post->quote)):?>
		<blockquote class="quote"><?php echo $post->quote ?></blockquote>
	<?php endif;?>	
	<?php echo $post->body;?>
	<div class="related-posts">
	<strong><?php echo i18n('related_posts');?></strong>
	<?php echo get_related($post->related);?>
	</div>
</div>

<footer class="post-footer">
	<div class="post-tags">
		<?php echo $post->tag;?>
	</div>
	
    <?php if (disqus()): ?>
        <?php echo disqus($p->title, $p->url) ?>
    <?php endif; ?>
    
    <?php if (disqus_count()): ?>
        <?php echo disqus_count() ?>
    <?php endif; ?>
    
    <?php if (facebook() || disqus()): ?>
        <div class="comments-area" id="comments">
        
            <?php if (facebook()): ?>
                <div class="fb-comments" data-href="<?php echo $post->url ?>" data-numposts="<?php echo config('fb.num') ?>" data-colorscheme="<?php echo config('fb.color') ?>"></div>
            <?php endif; ?>
            
            <?php if (disqus()): ?>
                <div id="disqus_thread"></div>
            <?php endif; ?>
            
        </div>
    <?php endif; ?>		
		
	<nav class="paginav">
	<?php if (!empty($next)): ?>
	  <a class="prev" href="<?php echo $next['url'];?>">
		<span class="title">« <?php echo i18n('next_post');?></span>
		<br>
		<span><?php echo $next['title'];?></span>
	  </a>
	  <?php endif;?>
	<?php if (!empty($prev)): ?>
	  <a class="next" href="<?php echo $prev['url'];?>">
		<span class="title"><?php echo i18n('prev_post');?> »</span>
		<br>
		<span><?php echo $prev['title'];?></span>
	  </a>
	  <?php endif;?>
	</nav>

</footer>
</article>
    