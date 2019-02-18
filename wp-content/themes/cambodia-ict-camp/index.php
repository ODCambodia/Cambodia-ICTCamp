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

            if ( 1 == $event_star_customizer_all_values['event-star-show-breadcrumb'] ) {
                event_star_breadcrumbs();
            }
            ?>
        </header><!-- .entry-header -->
    </div>
</div>

<div id="content" class="site-content container clearfix">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <!--post thumbnail options-->
            <div class="image-wrap margin-top-3-em">
                <div class="post-thumb">
                    <?php
                    $thumbnail_size = array( 200, 150 );

                    $args = [
                        'orderby'        => 'post_date',
                        'order'          => 'DESC',
                        'post_status'    => 'publish',
                        'meta_query'     => [
                            [
                                'key'     => '_thumbnail_id',
                                'value'   => '',
                                'compare' => '!='
                            ]
                        ],
                        'posts_per_page' => 1
                    ];

                    $recent_posts_with_img = new WP_Query( $args );

                    if ( $recent_posts_with_img->have_posts() ) {
                        while ( $recent_posts_with_img->have_posts() ) {
                            $recent_posts_with_img->the_post();

                            if ( has_post_thumbnail() ) {
                                $recent_feature_image_url = get_the_post_thumbnail_url( get_the_ID(), $thumbnail_size );
                            }
                        }
                        ?>

                        <!-- Carousel -->
                        <div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <?php 
                                    if ( has_post_thumbnail() ) {
                                    ?>
                                        <div class="recent-feature-image" style="background-image: url( '<?php echo $recent_feature_image_url; ?>' );"></div>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <?php
                                $args = [
                                    'offset'         => 1,
                                    'orderby'        => 'post_date',
                                    'order'          => 'DESC',
                                    'post_status'    => 'publish',
                                    'meta_query'     => [
                                        [
                                            'key'     => '_thumbnail_id',
                                            'value'   => '',
                                            'compare' => '!='
                                        ]
                                    ],
                                    'posts_per_page' => 3
                                ];

                                $recent_posts_with_img = new WP_Query( $args );

                                while ( $recent_posts_with_img->have_posts() ) {
                                    $recent_posts_with_img->the_post();

                                    if ( has_post_thumbnail() ) {
                                        $recent_feature_image_url = get_the_post_thumbnail_url( get_the_ID(), $thumbnail_size );
                                        ?>
                                        <div class="item">
                                            <div class="recent-feature-image" style="background-image: url( '<?php echo $recent_feature_image_url; ?>' );"></div>
                                        </div>
                                    <?php
                                    }
                                }

                                wp_reset_query();
                                ?>
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
                        </div><!-- Carousel -->
                    <?php
                    } 
                    ?>
                </div><!-- .post-thumb-->
            </div>

            <?php
            if ( have_posts() ) :
            ?>
                <div class="setion-body margin-top-3-em">
                    <?php
                    $wrap_count = 3;
                    $counter = 1;

                    /* Start the Loop */
                    while ( have_posts() ) : the_post();
                        if ( $counter%$wrap_count == 1 ) {
                            echo '<div class="row">';
                        }

                        $attributes = [
                            'no_custom_link_get_permalink' => true,
                            'post'                         => get_post(),
                            'show_excerpt'                 => true,
                            'show_meta'                    => true,
                            'show_thumbnail'               => true
                        ];
                        
                        get_ictcamp_template( 'content-grid-3-cols', $attributes, true );

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        // get_template_part( 'inc/template-parts/content-list-posts', get_post_format() );

                        if ( $counter%$wrap_count == 0 ) {
                            echo '</div>';
                            echo '<div class="clearfix"></div>';
                        }
                        $counter++;
                    endwhile;
                    ?>
                </div>
                <?php
                do_action( 'camp_ict_action_posts_navigation' );
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
