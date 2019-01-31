<?php
global $event_star_customizer_all_values;
$content_from = $event_star_customizer_all_values['event-star-blog-archive-content-from'];

$post = isset($params["post"]) ? $params["post"] : null;
$link = isset($params["link"]) ? $params["link"] : get_permalink();
$max_num_tags = isset($params["max_num_tags"]) ? $params["max_num_tags"] : null;
$show_tags = isset($params["$show_tags"]) ? $params["$show_tags"] : null;
$show_meta = isset($params["show_meta"]) ? $params["show_meta"] : true;
$show_order_number = isset($params["show_order_number"]) ? $params["show_order_number"] : "";
$show_excerpt = isset($params["show_excerpt"]) ? $params["show_excerpt"] : false;
$order = isset($params["order"]) ? $params["order"] : "publish_date";
$extra_classes = isset($params["extra_classes"]) ? $params["extra_classes"] : null;

$no_blog_image = '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="content-wrapper">
        <div class="entry-content <?php echo $no_blog_image; ?>">
            <div class="entry-header-title">
                <?php the_title( sprintf( '<h4 class="entry-title">
                  <a class="txtcolor-dgreen" href="%s" rel="bookmark"><i class="fa fa-download"></i> '. $show_order_number, esc_url( $link ) ), '</a></h4>' ); ?>
            </div>
            <?php if ($show_meta): //$show_tags  ?>
              <div class="posts-meta-div">
                  <?php echo_ictcamp_post_meta( get_post(), array( 'date', 'tags' ) ); ?>
              </div>
            <?php endif; ?>
            <?php
            if ( $show_excerpt ) :
                the_excerpt();
            else :
                the_content();
            endif;
            ?>
        </div><!-- .entry-content -->

        <div class="clearfix"></div>
    </div>
</article><!-- #post-## -->
