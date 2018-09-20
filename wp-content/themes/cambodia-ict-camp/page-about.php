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
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

			<!-- Organizer Section -->
			<?php 
			$organizers = new WP_Query( ['post_type' => 'organizers'] );

			if( $organizers->have_posts() ) { 
				$counter = 0;
				$wrap_count = 4;
			?>
				<div class="section" id="organizers">
					<div class="section-title">
						<h2>Organizers</h2>
					</div>

					<div class="setcion-body">
						<?php
						while ( $organizers->have_posts() ) {
							$organizers->the_post();
							
							if( $counter%$wrap_count == 1 ) {
								echo '<div class="row">';
							}
							?>

							<div class="col-xs-12 col-sm-12 col-md-3">
								<?php
								$attributes = [
									'title' => __( get_the_title() ),
									'class' => 'img-responsive',
								];

								$logo = get_the_post_thumbnail( $post->ID, 'large', $attributes );
								$responsive_logo = preg_replace( '/(width|height)="\d*"\s/', "", $logo );
								?>
								<a href="<?php echo get_the_excerpt(); ?>">
									<?php echo $responsive_logo  ?>
								</a>
							</div><!-- col-xs-12 col-sm-12 col-md-3 -->

							<?php
							if( $counter%$wrap_count == 0 ) {
								echo '</div>';
							}
							
							$counter++;
						}
						?>
					</div>
				</div>
			<?php
			}
			?>
			<!-- END Organizer Section -->

			<!-- Partner Section -->
			<?php 
			$partners = new WP_Query( ['post_type' => 'partners'] );

			if( $partners->have_posts() ) { 
				$counter = 0;
				$wrap_count = 4;
			?>
				<div class="section" id="partners">
					<div class="section-title">
						<h2>Partners</h2>
					</div>

					<div class="setcion-body">
						<?php
						while ( $partners->have_posts() ) {
							$partners->the_post();
							
							if( $counter%$wrap_count == 1 ) {
								echo '<div class="row">';
							}
							?>

							<div class="col-xs-12 col-sm-12 col-md-3">
								<?php
								$attributes = [
									'title' => __( get_the_title() ),
									'class' => 'img-responsive',
								];

								$logo = get_the_post_thumbnail( $post->ID, 'large', $attributes );
								$responsive_logo = preg_replace( '/(width|height)="\d*"\s/', "", $logo );
								?>
								<a href="<?php echo get_the_excerpt(); ?>">
									<?php echo $responsive_logo  ?>
								</a>
							</div><!-- col-xs-12 col-sm-12 col-md-3 -->

							<?php
							if( $counter%$wrap_count == 0 ) {
								echo '</div>';
							}
							
							$counter++;
						}
						?>
					</div>
				</div>
			<?php
			}
			?>
			<!-- END Partner Section -->

			<!-- Supporter Section -->
			<?php 
			$supporters = new WP_Query( ['post_type' => 'supporters'] );

			if( $supporters->have_posts() ) { 
				$counter = 0;
				$wrap_count = 4;
			?>
				<div class="section" id="supporters">
					<div class="section-title">
						<h2>Supporters</h2>
					</div>

					<div class="setcion-body">
						<?php
						while ( $supporters->have_posts() ) {
							$supporters->the_post();
							
							if( $counter%$wrap_count == 1 ) {
								echo '<div class="row">';
							}
							?>

							<div class="col-xs-12 col-sm-12 col-md-3">
								<?php
								$attributes = [
									'title' => __( get_the_title() ),
									'class' => 'img-responsive',
								];

								$logo = get_the_post_thumbnail( $post->ID, 'large', $attributes );
								$responsive_logo = preg_replace( '/(width|height)="\d*"\s/', "", $logo );
								?>
								<a href="<?php echo get_the_excerpt(); ?>">
									<?php echo $responsive_logo  ?>
								</a>
							</div><!-- col-xs-12 col-sm-12 col-md-3 -->

							<?php
							if( $counter%$wrap_count == 0 ) {
								echo '</div>';
							}
							
							$counter++;
						}
						?>
					</div>
				</div>
			<?php
			}
			?>
			<!-- END Suppporter Section -->
		</main><!-- #main -->
	</div><!-- #primary -->
    <?php
    get_sidebar( 'left' );
    get_sidebar();
    ?>
</div><!-- #content -->

<?php get_footer();
