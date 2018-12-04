<?php
get_header();

global $event_star_customizer_all_values;
?>

<div class="wrapper inner-main-title">
    <div class="container">
        <header class="entry-header init-animate">
            <h1 class="page-title"><?php _e( post_type_archive_title( '', false ), 'ict_camp' ); ?></h1>
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
            if( have_posts() ) :
                /* Start the Loop */
                $counter = 1;
                $wrap_count = 4;

                while( have_posts() ) : the_post();
                    if( $counter%$wrap_count == 1 ) {
                        echo '<div class="row flex-box-row">';
                    }

                    get_template_part( 'inc/template-parts/facilitators/content', 'list' );

                    if( $counter%$wrap_count == 0 ) {
                        echo '</div>';
                    }
                    ?>

                <?php
                endwhile;
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