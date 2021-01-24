<?php

/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_list_comments
 * @since 1.0.0
 * @version 1.0.0
 * @author bsquare
 */

function theone_comment_template( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
            ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            <p><?php esc_html__( 'Pingback:', 'theone' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'theone' ), '<span class="edit-link">', '</span>' ); ?></p>
            <?php
            break;
        default :
            global $post;
            ?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>" >
			<div class="vcard bio">
					<?php echo get_avatar( $comment, 70 ); ?>
				</div>

                   <div class="comment-body">
                   	<h3><?php echo get_comment_author(); ?></h3>
                     <div class="meta">
							<?php echo sprintf( esc_html__( '%1$s At %2$s', 'theone' ), get_comment_date(), get_comment_time()) ; ?></div>					
						   <?php comment_text(); ?>

							  <?php
								comment_reply_link( array_merge($args, array(
									'reply_text'		=> 'Reply',
									'depth'				=> $depth,
									'max_depth'			=> $args['max_depth'],
								))); 
							  ?>
							</div>
						 <div class="entry-comment ww">
                        <?php if ( '0' == $comment->comment_approved ) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html__( 'Your comment is awaiting moderation.', 'theone' ); ?></p>
                        <?php endif; ?>
                      
					   </div>
				<?php
	            break;
	    endswitch; 

}