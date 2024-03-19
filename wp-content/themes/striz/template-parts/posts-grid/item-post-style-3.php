<div class="column-item post-style-3">
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
            <div class="entry-content">
                <?php echo wp_trim_words(get_the_content(), 20); ?>
            </div>
            <div class="post-link">
                <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" target="_blank"><?php echo esc_html__('Read More', 'striz') ?></a>
            </div>
        </div>

    </div>
</div>