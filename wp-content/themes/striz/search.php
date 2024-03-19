<?php
get_header(); ?>
    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <?php
                if (have_posts()) :
                    /* Start the Loop */
                    ?>
                    <div class="row"
                         data-opal-columns="<?php echo is_active_sidebar('sidebar-blog') ? esc_html('2') : esc_html('3'); ?>">
                        <?php
                        while (have_posts()) : the_post();

                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part('template-parts/posts-grid/item-post-style', '1');

                        endwhile; // End of the loop.
                        ?>
                    </div>
                    <?php
                    the_posts_pagination(array(
                        'prev_text'          => '<span class="fa fa-angle-left"></span><span class="screen-reader-text">' . esc_html__('Previous', 'striz') . '</span>',
                        'next_text'          => '<span class="screen-reader-text">' . esc_html__('Next', 'striz') . '</span><span class="fa fa-angle-right"></span>',
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__('Page', 'striz') . ' </span>',
                    ));
                else : ?>
                    <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'striz'); ?></p>
                    <?php
                    get_search_form();
                endif;
                ?>

            </main><!-- #main -->
        </div><!-- #primary -->
        <?php get_sidebar(); ?>
    </div><!-- .wrap -->

<?php get_footer();
