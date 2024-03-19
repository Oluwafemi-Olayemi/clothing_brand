<?php
get_header('404'); ?>
    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <?php if (get_theme_mod('osf_page_404_page_enable') != 'default' && !empty(get_theme_mod('osf_page_404_page_custom'))): ?>
                    <?php $query = new WP_Query('page_id=' . get_theme_mod('osf_page_404_page_custom'));
                    if ($query->have_posts()):
                        while ($query->have_posts()) : $query->the_post();
                            the_content();
                        endwhile;
                    endif; ?>
                <?php else: ?>
                    <section class="error-404 not-found">
                        <div class="page-content">
                            <div class="error-404-title">
                                <h1 class="p-0 m-0"><?php esc_html_e('404', 'striz'); ?></h1>
                                <div class="error-404-subtitle">
                                    <h2 class="p-0 m-0"><?php esc_html_e('Oops, that link is broken.', 'striz'); ?></h2>
                                </div>
                            </div>
                            <div class="error-text">
                                <?php esc_html_e('Page doesn’t exist or some other error occured. Go to our', 'striz'); ?>
                                <br>
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="return-homepage"><?php esc_html_e('Home page', 'striz'); ?></a>
                                <?php esc_html_e('or go back to', 'striz'); ?>
                                <a href="javascript: history.go(-1)" class="go-back"><?php esc_html_e('Previous page', 'striz'); ?></a>
                            </div>
                        </div>
                    </section><!-- .error-404 -->
                <?php endif; ?>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();
