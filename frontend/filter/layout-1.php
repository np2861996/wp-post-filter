<?php
/**
 * Template for Simple Post Filter Loop - Layout-1
 *
* @package Simple_Post_Filter
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post; ?>

<div class="wppf-post-grid">
	<div class="wppf-post-grid-content <?php if ( !has_post_thumbnail() ) { echo esc_html('no-thumb-image'); } ?>">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="wppf-post-image-bg" style="<?php echo esc_attr($height_css); ?>">
				<a href="<?php echo esc_url($post_link); ?>">
					<img src="<?php echo esc_url($post_featured_image); ?>" alt="<?php the_title(); ?>" />
				</a>
			</div>
		<?php } ?>
		<h2 class="wppf-post-title">
			<a href="<?php echo esc_url($post_link); ?>"><?php the_title(); ?></a>
		</h2>

		<?php if($showCategory == "true" && $cate_name !='') { ?>
		<div class="wppf-post-categories"><?php echo wp_kses_post($cate_name); ?></div>
		<?php }
		if($showDate == "true" || $showAuthor == 'true' || $show_comments =="true") { ?>
			<div class="wppf-post-date">
				<?php if($showAuthor == 'true') { ?>
					<span class="wppf-user-img"><img src="<?php echo esc_url(WPPF_URL); ?>assets/images/user.svg" alt=""> <?php the_author(); ?></span>
				<?php } ?>
				<?php echo ($showAuthor == 'true' && $showDate == 'true') ? esc_html('&nbsp;') : '' ?>
				<?php if($showDate == "true") { ?>
					<span class="wppf-time"> <img src="<?php echo esc_url(WPPF_URL); ?>assets/images/calendar.svg" alt=""> <?php echo get_the_date(); ?> </span>
				<?php } ?>
				<?php echo ($showAuthor == 'true' && $showDate == 'true' && $show_comments == 'true') ? esc_html('&nbsp;') : '' ?>
				<?php if(!empty($comments) && $show_comments == 'true') { ?>
					<span class="wppf-post-comments">
						<img src="<?php echo esc_url(WPPF_URL); ?>assets/images/comment-bubble.svg" alt="" />
						<a href="<?php the_permalink(); ?>#comments"><?php echo esc_attr($comments).' '.esc_attr($reply);  ?></a>
					</span>
				<?php } ?>
			</div>
		<?php } 
		if($showContent == "true") { ?>
			<div class="wppf-post-content">
				<div class="wppf-post-short-content"><?php echo wppf_get_post_excerpt( $post->ID, get_the_content(), $words_limit, $content_tail ); ?></div>
				<?php if($show_read_more == 'true') { ?>
					<a href="<?php echo esc_attr($post_link); ?>" class="readmorebtn"><?php _e( 'Read More', 'wp-post-filter' ); ?></a>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>