<?php if($gridcol == '2') {
	$postgrid = "6";
} else if($gridcol == '3') {
	$postgrid = "4";
}  else if($gridcol == '4') {
	$postgrid = "3";
}  else if($gridcol == '5') {
	$postgrid = "c5";	
} else if ($gridcol == '1') {
	$postgrid = "12";
} else {
	$postgrid = "12";
} ?>
<div class="wppf-post-grid  wppf-medium-<?php echo $postgrid; ?> wppf-columns <?php echo esc_html($css_class); ?>">
	<div class="wppf-post-grid-content <?php if ( !has_post_thumbnail() ) { echo esc_html('no-thumb-image'); } ?>">
		<?php
		if ( has_post_thumbnail() ) { ?>
			<div class="wppf-post-image-bg" style="<?php echo esc_html($height_css); ?>">
				<a href="<?php echo esc_html($post_link); ?>">
					<img src="<?php echo esc_url($post_featured_image); ?>" alt="<?php the_title(); ?>" />
				</a>
			</div>
		<?php } 

if($showDate == "true" || $showAuthor == 'true' || $show_comments =="true") { ?>
	<div class="wppf-post-date">
		<?php if($showAuthor == 'true') { ?>
			<span class="wppf-user-img"><img src="<?php echo esc_url(WPPF_URL); ?>assets/images/user.svg" alt=""> <?php the_author(); ?></span>
		<?php } ?>
		<?php echo ($showAuthor == 'true' && $showDate == 'true') ? esc_html('&nbsp;') : '' ?>
		<?php if($showDate == "true") { ?>
			<span class="wppf-time"> <img src="<?php echo esc_html(WPPF_URL); ?>assets/images/calendar.svg" alt=""> <?php echo get_the_date(); ?> </span>
		<?php } ?>
		<?php echo ($showAuthor == 'true' && $showDate == 'true' && $show_comments == 'true') ? '&nbsp;' : '' ?>
		<?php if(!empty($comments) && $show_comments == 'true') { ?>
			<span class="wppf-post-comments">
				<img src="<?php echo esc_url(WPPF_URL); ?>assets/images/comment-bubble.svg" alt="" />
				<a href="<?php the_permalink(); ?>#comments"><?php echo esc_html($comments).' '.esc_html($reply);  ?></a>
			</span>
		<?php } ?>
	</div>

	<?php } ?>

	<?php if($showCategory == "true" && $cate_name !='') { ?>
			<div class="wppf-post-categories"><?php echo wp_kses_post($cate_name); ?></div>
		<?php } ?>

		<h2 class="wppf-post-title">
			<a href="<?php echo htmlspecialchars($post_link); ?>"><?php the_title(); ?></a>
		</h2>	
		
		<?php if($showContent == "true") { ?>
			<div class="wppf-post-content">
					<div class="wppf-post-short-content"><?php echo wppf_get_post_excerpt( $post->ID, get_the_content(), $words_limit, $content_tail ); ?></div>
					<?php if($show_read_more == 'true') { ?>
						<a href="<?php echo htmlspecialchars($post_link); ?>" class="readmorebtn"><?php _e( 'Read More', 'wp-post-filter' ); ?></a>
					<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>