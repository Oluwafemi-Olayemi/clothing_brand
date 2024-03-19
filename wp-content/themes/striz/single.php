<?php
get_header(); ?>
    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">

                <?php
                /* Start the Loop */
                while (have_posts()) : the_post();

                    get_template_part('template-parts/post/content', get_post_format());

                    get_template_part('template-parts/common/author-bio', get_post_format());

                    $prev_link = xstriz_get_post_link('category', 'post')->previous_post;
                    $next_link = xstriz_get_post_link('category', 'post')->next_post;

                    if (!empty($prev_link) || !empty($next_link)):
                        ?>
                        <div class="navigation">
                            <?php if (!empty($prev_link)): ?>
                                <div class="previous-nav">
                                    <div class="nav-content">
                                        <?php if (has_post_thumbnail(xstriz_get_post_link('category', 'post')->previous)): ?>
                                            <div class="thumbnail-nav"><?php echo get_the_post_thumbnail(xstriz_get_post_link('category', 'post')->previous, 'thumbnail'); ?></div>
                                        <?php endif; ?>
                                        <div class="nav-link">
                                            <div class="nav-title"><?php esc_html_e('Previous Post', 'striz'); ?></div>
                                            <?php echo wp_kses_post($prev_link); ?>
                                        </div>
                                        <?php echo wp_kses_post($prev_link); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($next_link)): ?>
                                <div class="next-nav">
                                    <div class="nav-content">
                                        <div class="nav-link">
                                            <div class="nav-title"><?php esc_html_e('Next Post', 'striz'); ?></div>
                                            <?php echo wp_kses_post($next_link); ?>
                                        </div>
                                        <?php echo wp_kses_post($next_link); ?>
                                        <?php if (has_post_thumbnail(xstriz_get_post_link('category', 'post')->next)): ?>
                                            <div class="thumbnail-nav"><?php echo get_the_post_thumbnail(xstriz_get_post_link('category', 'post')->next, 'thumbnail'); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif;

                    if (is_active_sidebar('sidebar-single-post') || (!class_exists('XStreetCore') && is_active_sidebar('sidebar-blog'))) {
                        xstriz_fnc_related_post(2);
                    } else {
                        xstriz_fnc_related_post(3);
                    }
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;


                endwhile; // End of the loop.
                ?>

            </main> <!-- #main -->
        </div> <!-- #primary -->
        <?php get_sidebar(); ?>
    </div><!-- .wrap -->

<?php get_footer();
