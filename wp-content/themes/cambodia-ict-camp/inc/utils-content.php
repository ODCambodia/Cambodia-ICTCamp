<?php
/****** Post Meta *******
 * Prints HTML with meta information for the categories, tags and comments.
 */

function echo_ictcamp_post_meta($the_post, $show_elements = array('date','categories','tags','sources'), $order = "metadata_created", $max_num_cats = null, $max_num_tags = null)
{
	global $post;
	$post = $the_post;
	?>
	<div class="post-meta">
		<ul>
      <?php
			if (in_array('date',$show_elements)): ?>
        <li class="date">
					<?php if ($order == 'metadata_modified'): ?>
        					<i class="fa fa-pencil"></i>
      						<?php
      						 if (ictcamp_localize_manager()->get_current_language() == 'km') {
      								 echo ictcamp_localize_manager()->khmer_date(get_the_modified_time('j.m.Y'));
      						 } else {
      								 echo get_the_modified_time('j F Y');
      						 }
      					  ?>
					<?php else: ?>
						<i class="fa fa-calendar-check-o"></i>
						<?php
						 if (ictcamp_localize_manager()->get_current_language() == 'km') {
								 echo ictcamp_localize_manager()->khmer_date(get_the_time('j.m.Y'));
						 } else {
								 echo get_the_date('j F Y');
						 }
					  ?>
					<?php endif; ?>
  			</li>
      <?php
			endif; ?>
      <?php
			if (in_array('sources', $show_elements)):
        if (taxonomy_exists('news_source') && isset($post)) {
  				$terms_news_source = get_the_terms($post->ID, 'news_source');
  				if ($terms_news_source && !is_wp_error($terms_news_source)) {
  					if ($terms_news_source) {
  						$news_sources = '';
  						foreach ($terms_news_source as $term) {
  							$term_link = get_term_link($term, 'news_source');
  							if (is_wp_error($term_link)) {
  								continue;
  							}
  							//We successfully got a link. Print it out.
  							$news_sources .= '<a href="'.$term_link.'">'.$term->name.'</a>, ';
  							if (isset($news_sources)):
  								echo '<li class="news-source">';
  								echo '<i class="fa fa-chain"></i> ';
  								echo substr($news_sources, 0, -2);
  								echo '</li> ';
  							endif;
  						}
  					}
  				}
  			}// if news_source exists
      endif; ?>
      <?php
			if (in_array('categories',$show_elements) && !empty(get_the_category())): ?>
			<?php
				$category_list = wp_get_post_categories($post->ID,array('fields' => 'all_with_object_id'));
				if (isset($max_num_cats) && $max_num_cats > 0):
					$category_list = array_splice($category_list,0,$max_num_cats);
				endif;
				if (!empty($category_list)): ?>
					<li class="categories">
	  				<i class="fa fa-folder-o"></i>
					<?php
						foreach ($category_list as $category): ?>
							<a href="<?php echo get_category_link($category->term_id) ?>?queried_post_type=<?php echo get_post_type(); ?>"><?php echo $category->name ?></a>
						<?php
							if ($category != end($category_list)):
								echo " / ";
							endif;
						endforeach; ?>
					</li>
	      <?php
				endif;
			endif; ?>
      <?php
			if (in_array('tags',$show_elements)): ?>
					<?php
					$tag_list = get_the_tags($post->ID);
					if (is_array($tag_list) && isset($max_num_tags) && $max_num_tags > 0):
						$tag_list = array_splice($tag_list,0,$max_num_tags);
					endif;
					if (!empty($tag_list)): ?>
						<li class="tags">
		  				<i class="fa fa-tags"></i>
								<?php
							  foreach($tag_list as $tag): ?>
							    <a href="<?php echo get_tag_link($tag->term_id) ?>?queried_post_type=<?php echo get_post_type(); ?>"><?php echo $tag->name ?></a>
							  <?php
									if ($tag != end($tag_list)):
										echo " / ";
									endif;
								endforeach; ?>
						</li>
				<?php
				 	endif;
	      endif;

        if (in_array('comment',$show_elements)):
          if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
            echo '<span class="comments-link"><i class="fa fa-comment-o"></i> ';
           	  comments_popup_link( esc_html__( 'Leave a comment', 'event-star' ), esc_html__( '1 Comment', 'event-star' ), esc_html__( '% Comments', 'event-star' ) );
              echo '</span>';
          endif;
        endif;

        ?>
		</ul>
	</div>
	<?php
}
?>
