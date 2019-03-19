<?php
/**
* Comments form and comment feature
*/
?>
<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die (esc_html_e('Please do not load this page directly. Thanks!','shopline'));

if ( post_password_required() ) { ?>
<p class="nocomments"><?php esc_html_e('This post is password protected. Enter the password to view comments.','shopline'); ?></p>
<?php return; } ?>

<div id="commentsbox">
 <?php if ( have_comments() ) : ?>
              <div class="post-info" id="comments" >
                <h2> <?php comments_number(__('No Responses', 'shopline'), __('Comments...', 'shopline'),  __('% Responses', 'shopline') ); ?></h2>
              </div>
              <ol class="commentlist">
              <?php wp_list_comments(); ?>
              </ol>
              <div class="comment-nav">
          <div class="alignleft">
               <?php previous_comments_link(); ?>
          </div>
          <div class="alignright">
               <?php next_comments_link(); ?>
          </div>
     </div>
     <?php else : // this is displayed if there are no comments so far ?>
    <?php if (comments_open()) : ?>
            <!-- If comments are open, but there are no comments. -->
        <?php else : // comments are closed  ?>
            <!-- If comments are closed. -->
            <p class="nocomments"><?php esc_html_e('Comments are closed.','shopline');?></p>
    <?php endif; ?>
<?php endif; ?>     
            <?php if (comments_open()) : ?>
              
              <div id="comment-form">
                 <?php comment_form(); ?>
              </div>
<?php endif; ?>
 </div>