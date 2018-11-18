<?php
get_header();

global $event_star_customizer_all_values;
?>

<div class="wrapper inner-main-title">
    <div class="container">
        <header class="entry-header init-animate">
            <h1 class="page-title"><?php _e(  post_type_archive_title( '', false ), 'ict_camp' ); ?></h1>
            <?php
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
            $facilitator_terms = get_terms(array('taxonomy' => 'facilitator_group', 'orderby' => 'slug') );
             if ( !empty( $facilitator_terms ) && !is_wp_error( $terms ) ){
                echo '<div class="section padding-top-1-em" id="advisory-committee">';
                  foreach ($facilitator_terms as $fac_term) :
                     wp_reset_query();
                     $args = [
                         'post_type' => 'facilitators',
                         'orderby'   => 'title',
                         'order'     => 'asc',
                         'tax_query' => [
                             [
                                 'taxonomy' => 'facilitator_group',
                                 'field'    => 'slug',
                                 'terms'    => $fac_term->slug,
                             ]
                         ]
                     ];

                     $facilitators_group = new WP_Query( $args );
                     if($facilitators_group->have_posts()) {
                        echo '<div class="section-title">';
                            echo '<h2 class="text-center">';
                                 _e( $fac_term->name, 'ict_camp' );
                            echo '</h2>';
                        echo '</div>';
                        ?>
                        <div class="setcion-body margin-top-3-em">
                            <?php
                            /* Start the Loop */
                            $counter = 1;
                            $wrap_count = 6;

                            while($facilitators_group->have_posts()) : $facilitators_group->the_post();
                                if( $counter%$wrap_count == 1 ) {
                                    echo '<div class="row flex-box-row">';
                                }

                                get_template_part( 'inc/template-parts/facilitators/content', 'list' );

                                if( $counter%$wrap_count == 0 ) {
                                    echo '</div>';
                                }

                                $counter++;
                            endwhile;
                            do_action( 'event_star_action_posts_navigation' );
                            ?>
                        </div>
                    <?php
                    } else{
                          get_template_part( 'template-parts/content', 'none' );
                    }
                  endforeach;
                echo "</div>";
             }
           ?>
        </main><!-- #main -->
    </div><!-- #primary -->
    <?php
    get_sidebar( 'left' );
    get_sidebar();
    ?>
</div><!-- #content -->

<?php get_footer();
