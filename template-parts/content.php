<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package violet
 */

?>
<!--blog post-->
<article class="post wow fadeInUp">
    <div class="featured-content text-center">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('violet-thumbnail'); ?></a>
    </div>
    <div class="post-title-wrap text-center">
        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
        <p><a href="<?php the_permalink(); ?>"><?php the_time('F j, Y'); ?></a> | <?php the_author_posts_link(); ?></p>
    </div>
    <div class="entry-content text-justify">
        <?php the_excerpt(); ?>              
    </div>
    <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'violet' ),
            'after'  => '</div>',
        ) );
    ?>
</article>