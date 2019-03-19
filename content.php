<?php
/**
* The default template for displaying content
*/
?>
<?php if (is_single()) :?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="clearfix"></div>
  <div class="blog-single-content">
    <figure class="post-content">
          <?php if(!shortcode_exists( 'themehunk-customizer-header' ) ): ?>
      <h1 class="title overtext"> <?php the_title(); ?> </h1>
    <?php endif; ?>
      <div class="fig-img">
        <div class="post-caption">
          <span class="post-date">
            <i class="fas fa-clock" aria-hidden="true"></i><span><?php echo get_the_time('M, d, Y') ?> </span>
          </span>
          <span class="post-cat"><span class="separator"><?php echo shopline_separator(); ?></span><i class="fas fa-link" aria-hidden="true"></i><?php the_category(' ,'); ?></span>
          <span class="post-author"><span class="separator"><?php echo shopline_separator(); ?></span>
          <i class="fas fa-user" aria-hidden="true"></i><?php the_author_posts_link(); ?>
        </span>
      </div>
    </div>
    <?php the_content(); ?>
    <div class="paginate">
      <span class="post-previous"><?php previous_post_link('%link'); ?></span>
      <span class="post-next"><?php next_post_link('%link'); ?></span>
    </div>
    <div class="tagcloud"><?php echo get_the_tag_list();
      ?>
    </div>
    <?php
    wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'shopline' ) . '</span>',
  'after'       => '</div>',
  'link_before' => '<span>',
  'link_after'  => '</span>',
  'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'shopline' ) . ' </span>%',
  'separator'   => '<span class="screen-reader-text">, </span>',
  ) );
  ?>
</figure>
</div>
</article>
<?php endif; ?>