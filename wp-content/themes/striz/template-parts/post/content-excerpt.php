<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-inner">
        <div class="post-content">
            <header class="entry-header">

                <?php if ('post' === get_post_type() && !is_single()) : ?>
                    <div class="entry-meta">
                        <?php xstriz_posted_on(); ?>
                    </div>
                <?php endif; ?>

                <?php if (is_front_page() && !is_home()) {
                    // The excerpt is being displayed within a front page section, so it's a lower hierarchy than h2.
                    the_title(sprintf('<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>');
                } else {
                    the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
                } ?>

            </header><!-- .entry-header -->

            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
        </div>
    </div>
</article><!-- #post-## -->
