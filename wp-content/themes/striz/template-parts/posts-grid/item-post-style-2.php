<div class="column-item post-style-2">
    <div class="post-inner">
        <?php if (has_post_thumbnail() && '' !== get_the_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('striz-featured-image-large'); ?>
                </a>
                <span class="posted-on"> <?php echo xstriz_time_link() ?> </span>
            </div><!-- .post-thumbnail -->
        <?php endif; ?>
        <div class="post-content">
            <div class="entry-meta ">
                <div class="entry-meta-inner ">
                    <?php xstriz_posted_on(); ?>
                </div>
            </div>
            <div class="entry-header">
                <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </div>
        </div>
    </div>
</div>