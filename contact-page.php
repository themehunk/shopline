<?php
/**
* Template Name:Contact Page Template
*/
get_header();
$contactus_shortcode = get_theme_mod('contact_shrcd','[lead-form form-id=1 title=Contact Us]');
$contact_tel = get_theme_mod('contact_tel');
$contact_add = get_theme_mod('contact_add');
$contact_time = get_theme_mod('contact_time');

if( shortcode_exists( 'themehunk-customizer-header' ) ){
	do_shortcode('[themehunk-customizer-header header="top"]');
} else { ?>
<div class="page-head parallax image">
  <div class="page-head-image default">
  </div>
</div>
<?php }
$layout = shopline_get_layout();?>
<div class="clearfix"></div>
<div id="page" class="contact no-sidebar">
	<div class="content-wrapper">
		<div class="content">
			<?php if (have_posts()) : while (have_posts()) : the_post();?>

					<?php if(!shortcode_exists( 'themehunk-customizer-header' ) ):
	         			 the_title('<h1 class="title overtext">','</h1>'); 
   			 		endif; ?>
			<div class="page-description">
				<?php the_content(); ?>
				<div class="contact-wrap">
					<ul class="contact-info-wrap">
						<?php if($contact_tel!=''){?>
						<li class="tel">
							<div class="contact-icon">
								<a href="tel:<?php echo esc_attr($contact_tel); ?>">
									<i class="fa fa-mobile" aria-hidden="true"></i>
								</a>
							</div>
							<div class="contact-info">
								<a href="tel:<?php echo esc_attr($contact_tel); ?>"><?php echo esc_html($contact_tel);?></a>
							</div>
						</li>
						<?php } ?>
						<?php if($contact_add!=''){?>
						<li class="address">
							<div class="contact-icon">
								
								<i class="fa fa-home" aria-hidden="true"></i>
								
							</div>
							<div class="contact-info">
								<p><?php echo esc_html($contact_add);?></p>
							</div>
						</li>
						<?php } ?>
						<?php if($contact_time!=''){?>
						<li class="email">
							<div class="contact-icon">
								
								<i class="fas fa-clock" aria-hidden="true"></i>
								
							</div>
							<div class="contact-info">
								<p><?php echo esc_html($contact_time);?></p>
							</div>
						</li>
						<?php } ?>
					</ul>
					<div class="contact-form">
						<?php
						if( shortcode_exists( 'lead-form' ) ){
						 echo do_shortcode($contactus_shortcode);
						} else { ?>
						<h3><?php esc_html_e('Activate Lead Form Builder Plugin','shopline'); ?></h3>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php
			endwhile;
			endif;
			?>
		</div>
	</div>
</div>
<?php get_footer(); 