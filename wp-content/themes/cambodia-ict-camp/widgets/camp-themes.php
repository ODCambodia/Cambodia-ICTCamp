<?php
/**
 * Widget Name: CICT Themes Widget
 * Description: This is the widget get for displaying all themes of the camp.
 * Version: 1.0.0
 */

class Camp_Themes_Widget extends WP_Widget
{
	// Constructor
	public function __construct()
	{
		parent::__construct(
			'camp_themes',
			esc_html__( 'CICT Theme Widget', 'cambodiaictcamp' ),
			[
				'description' => esc_html__( 'Display a list of all themes of the camp', 'cambodiaictcamp' ),
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

		$attr = [
			'hide_empty' => 0,
			'orderby'	 => 'name',
			'parent'	 => 0,
			'exclude'    => 1 
		];

		$themes = get_categories( $attr );
		?>

		<div class="container-fluid">
		<?php
		foreach( $themes as $theme ) {
			$theme_image = get_term_meta( $theme->term_id, '_category_image_value_key', true );
		?>
			<div class="col-xs-12 col-sm-12 col-md-3">
				<a href="<?php echo get_site_url() . '/themes#' . $theme->slug; ?>">
					<h5 class="theme-box text-center" style="background-image: url( <?php echo $theme_image; ?>;);"><?php echo $theme->name; ?></h5>
				</a>
			</div>
		<?php
		}
		?>
	</div>
	<?php
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