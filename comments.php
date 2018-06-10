<?php

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area wow fadeInUp">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'violet' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>
<!-- printf( esc_html( _n( 'We deleted %d spam message.', 'We deleted %d spam messages.', $count, 'my-text-domain'  ) ), $count ); -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'violet' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'violet' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'violet' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'violet' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'violet' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'violet' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'violet' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->