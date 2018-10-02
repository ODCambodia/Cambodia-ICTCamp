<?php
/**
 * Widget Name: CICT Organizers Widget
 * Description: This is the widget get for displaying all organizers of the camp.
 * Version: 1.0.0
 */

class Camp_Organizers_Widget extends WP_Widget
{
	// Constructor
	public function __construct()
	{
		parent::__construct(
			'camp_organizers',
			esc_html__( 'CICT Organizer Widget', 'cambodiaictcamp' ),
			[
				'description' => esc_html__( 'Display a list of all organizers of the camp', 'cambodiaictcamp' ),
			]
		);
	}

	// Output Front-end
	public function widget( $args, $instance )
	{
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];

		if( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$organizers = new WP_Query( [ 'post_type' => 'organizers' ] );

		if( $organizers->have_posts() ) {
			$number = wp_count_posts( 'organizers' )->publish;

			switch ( $number ) {
				case 1:
					$col = 'col-md-12';
					break;
				case 2:
					$col = 'col-md-6';
					break;
				case 3:
					$col = 'col-md-4';
					break;
				default:
					$col = 'col-md-3';
					break;
			}
		?>
			<div class="container-fluid">
				<?php
				while( $organizers->have_posts() ) {
					$organizers->the_post();
				?>
					<div class="align-center col-xs-12 col-sm-12 <?php echo $col; ?>">
						<?php
						$attributes = [
							'title' => __( get_the_title() ),
							'class' => 'img-responsive',
						];

						$logo = get_the_post_thumbnail( get_the_ID(), 'medium', $attributes );
						$responsive_logo = preg_replace( '/(width|height)="\d*"\s/', "", $logo );
						?>
						<a href="<?php echo get_the_excerpt(); ?>">
							<?php echo $responsive_logo  ?>
						</a>
					</div><!-- col-xs-12 col-sm-12 col-md-3 -->
				<?php
				}
				?>
			</div>
	<?php
		}
		wp_reset_postdata();
	}
	
	// Form Field on Widget Screen
	public function form( $instance )
	{
		if( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'New Title', 'cambodiaictcamp' );
		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title: ' ) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ) ?>" value="<?php echo esc_attr( $title ) ?>">
		</p>
	<?php
	}

	// Save Data
	public function update( $new_instance, $old_instance )
	{
		$instance = [];

		if( ! empty( $new_instance['title'] ) ) {
			$instance['title'] = strip_tags( $new_instance['title'] );
		} else {
			$instance['title'] = '';
		}

		return $instance;
	}
}