<?php
/**
 * Custom template tags for this theme.
 *
 * @package Acme Themes
 * @subpackage Event Star
 */

if ( ! function_exists( 'event_star_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */

function cambodia_ict_camp_entry_footer() {
	// Hide author, category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			'%s',
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<i class="fa fa-calendar-check-o" aria-hidden="true"></i> <span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

		// printf(
  //           '%s',
  //           '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i>' . esc_html( get_the_author() ) . '</a></span>'
  //       );

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'event-star' ) );
		if ( $tags_list ) {
            printf( '<span class="tags-links"><i class="fa fa-tags"></i>%1$s</span>', $tags_list ); // WPCS: XSS OK.
        }
	}

	// if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
	// 	echo '<span class="comments-link"><i class="fa fa-comment-o"></i>';
	// 	comments_popup_link( esc_html__( 'Leave a comment', 'event-star' ), esc_html__( '1 Comment', 'event-star' ), esc_html__( '% Comments', 'event-star' ) );
	// 	echo '</span>';
	// }

	// if ( get_edit_post_link() ) :
	// 	edit_post_link(
	// 		sprintf(
	// 		/* translators: %s: Name of current post */
	// 			esc_html__( 'Edit %s', 'event-star' ),
	// 			the_title( '<span class="screen-reader-text">"', '"</span>', false )
	// 		),
	// 		'<span class="edit-link"><i class="fa fa-edit "></i>',
	// 		'</span>'
	// 	);
	// endif;
}
endif;