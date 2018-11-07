<?php
get_header();

global $event_star_customizer_all_values;
?>

<div class="wrapper inner-main-title">
    <div class="container">
        <header class="entry-header init-animate">
            <h1 class="page-title"><?php _e( 'Facilitators', 'ict_camp' ); ?></h1>
            <?php
            // the_archive_title( '<h1 class="page-title">', '</h1>' );
            // the_archive_description( '<div class="taxonomy-description">', '</div>' );

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
            if( have_posts() ) :

                // Advisory Committee
                $args = [
                    'post_type' => 'facilitators',
                    'orderby'   => 'title',
                    'order'     => 'asc',
                    'tax_query' => [
                        [
                            'taxonomy' => 'facilitator_group',
                            'field'    => 'slug',
                            'terms'    => 'advisory-committee'
                        ]
                    ]
                ];
                $advisory_committees = new WP_Query( $args );


                if ( $advisory_committees->have_posts() ):
                ?>
                    <div class="section padding-top-1-em" id="advisory-committee">
                        <div class="section-title">
                            <h2 class="text-center">
                                <?php _e( 'Advisory Committee', 'ict_camp' ); ?>
                            </h2>
                        </div>

                        <div class="setcion-body margin-top-3-em">
                            <?php
                            /* Start the Loop */
                            $counter = 1;
                            $wrap_count = 4;

                            while( $advisory_committees->have_posts() ) : $advisory_committees->the_post();
                                if( $counter%$wrap_count == 1 ) {
                                    echo '<div class="row flex-box-row">';
                                }

                                get_template_part( 'inc/template-parts/facilitators/content', 'list' );
                                
                                if( $counter%$wrap_count == 0 ) {
                                    echo '</div>';
                                }

                                $counter++;
                            endwhile;
                            /**
                             * event_star_action_posts_navigation hook
                             * @since Event Star 1.0.0
                             *
                             * @hooked event_star_posts_navigation - 10
                             */
                            do_action( 'event_star_action_posts_navigation' );
                            ?>
                        </div>
                    </div>
                <?php
                endif;
                // END Advisory Committee

                // Facilitators
                $args = [
                    'post_type' => 'facilitators',
                    'orderby'   => 'title',
                    'order'     => 'asc',
                    'tax_query' => [
                        [
                            'taxonomy' => 'facilitator_group',
                            'field'    => 'slug',
                            'terms'    => 'facilitators'
                        ]
                    ]
                ];
                $facilitators = new WP_Query( $args );

                if ( $facilitators->have_posts() ):
                    ?>
                    <div class="section padding-top-1-em" id="facilitators">
                        <div class="section-title">
                            <h2 class="text-center">
                                <?php _e( 'Facilitators', 'ict_camp' ); ?>
                            </h2>
                        </div>

                        <div class="setcion-body margin-top-3-em">
                            <?php
                            /* Start the Loop */
                            $counter = 1;
                            $wrap_count = 4;

                            while( $facilitators->have_posts() ) : $facilitators->the_post();
                                if( $counter%$wrap_count == 1 ) {
                                    echo '<div class="row flex-box-row">';
                                }

                                get_template_part( 'inc/template-parts/facilitators/content', 'list' );
                                
                                if( $counter%$wrap_count == 0 ) {
                                    echo '</div>';
                                }

                                $counter++;
                            endwhile;
                            /**
                             * event_star_action_posts_navigation hook
                             * @since Event Star 1.0.0
                             *
                             * @hooked event_star_posts_navigation - 10
                             */
                            do_action( 'event_star_action_posts_navigation' );
                            ?>
                        </div>
                    </div>
                <?php
                endif;
                // END Faciliators

                // Volunteers
                $args = [
                    'post_type' => 'facilitators',
                    'orderby'   => 'title',
                    'order'     => 'asc',
                    'tax_query' => [
                        [
                            'taxonomy' => 'facilitator_group',
                            'field'    => 'slug',
                            'terms'    => 'volunteers'
                        ]
                    ]
                ];
                $volunteers = new WP_Query( $args );

                if ( $volunteers->have_posts() ):
                    ?>
                    <div class="section padding-top-1-em" id="volunteers">
                        <div class="section-title">
                            <h2 class="text-center">
                                <?php _e( 'Volunteers', 'ict_camp' ); ?>
                            </h2>
                        </div>

                        <div class="setcion-body margin-top-3-em">
                            <?php
                            /* Start the Loop */
                            $counter = 1;
                            $wrap_count = 4;

                            while( $volunteers->have_posts() ) : $volunteers->the_post();
                                if( $counter%$wrap_count == 1 ) {
                                    echo '<div class="row flex-box-row">';
                                }

                                get_template_part( 'inc/template-parts/facilitators/content', 'list' );
                                
                                if( $counter%$wrap_count == 0 ) {
                                    echo '</div>';
                                }

                                $counter++;
                            endwhile;
                            /**
                             * event_star_action_posts_navigation hook
                             * @since Event Star 1.0.0
                             *
                             * @hooked event_star_posts_navigation - 10
                             */
                            do_action( 'event_star_action_posts_navigation' );
                            ?>
                        </div>
                    </div>
                <?php
                endif;
                // END Volunteers
            else:
                get_template_part( 'template-parts/content', 'none' );
            endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->
    <?php
    get_sidebar( 'left' );
    get_sidebar();
    ?>
</div><!-- #content -->

<?php get_footer();
