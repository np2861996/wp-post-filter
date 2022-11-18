<?php
/**
 * Admin Settings Pagew
 *
 * @package Simple_Post_Filter
 * @since 1.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>

<div class="wrap wppf-wrap">
<h2><?php _e( 'Post Filter', 'wp-post-filter' ); ?></h2>
	
	<div class="how-works-sec">
		
		<div class="how-works-title">
			<h2> How it works? </h2>
		</div>
		<div class="how-works-sub-title">
			<h3>Geting Started with Post Slider:</h3>
		</div>
		<div class="how-works-sub-title">
			<h4>This plugin display WordPres default standard POST with a simple shortcode.</h4>
			<ul>
				<li>Step-1. Create a page like Blog or any other.</li>
				<li>Step-2. Put below shortcode wherever you want.</li>
				<li>Step-3. <b>[wppf_post_filter]</b> – Post Filter Shortcode.</li>
				<li>Step-4. <b>[wppf_post_grid]</b> – Post Grid without Filter Shortcode.</li>
				
			</ul>
		</div>

		<div class="how-works-sub-title">
			<h4>Template code is.</h4>
			<div><b>&lt;?php echo do_shortcode('[wppf_post_grid]'); ?&gt;</b></div><br>
			<div><b>&lt;?php echo do_shortcode('[wppf_post_filter]'); ?&gt;</b></div><br>
		</div>


		<div class="how-works-sec2 how-works-sub-title">
			<h2>Below here is Shortcode parameters for  grid  filter.</h2>
			<ul>
				<li>
					<b>cat_id :</b> 
					<p>[wppf_post_filter cat_id="category_id"]</p>
					<p>(Display posts categories wise).</p>
				</li>
				<li><b>include_cat_child:</b>  
					<p>[wppf_post_filter include_cat_child="false"]</p> 
					<p>(Include cat child or not. Values are "true" or "false").</p>
				</li>
				<li>
					<b>grid:</b>  
					<p>[wppf_post_filter grid="2"]</p> 
					<p>(Display post in Grid formats).</p>
				</li>
				<li>
					<b>order :</b> 
					<p>[wppf_post_filter order="DESC"]</p>
					<p>(Post order ie DESC or ASC).</p>
				</li>
				<li>
					<b>orderby:</b> 
					<p>[wppf_post_filter orderby="date"]</p> 
					<p>(Order by post ie ID, author, title, date, name, rand etc).</p>
				</li>
				<li>
					<b>image_fit:</b> 
					<p>[wppf_post_filter image_fit="true"]</p> 
					<p>(Fit the post image in wrap. Values are "true" or "false").</p>
				</li>
				<li>
					<b>media_size:</b> 
					<p>[wppf_post_filter media_size="large"]</p> 
					<p>(Set the featured image size to diplay in post Values are thumbnail, medium, large, full).</p>
				</li>
				<li>
					<b>image_height :</b> 
					<p>[wppf_post_filter image_height="300"]</p> 
					<p>(Set featured image height).</p>
				</li>
				<li>
					<b>show_date:</b> 
					<p>[wppf_post_filter show_date="false"]</p> 
					<p>(Display post date OR not. By default value is “true”. Options are “ture OR false”)</p>
				</li>
				<li>
					<b>sshow_author:</b> 
					<p>[wppf_post_filter show_author="true”]</p> 
					<p>(Display post author. Values are “true” or “false”).</p>
				</li>
				<li>
					<b>show_content:</b> 
					<p>[wppf_post_filter show_content="true" ]</p> 
					<p>(Display post Short content OR not. By default value is "true". Options are "ture OR false").</p>
				</li>
				<li>
					<b>show_read_more:</b> 
					<p>[wppf_post_filter show_read_more="true"]</p> 
					<p>(Display Read more button or not. Options are "ture OR false")</p>
				</li>
				<li>
					<b>show_category_name:</b> 
					<p>[wppf_post_filter show_category_name="true" ]</p> 
					<p>(Display post category name OR not. By default value is “True”. Options are “ture OR false”).</p>
				</li>
				<li>
					<b>content_words_limit:</b> 
					<p>[wppf_post_filter content_words_limit="30" ]</p> 
					<p>(Control post short content Words limt. By default limit is 20 words).</p>
				</li>
				<li>
					<b>content_tail:</b> 
					<p>[wppf_post_filter content_tail=".." ]</p> 
					<p>(Set content tail).</p>
				</li>
				<li>
					<b>show_comments:</b> 
					<p> [wppf_post_filter show_comments="true" ]</p> 
					<p>(Options are “ture OR false”).</p>
				</li>
				<li>
					<b>cat_orderby:</b> 
					<p>[wppf_post_filter cat_orderby="name" ]</p> 
				</li>
				<li>
					<b>all_filter_text:</b> 
					<p> [wppf_post_filter all_filter_text="All" ]</p> 
				</li>
			</ul>
		</div>

		<div class="how-works-sec1 how-works-sub-title">
			<h2>Below here is Shortcode parameters for  grid.</h2>
			<ul>
				<li>
					<b>limit:</b> 
					<p>[wppf_post_grid limit="10"]</p>
					<p>(Display latest 10 posts and then pagination).</p>
				</li>
				<li><b>cat_id:</b>  
					<p>[wppf_post_grid cat_id="category_id"]</p> 
					<p>(Display posts categories wise).</p>
				</li>
				<li>
					<b>include_cat_child:</b>  
					<p>[wppf_post_grid include_cat_child="false"]</p> 
					<p>(Include cat child or not. Values are “true” or “false”)</p>
				</li>
				<li>
					<b>grid:</b> 
					<p>[wppf_post_grid grid="2"]</p>
					<p>(Display post in Grid formats).</p>
				</li>
				<li>
					<b>order:</b> 
					<p>[wppf_post_grid order="DESC"]</p> 
					<p>(Post order ie DESC or ASC).</p>
				</li>
				<li>
					<b>orderby:</b> 
					<p>[wppf_post_grid orderby="date"]</p> 
					<p>(Order by post ie ID, author, title, date, name, rand etc).</p>
				</li>
				<li>
					<b>image_height:</b> 
					<p>[wppf_post_grid image_height="300"]</p> 
					<p>(Set featured image height).</p>
				</li>
				<li>
					<b>show_date:</b> 
					<p>[wppf_post_grid show_date="false"]</p> 
					<p>(Display post date OR not. By default value is “true”. Options are “ture OR false”)</p>
				</li>
				<li>
					<b>show_author:</b> 
					<p>[wppf_post_grid show_author="true"]</p> 
					<p>(Display post author. Values are “true” or “false”).</p>
				</li>
				<li>
					<b>show_content:</b> 
					<p>[wppf_post_grid show_content="true" ]</p> 
					<p>(Display post Short content OR not. By default value is “true”. Options are “ture OR false”).</p>
				</li>
				<li>
					<b>show_read_more:</b> 
					<p>[wppf_post_grid show_read_more="true"]</p> 
					<p>(Display Read more button or not. Options are “ture OR false”).</p>
				</li>
				<li>
					<b>show_category_name:</b> 
					<p>[wppf_post_grid show_category_name="true" ]</p> 
					<p>(Display post category name OR not. By default value is “True”. Options are “ture OR false”).</p>
				</li>
				<li>
					<b>content_words_limit:</b> 
					<p>[wppf_post_grid content_words_limit="30" ]</p> 
					<p>(Control post short content Words limt. By default limit is 20 words).</p>
				</li>
				<li>
					<b>content_tail:</b> 
					<p>[wppf_post_grid content_tail=".." ]</p> 
					<p>(Set content tail).</p>
				</li>
				<li>
					<b>pagination:</b> 
					<p>[wppf_post_grid pagination="true" ]</p> 
					<p>(Set content tail).</p>
				</li>
				<li>
					<b>pagination_type:</b> 
					<p>[wppf_post_grid pagination_type="numeric" ]</p> 
					<p>(values are “prev-next” and “numeric”).</p>
				</li>
				<li>
					<b>show_comments:</b> 
					<p>[wppf_post_grid show_comments="true" ]</p> 
					<p>(Options are “ture OR false”).</p>
				</li>
			</ul>
		</div>
	</div>
</div>	