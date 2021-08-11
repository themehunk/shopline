<!-- Start the Loop. -->
<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>
<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>><figure class="post-content">
	<div class="fig-img">
		<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
		<a href="<?php esc_url(the_permalink()); ?>"><?php the_post_thumbnail('shopline-blog'); ?>
			<?php } ?>
		</a>
	</div>
	<div class="post-caption">
		<div class="post-date"><?php echo esc_html(get_the_time('M, d, Y')); ?></div>
		<div class="post-cat"><span class="separator"><?php echo shopline_separator(); ?></span><?php the_category(' / '); ?> </div>
	</div>
	<a href="<?php esc_url(the_permalink()); ?>"><h3><?php the_title();  ?></h3></a>
	<?php the_excerpt();?>
	<span class="read-more">
		<a href="<?php esc_url(the_permalink()); ?>"><?php esc_html_e('Read more','shopline');?></a>
	</span>
	<div class="post-comment"><?php shopline_comment_number(); ?></div>
</figure>
</li>
<?php endwhile;
shopline_pagination();
else: ?>
<div class="post">
<p>
	<?php esc_html_e('sorry no post matched your criteria!','shopline'); ?>
</p>
</div>
<?php endif; wp_reset_query(); ?>
<!--End post-->