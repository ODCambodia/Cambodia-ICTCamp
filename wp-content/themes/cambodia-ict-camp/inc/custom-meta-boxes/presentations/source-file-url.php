<?php
add_action( 'add_meta_boxes', 'create_presentation_source_file_url_meta_box' );
add_action( 'save_post', 'save_presentation_source_file_url_data' );

function create_presentation_source_file_url_meta_box()
{
	add_meta_box( 'presentation_source_file_url', __( 'Source File Links' ), 'add_presentation_source_file_url_callback', 'presentations', 'advanced' );
}

function add_presentation_source_file_url_callback( $post )
{
	wp_nonce_field( 'save_presentation_source_file_url_data', 'presentation_source_file_url_meta_box_nonce' );

	$value = get_post_meta( $post->ID, '_presentation_source_file_url_value_key', true );

	echo '<lable for="presentations_source_link_field">Link of presentation: </lable>';
	echo '<input type="text" id="presentations_source_link_field" name="presentations_source_link_field" value="'. esc_attr( $value ) .'" size="50" />';
}

function save_presentation_source_file_url_data( $post_id )
{
	if( ! isset( $_POST['presentation_source_file_url_meta_box_nonce'] ) ) {
		return;
	}

	if( ! wp_verify_nonce( $_POST['presentation_source_file_url_meta_box_nonce'], 'save_presentation_source_file_url_data' ) ) {
		return;
	}

	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if( ! isset( $_POST['presentations_source_link_field'] ) ) {
		return;
	}

	$presentation_source_link = sanitize_text_field( $_POST['presentations_source_link_field'] );

	update_post_meta( $post_id, '_presentation_source_file_url_value_key', $presentation_source_link );
}
