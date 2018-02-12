

<article class="post wow fadeInUp">
    <div class="featured-content text-center">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
    </div>
    <div class="post-title-wrap text-center">
        <h3><?php the_title(); ?></h3>
        <p><?php the_time('F j, Y'); ?> | Posted by <?php the_author_posts_link(); ?></p>
    </div>
    <div class="entry-content text-justify">
        <?php the_content(); ?>                        
    </div>
    <div class="post-tag"><?php the_tags(); ?></div>
</article>
