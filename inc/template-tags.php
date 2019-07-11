<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Viral
 */

if ( ! function_exists( 'viral_pro_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function viral_pro_posted_on() {
	$time_string = '<span class="vl-month">%1$s</span><span class="vl-day">%2$s</span><span class="vl-year">%3$s</span>';

	$posted_on = sprintf( $time_string,
		esc_attr( get_the_date( 'M' ) ),
		esc_html( get_the_date( 'j' ) ),
		esc_html( get_the_date( 'Y' ) )
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'viral-pro' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	$comment_count = get_comments_number(); // get_comments_number returns only a numeric value


	if ( $comment_count == 0 ) {
		$comments = __('No <span>Comments</span>', 'viral-pro' );
	} elseif ( $comment_count > 1 ) {
		$comments = $comment_count . __(' <span>Comments</span>', 'viral-pro' );
	} else {
		$comments = __('1 <span>Comment</span>', 'viral-pro' );
	}
	$comment_link = '<a href="' . get_comments_link() .'">'. $comments.'</a>';

	echo '<span class="entry-date published updated">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>' . $comment_link; // WPCS: XSS OK.

}
endif;


if ( ! function_exists( 'viral_pro_post_date' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function viral_pro_post_date() {
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

	$posted_on =  $time_string;

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'viral-pro' ),
		'<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
	);

	echo '<div class="posted-on"><i class="fa fa-clock-o" aria-hidden="true"></i>' . $posted_on . '<span class="byline"> ' . $byline . '</span></div>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'viral_pro_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function viral_pro_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'viral-pro' ) );
		if ( $categories_list && viral_pro_categorized_blog() ) {
			printf( '<div class="cat-links"><i class="fa fa-bookmark"></i> ' . esc_html__( 'Posted in %1$s', 'viral-pro' ) . '</div>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'viral-pro' ) );
		if ( $tags_list ) {
			printf( '<div class="tags-links"><i class="fa fa-tag"></i> ' . esc_html__( 'Tagged %1$s', 'viral-pro' ) . '</div>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'viral-pro' ), esc_html__( '1 Comment', 'viral-pro' ), esc_html__( '% Comments', 'viral-pro' ) );
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'viral_pro_entry_category' ) ) :
/**
 * Prints HTML with meta information for the categories
 */
function viral_pro_entry_category() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'viral-pro' ) );
		if ( $categories_list && viral_pro_categorized_blog() ) {
			printf( $categories_list ); // WPCS: XSS OK.
		}
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function viral_pro_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'viral_pro_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'viral_pro_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so viral_pro_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so viral_pro_categorized_blog should return false.
		return false;
	}
}

if ( ! function_exists( 'viral_pro_social_share' ) ) :
/**
 * Prints HTML with social share
 */
function viral_pro_social_share(){
	global $post;
    $post_url = get_permalink();

	// Get current page title
	$post_title = str_replace( ' ', '%20', get_the_title());
	
	// Get Post Thumbnail for pinterest
	$post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

	// Construct sharing URL
	$twitterURL = 'https://twitter.com/intent/tweet?text='.$post_title.'&amp;url='.$post_url;
	$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$post_url;
	$googleURL = 'https://plus.google.com/share?url='.$post_url;
	$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$post_url.'&amp;media='.$post_thumbnail[0].'&amp;description='.$post_title;
    $mailURL = 'mailto:?Subject='.$post_title.'&amp;Body='.$post_url;

	$content = '<div class="vl-share-buttons">';
	$content .= '<span>'. __( 'SHARE', 'viral-pro' ) .'</span>';
    $content .= '<a title="'.__('Share on Facebook', 'viral-pro').'" href="'.$facebookURL.'" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
    $content .= '<a title="'.__('Share on Twitter', 'viral-pro').'" href="'. $twitterURL .'" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
	$content .= '<a title="'.__('Share on GooglePlus', 'viral-pro').'" href="'.$googleURL.'" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>';
	$content .= '<a title="'.__('Share on Pinterest', 'viral-pro').'" href="'.$pinterestURL.'" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>';
    $content .= '<a title="'.__('Email', 'viral-pro').'" href="'.$mailURL.'"><i class="fa fa-envelope" aria-hidden="true"></i></a>';
    $content .= '</div>';
    
    echo $content;
}
endif;

/**
 * Flush out the transients used in viral_pro_categorized_blog.
 */
function viral_pro_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'viral_pro_categories' );
}
add_action( 'edit_category', 'viral_pro_category_transient_flusher' );
add_action( 'save_post',     'viral_pro_category_transient_flusher' );
