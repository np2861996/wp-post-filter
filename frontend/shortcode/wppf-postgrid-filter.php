<?php
/**
 * 'wppf_post_filter' Shortcode
 * 
 * @package Simple_Post_Filter
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Function to handle the 'wppf_post_filter' shortcode
 * 
 * @package Simple_Post_Filter
 * @since 1.0.0
 */
function wppf_postgrid_filter_shortcode( $atts, $content ) {

	// Shortcode Parameters
	extract(shortcode_atts(array(
		'cat_id' 				=> '',
		'include_cat_child'		=> 'true',
		'order'					=> 'DESC',
		'orderby'				=> 'date',
		'grid' 					=> 3,
		'media_size' 			=> 'large',
		'show_date' 			=> 'true',
		'show_category_name' 	=> 'true',
		'show_author' 			=> 'true',
		'image_height' 			=> '',
		'design'				=> 'layout-1',
		'content_words_limit' 	=> 20,
		'show_read_more'        => 'true',
		'content_tail'			=> '...',
		'cat_limit'				=> 0,
		'cat_order'				=> 'asc',
		'image_fit' 			=> 'true',
		'cat_orderby'			=> 'name',
		'exclude_cat'			=> array(),
		'show_comments'			=> 'true',
		'show_content' 			=> 'true',
		'all_filter_text'		=> '',
		'extra_class'			=> '',
		'className'				=> '',
		'align'					=> '',
	), $atts, 'wppf_post_filter'));

	$unique 			= wppf_get_unique();
	$shortcode_designs	= wppf_post_grid_filter_designs();
	$content_tail 		= html_entity_decode( $content_tail );
	$design 			= array_key_exists( trim($design)  , $shortcode_designs ) ? $design 	: 'layout-1';
	$limit				= ! empty( $limit ) 					? $limit 						: 15;
	$order 				= ( strtolower( $order ) == 'asc' ) 	? 'ASC' 						: 'DESC';
	$cat_order 			= ( strtolower( $cat_order ) == 'asc' ) ? 'ASC' 						: 'DESC';
	$orderby			= ! empty( $orderby ) 					? $orderby 						: 'date';
	$gridcol			= ! empty( $grid ) 						? $grid 						: 3;
	$cat_id				= ! empty( $cat_id )					? explode(',',$cat_id) 			: '';
	$words_limit 		= ! empty( $content_words_limit )		? $content_words_limit          : 20;
	$media_size 		= ! empty( $media_size )				? $media_size 	                : 'large'; //thumbnail, medium, large, full
	$cat_limit			= ! empty( $cat_limit ) 				? $cat_limit 					: 0;
	$cat_orderby		= ! empty($cat_orderby) 				? $cat_orderby 					: 'name';
	$exclude_cat 		= ! empty($exclude_cat)					? explode(',', $exclude_cat) 	: array();
	$all_filter_text 	= ! empty( $all_filter_text ) ? $all_filter_text : __('All', 'wp-post-filter');
	$image_height 		= ! empty( $image_height )           	? $image_height                 : '';
	$height_css 		= ( $image_height )						? 'height:'.$image_height.'px;' : '';
	$include_cat_child	= ( $include_cat_child == 'false' ) 	? false 						: true;
	$show_read_more  	= ( $show_read_more == 'false' )    	? false 						: true;	
	$showAuthor 		= ( $show_author == 'true' )			? 'true'						: 'false';
	$showDate 			= ( $show_date == 'true' ) 				? 'true'						: 'false';
	$showCategory 		= ( $show_category_name == 'true' ) 	? 'true' 						: 'false';
	$image_fit			= ( $image_fit == 'false' )				? 0 							: 1;
	$show_comments 		= ( $show_comments == 'true' ) 			? 'true'						: 'false';
	$showContent 		= ( $show_content == 'true' ) 			? 'true' 						: 'false';
	$align				= ! empty( $align )						? 'align'.$align				: '';
	$extra_class		= $extra_class .' '. $align .' '. $className;
	$extra_class		= wppf_get_sanitize_html_classes( $extra_class );

	// Shortcode file
	$post_design_file_path 	= WPPF_DIR . '/frontend/filter/' . $design . '.php';
	$design_file 			= (file_exists($post_design_file_path)) ? $post_design_file_path : '';

	// wp_enqueue_script( 'wpos-filterizr-js' );
	wp_enqueue_script( 'wpos-isotope-js' );
	wp_enqueue_script( 'wppf-public-js' );

	// Taking some globals
	global $post;
	$image_fit_class	= ($image_fit) 	? 'wppf-image-fit' : '';

	// Getting Terms
	$wppfuterms = get_terms( array(
							'taxonomy' 		=> WPPF_CAT,
							'hide_empty' 	=> true,
							'fields'		=> 'id=>name',
							'number'		=> $cat_limit,
							'order'			=> $cat_order,
							'orderby'		=> $cat_orderby,
							'include'       => $cat_id,
							'exclude'       => $exclude_cat,
				));

	ob_start();

	// If category is there
	if( !is_wp_error($wppfuterms) && !empty($wppfuterms) ) {

		// Getting ids 
		$logo_cats = array_keys( $wppfuterms );

		// Simple Query Parameters
		$query_args = array(
				'post_type' 			=> WPPF_POST_TYPE,
				'post_status' 			=> array( 'publish' ),
				'posts_per_page'		=> -1,
				'order'          		=> $order,
				'orderby'        		=> $orderby,
				'ignore_sticky_posts'	=> true,
			);

		// Category Parameter
		if( !empty($logo_cats) ) {

			$query_args['tax_query'] = array(
											array(
												'taxonomy' 			=> WPPF_CAT,
												'field' 			=> 'term_id',
												'terms' 			=> $logo_cats,
												'include_children'	=> $include_cat_child,
											));
		}

		// WP Query
		$post_query = new WP_Query($query_args);
		$post_count = $post_query->post_count;
		$count      = 0;

		if( $post_query->have_posts() ) { ?>

		<div class="wppf-filter-wrp <?php echo esc_html($extra_class); ?>">
			<ul class="wppf-filter" id="wppf-filtr-<?php echo esc_html($unique); ?>">
				<li class="wppf-filtr-cat wppf-active-filtr" data-filter="*"><a href="javascript:void(0);"><?php echo esc_html($all_filter_text); ?></a></li>
				<?php foreach ($wppfuterms as $term_id => $term_name) { ?>
					<li class="wppf-filtr-cat" data-filter=".wppf-<?php echo esc_html($term_id); ?>"><a href="javascript:void(0);"><?php echo esc_html($term_name); ?></a></li>
				<?php } ?>
			</ul>

			<div class="wppf-filtr-container" id="wppf-post-filtr-<?php echo esc_html($unique); ?>">
				<div class="wppf-post-grid-main wppf-post-filter <?php echo esc_html('wppf-').esc_html($design).' '.esc_html($image_fit_class); ?> has-no-animation wppf-clearfix">

				<?php while ($post_query->have_posts()) : $post_query->the_post();
					$count++;
					$post_featured_image 	= wppf_get_post_featured_image( $post->ID, $media_size, true );
					$post_link 		        = wppf_get_post_link( $post->ID );	
					$postcats 	            = get_the_terms($post->ID, WPPF_CAT);
					$css_class 				= '';
					$usedcat	            = array();
					$cat_links            	= array();
					$comments 				= get_comments_number( $post->ID );
					$reply					= ($comments <= 1)  ? 'Reply' : 'Replies';

					if($postcats) {
					foreach ( $postcats as $term ) {
						$term_link = get_term_link( $term );
						$cat_links[] = '<a href="' . esc_url( $term_link ) . '">'.$term->name.'</a>';
					}
					}
					$cate_name = join( " ", $cat_links );

					if( !is_wp_error($postcats) && !empty($postcats) ) {
						foreach ($postcats as $postcat) {
							$usedcat[] = 'wppf-'.$postcat->term_id;
						}
					}
					$data_category = !empty($usedcat) ? implode(' ',$usedcat) : '1';

					if($gridcol == '2') {
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
						}
					?>

					<div class="wppf-medium-<?php echo esc_html($postgrid); ?> wppf-columns filtr-item wppf-post-cnt <?php echo esc_html($data_category); ?>">
					<?php
						// Include shortcode html file
						if( $design_file ) {
							include( $design_file );
						}
					?>
					</div>

					<?php endwhile; ?>

				</div>
			</div>
		</div>

		<?php
		} // End of have post

		wp_reset_postdata(); // reset wp query

		$content .= ob_get_clean();
		return $content;

	} // End of category check
}

// 'post_filter' Shortcode
add_shortcode('wppf_post_filter', 'wppf_postgrid_filter_shortcode');