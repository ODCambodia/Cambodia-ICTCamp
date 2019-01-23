<?php
get_header();

global $event_star_customizer_all_values;
?>

<div class="wrapper inner-main-title">
    <div class="container">
        <header class="entry-header init-animate">
            <h1 class="page-title"><?php _e( 'Blog', 'ict_camp' ) ?></h1>

            <?php
            the_archive_description( '<div class="taxonomy-description">', '</div>' );

            if( 1 == $event_star_customizer_all_values['event-star-show-breadcrumb'] ){
                event_star_breadcrumbs();
            }
            ?>
        </header><!-- .entry-header -->
    </div>
</div>

<div id="content" class="site-content container clearfix">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php
            if ( have_posts() ) :
                // Featured Post
                $thumbnail_size = 'full';

                if ( has_post_thumbnail() && 'disable' != $thumbnail_size ): ?>

                    <!--post thumbnail options-->
                    <div class="image-wrap margin-top-3-em">
                        <div class="post-thumb">
                            <?php
                            $latest_feature_image_url = get_the_post_thumbnail_url( get_the_ID(), $thumbnail_size );
                            ?>
                            
                            <!-- Carousel -->
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                              <!-- Indicators -->
                              <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                              </ol>

                              <!-- Wrapper for slides -->
                              <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                  <div class="latest-feature-image" style="background-image: url('<?php echo $latest_feature_image_url; ?>');"></div>
                                </div>
                                <div class="item">
                                  <div class="latest-feature-image" style="background-image: url('<?php echo $latest_feature_image_url; ?>');"></div>
                                </div>
                                <div class="item">
                                  <div class="latest-feature-image" style="background-image: url('<?php echo $latest_feature_image_url; ?>');"></div>
                                </div>
                              </div>

                              <!-- Controls -->
                              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <i class="fa fa-chevron-left" style="top: 50%" aria-hidden="true"></i>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                            <!-- Carousel -->

                        </div><!-- .post-thumb-->
                    </div>
                <?php
                else:
                    $no_blog_image = 'no-image';
                endif;
                // END Featured Post
            endif;

            if ( have_posts() ) :
            ?>
                <div class="setion-body margin-top-3-em">
                    <?php
                    $wrap_count = 3;
                    $counter = 0;

                    /* Start the Loop */
                    while ( have_posts() ) : the_post();
                        if ( 0 != $counter ) {
                            if ( $counter%$wrap_count == 1 ) {
                                echo '<div class="row">';
                            }

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'inc/template-parts/content-list-posts', get_post_format() );

                            if ( $counter%$wrap_count == 0 ) {
                                echo '</div>';
                                echo '<div class="clearfix"></div>';
                            }
                        }

                        $counter++;

                    endwhile;
                    ?>
                </div>
                <?php
                /**
                 * event_star_action_posts_navigation hook
                 * @since Event Star 1.0.0
                 *
                 * @hooked event_star_posts_navigation - 10
                 */
                do_action( 'event_star_action_posts_navigation' );
            else :
                get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->
    <?php
    get_sidebar( 'left' );
    get_sidebar();
    ?>
</div><!-- #content -->

<?php get_footer();
