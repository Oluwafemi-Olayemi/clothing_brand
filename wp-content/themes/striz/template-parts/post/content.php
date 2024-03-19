<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="post-inner">

        <?php if ('' !== get_the_post_thumbnail()) : ?>
            <div class="post-thumbnail">

                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('striz-featured-image-full'); ?>
                </a>
                <?php

                if (!is_single()) { ?>
                    <span class="posted-on"> <?php echo xstriz_time_link() ?> </span>
                <?php } ?>
            </div><!-- .post-thumbnail -->
        <?php endif; ?>
        <?php if (!is_single()): ?>
        <div class="post-content">
            <?php endif; ?>
            <header class="entry-header">

                <?php if ('post' === get_post_type()) : ?>
                    <div class="entry-meta">
                        <?php xstriz_posted_on(); ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>

                <?php

                if (is_single()) {
                } elseif (is_front_page() && is_home()) {
                    the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
                } else {
                    the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                }
                ?>
            </header><!-- .entry-header -->
        <?php if (is_single()): ?>
        <div class="post-content">
            <?php endif; ?>
            <div class="entry-content">
                <div class="content-boxed">
                    <?php
                    /* translators: %s: Name of current post */
                    the_content(sprintf(
                        __('Read more<span class="screen-reader-text"> "%s"</span>', 'striz'),
                        get_the_title()
                    ));
                        wp_link_pages(array(
                            'before'      => '<div class="page-links">' . esc_html__('Pages:', 'striz'),
                            'after'       => '</div>',
                            'link_before' => '<span class="page-number">',
                            'link_after'  => '</span>',
                        ));

                        ?>
                    </div>

                </div><!-- .entry-content -->

            </div><!-- .post-content -->

            <?php
            if (is_single()) {
                xstriz_entry_footer();
                xstriz_social_share();
            }
            ?>
        </div>

</article><!-- #post-## -->