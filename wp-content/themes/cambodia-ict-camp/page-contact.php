<?php
get_header();

global $event_star_customizer_all_values;

$event_star_hide_front_page_header = $event_star_customizer_all_values['event-star-hide-front-page-header'];

if(
    ( is_front_page() && 1 != $event_star_hide_front_page_header )
    || !is_front_page()
) {
?>
    <div class="wrapper inner-main-title">
        <div class="container">
            <header class="entry-header init-animate">
                <?php
                the_title( '<h1 class="entry-title">', '</h1>' );
                if( 1 == $event_star_customizer_all_values['event-star-show-breadcrumb'] ){
                    event_star_breadcrumbs();
                }
                ?>
            </header><!-- .entry-header -->
        </div>
    </div>
<?php
}
?>

<div id="content" class="site-content container clearfix">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        <!-- Contact Info and ODC embedded map -->
                        <h2><?php _e( 'Contact Information' ); ?></h2>
                        <hr>
                        <?php
                            if ( have_posts() ) {
                                while ( have_posts() ) {
                                    the_post();

                                    the_content();
                                }
                            }
                        ?>
                    </div>
                    <div class="col-xs-12 col-md-7">
                        <!-- Contact Form -->
                        <h2><?php _e( 'Contact Form' ); ?></h2>
                        <hr>
                        <form method="POST">
                            <div class="form-group">
                                <label for="name"><?php _e( 'Name' ); ?></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="<?php _e( 'Your Name' ); ?>">
                            </div>

                            <div class="form-group">
                                <label for="email"><?php _e( 'Email' ); ?></label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="<?php _e( 'Your Email' ); ?>">
                            </div>

                            <div class="form-group">
                                <label for="message"><?php _e( 'Message' ); ?></label>
                                <textarea name="message" id="message" class="form-control" placeholder="<?php _e( 'Your Message' ); ?>"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary"><?php _e( 'Submit' ); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
    <?php
    get_sidebar( 'left' );
    get_sidebar();
    ?>
</div><!-- #content -->
<?php get_footer();