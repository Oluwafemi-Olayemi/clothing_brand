<?php
if (xstriz_is_woocommerce_activated()) {
    $account_link = get_permalink(get_option('woocommerce_myaccount_page_id'));
} else {
    $account_link = wp_login_url();
}
?>
<div class="site-header-account">
    <?php
        echo '<a href="' . esc_html($account_link) . '" title="' . esc_html__('Login', 'striz') . '"><span class="opal-icon-account"></span></a>';
    if (class_exists('XStreetCore') && xstriz_is_Woocommerce_activated()) {
    ?>
        <div class="account-dropdown">
            <div class="account-wrap">
                <div class="account-inner <?php if (is_user_logged_in()): echo "dashboard"; endif; ?>">
                    <?php if (!is_user_logged_in()) { ?>
                        <div class="login-form-head pb-1 mb-3 bb-so-1 bc">
                            <span class="login-form-title"><?php esc_attr_e('Sign in', 'striz') ?></span>
                            <span class="pull-right">
                                <a class="register-link" href="<?php echo esc_url( wp_registration_url()); ?>" title="<?php esc_attr_e('Register', 'striz'); ?>"><?php esc_attr_e('Create an Account', 'striz'); ?></a>
                            </span>
                        </div>
                        <form class="opal-login-form-ajax" data-toggle="validator">
                            <p>
                                <label><?php esc_attr_e('Username or email', 'striz'); ?> <span class="required">*</span></label>
                                <input name="username" type="text" required placeholder="<?php esc_attr_e('Username', 'striz') ?>">
                            </p>
                            <p>
                                <label><?php esc_attr_e('Password', 'striz'); ?> <span class="required">*</span></label>
                                <input name="password" type="password" required placeholder="<?php esc_attr_e('Password', 'striz') ?>">
                            </p>
                            <button type="submit" data-button-action class="btn btn-primary btn-block w-100 mt-1"><?php esc_html_e('Login', 'striz') ?></button>
                            <input type="hidden" name="action" value="osf_login">
                            <?php wp_nonce_field('ajax-osf-login-nonce', 'security-login'); ?>
                        </form>
                        <div class="login-form-bottom">
                            <a href="<?php echo wp_lostpassword_url(get_permalink()); ?>" class="mt-2 lostpass-link d-inline-block" title="<?php esc_attr_e('Lost your password?', 'striz'); ?>"><?php esc_attr_e('Lost your password?', 'striz'); ?></a>
                        </div>
                    <?php } else {
                         if (has_nav_menu('my-account')) : ?>
                            <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e('Dashboard', 'striz'); ?>">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'my-account',
                                    'menu_class'     => 'account-links-menu',
                                    'depth'          => 1,
                                ));
                                ?>
                            </nav><!-- .social-navigation -->
                        <?php else: ?>
                            <ul class="account-dashboard">
                                <?php if (xstriz_is_woocommerce_activated()): ?>
                                    <li>
                                        <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" title="<?php esc_attr_e('Dashboard', 'striz'); ?>"><?php esc_html_e('Dashboard', 'striz'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(wc_get_account_endpoint_url('orders')); ?>" title="<?php esc_attr_e('Orders', 'striz'); ?>"><?php esc_html_e('Orders', 'striz'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(wc_get_account_endpoint_url('downloads')); ?>" title="<?php esc_attr_e('Downloads', 'striz'); ?>"><?php esc_html_e('Downloads', 'striz'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(wc_get_account_endpoint_url('edit-address')); ?>" title="<?php esc_attr_e('Edit Address', 'striz'); ?>"><?php esc_html_e('Edit Address', 'striz'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(wc_get_account_endpoint_url('edit-account')); ?>" title="<?php esc_attr_e('Account Details', 'striz'); ?>"><?php esc_html_e('Account Details', 'striz'); ?></a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <a href="<?php echo esc_url(get_dashboard_url(get_current_user_id())); ?>" title="<?php esc_attr_e('Dashboard', 'striz'); ?>"><?php esc_html_e('Dashboard', 'striz'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <a title="<?php esc_attr_e('Log out', 'striz'); ?>" class="tips" href="<?php echo esc_url(wp_logout_url(home_url())); ?>"><?php esc_html_e('Log Out', 'striz'); ?></a>
                                </li>
                            </ul>
                        <?php endif;
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


