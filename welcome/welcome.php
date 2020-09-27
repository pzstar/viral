<?php
if (!class_exists('Viral_Welcome')) :

    class Viral_Welcome {

        public $tab_sections = array();
        public $theme_name = ''; // For storing Theme Name
        public $theme_version = ''; // For Storing Theme Current Version Information
        public $free_plugins = array(); // For Storing the list of the Recommended Free Plugins

        /**
         * Constructor for the Welcome Screen
         */

        public function __construct() {

            /** Useful Variables */
            $theme = wp_get_theme();
            $this->theme_name = $theme->Name;
            $this->theme_version = $theme->Version;

            /** Define Tabs Sections */
            $this->tab_sections = array(
                'getting_started' => esc_html__('Getting Started', 'viral'),
                'recommended_plugins' => esc_html__('Recommended Plugins', 'viral'),
                'support' => esc_html__('Support', 'viral'),
                'free_vs_pro' => esc_html__('Free Vs Pro', 'viral')
            );

            /** List of Recommended Free Plugins */
            $this->free_plugins = array(
                'hashthemes-demo-importer' => array(
                    'name' => 'HashThemes Demo Importer',
                    'slug' => 'hashthemes-demo-importer',
                    'filename' => 'hashthemes-demo-importer',
                    'thumb_path' => 'https://ps.w.org/hashthemes-demo-importer/assets/icon-256x256.png'
                ),
                'elementor' => array(
                    'name' => 'Elementor',
                    'slug' => 'elementor',
                    'filename' => 'elementor',
                    'thumb_path' => 'https://ps.w.org/elementor/assets/icon-256x256.png'
                ),
                'hash-elements' => array(
                    'name' => 'Hash Elements',
                    'slug' => 'hash-elements',
                    'filename' => 'hash-elements',
                    'thumb_path' => 'https://ps.w.org/hash-elements/assets/icon-256x256.png'
                ),
                'wp-my-instagram' => array(
                    'name' => 'WP Instant Feeds',
                    'slug' => 'wp-my-instagram',
                    'filename' => 'wp-my-instagram',
                    'thumb_path' => 'https://ps.w.org/wp-my-instagram/assets/icon-256x256.jpg'
                ),
                'simple-floating-menu' => array(
                    'name' => 'Simple Floating Menu',
                    'slug' => 'simple-floating-menu',
                    'filename' => 'simple-floating-menu',
                    'thumb_path' => 'https://ps.w.org/simple-floating-menu/assets/icon-256x256.png'
                ),
                'jetsticky-for-elementor' => array(
                    'name' => 'JetSticky For Elementor',
                    'slug' => 'jetsticky-for-elementor',
                    'filename' => 'jetsticky-for-elementor',
                    'thumb_path' => 'https://ps.w.org/jetsticky-for-elementor/assets/icon-256x256.png'
                ),
            );

            /* Create a Welcome Page */
            add_action('admin_menu', array($this, 'welcome_register_menu'));

            /* Enqueue Styles & Scripts for Welcome Page */
            add_action('admin_enqueue_scripts', array($this, 'welcome_styles_and_scripts'));

            /* Adds Footer Rating Text */
            add_filter('admin_footer_text', array($this, 'admin_footer_text'));

            /* Hide Notice */
            add_filter('wp_loaded', array($this, 'hide_admin_notice'), 10);

            /* Create a Welcome Page */
            add_action('wp_loaded', array($this, 'admin_notice'), 20);

            add_action('after_switch_theme', array($this, 'erase_hide_notice'));

            add_action('wp_ajax_viral_activate_plugin', array($this, 'activate_plugin'));
        }

        /** Trigger Welcome Message Notification */
        public function admin_notice() {
            $hide_notice = get_option('viral_hide_notice');
            if (!$hide_notice) {
                add_action('admin_notices', array($this, 'admin_notice_content'));
            }
        }

        /** Welcome Message Notification */
        public function admin_notice_content() {
            $screen = get_current_screen();

            if ('appearance_page_viral-welcome' === $screen->id || (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) || 'theme-install' === $screen->id) {
                return;
            }

            $slug = $filename = 'hashthemes-demo-importer';
            ?>
            <div class="updated notice viral-welcome-notice">
                <div class="viral-welcome-notice-wrap">
                    <h2><?php esc_html_e('Congratulations!', 'viral'); ?></h2>
                    <p><?php printf(esc_html__('%1$s is now installed and ready to use. You can start either by importing the ready made demo or get started by customizing it your self.', 'viral'), $this->theme_name); ?></p>

                    <div class="viral-welcome-info">
                        <div class="viral-welcome-thumb">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.png'); ?>" alt="<?php echo esc_attr__('Viral Demo', 'viral'); ?>">
                        </div>

                        <?php
                        if ('appearance_page_hdi-demo-importer' !== $screen->id) {
                            ?>
                            <div class="viral-welcome-import">
                                <h3><?php esc_html_e('Import Demo', 'viral'); ?></h3>
                                <p><?php esc_html_e('Click below to install and active HashThemes Demo Importer Plugin.', 'viral'); ?></p>
                                <p><?php echo $this->generate_hdi_install_button(); ?></p>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="viral-welcome-getting-started">
                            <h3><?php esc_html_e('Get Started', 'viral'); ?></h3>
                            <p><?php printf(esc_html__('Here you will find all the necessary links and information on how to use %s.', 'viral'), $this->theme_name); ?></p>
                            <p><a href="<?php echo esc_url(admin_url('admin.php?page=viral-welcome')); ?>" class="button button-primary"><?php esc_html_e('Go to Setting Page', 'viral'); ?></a></p>
                        </div>
                    </div>

                    <a href="<?php echo wp_nonce_url(add_query_arg('viral_hide_notice', 1), 'viral_hide_notice_nonce', '_viral_notice_nonce'); ?>" class="notice-close"><?php esc_html_e('Dismiss', 'viral'); ?></a>
                </div>

            </div>
            <?php
        }

        /** Hide Admin Notice */
        public function hide_admin_notice() {
            if (isset($_GET['viral_hide_notice']) && isset($_GET['_viral_notice_nonce']) && current_user_can('manage_options')) {
                if (!wp_verify_nonce(wp_unslash($_GET['_viral_notice_nonce']), 'viral_hide_notice_nonce')) {
                    wp_die(esc_html__('Action Failed. Something is Wrong.', 'viral'));
                }

                update_option('viral_hide_notice', true);
            }
        }

        /** Register Menu for Welcome Page */
        public function welcome_register_menu() {
            add_menu_page(esc_html__('Welcome', 'viral'), sprintf(esc_html__('%s Settings', 'viral'), esc_html($this->theme_name)), 'manage_options', 'viral-welcome', array($this, 'welcome_screen'), '', 60);
        }

        /** Welcome Page */
        public function welcome_screen() {
            $tabs = $this->tab_sections;
            ?>
            <div class="welcome-wrap">
                <div class="welcome-main-content">
                    <?php require_once get_template_directory() . '/welcome/sections/header.php'; ?>

                    <div class="welcome-section-wrapper">
                        <?php $section = isset($_GET['section']) && array_key_exists($_GET['section'], $tabs) ? $_GET['section'] : 'getting_started'; ?>

                        <div class="welcome-section <?php echo esc_attr($section); ?> clearfix">
                            <?php require_once get_template_directory() . '/welcome/sections/' . $section . '.php'; ?>
                        </div>
                    </div>
                </div>

                <div class="welcome-footer-content">
                    <?php require_once get_template_directory() . '/welcome/sections/footer.php'; ?>
                </div>
            </div>
            <?php
        }

        /** Enqueue Necessary Styles and Scripts for the Welcome Page */
        public function welcome_styles_and_scripts($hook) {
            if ('theme-install.php' !== $hook) {
                $importer_params = array(
                    'installing_text' => esc_html__('Installing Demo Importer Plugin', 'viral'),
                    'activating_text' => esc_html__('Activating Demo Importer Plugin', 'viral'),
                    'importer_page' => esc_html__('Go to Demo Importer Page', 'viral'),
                    'importer_url' => admin_url('themes.php?page=hdi-demo-importer'),
                    'error' => esc_html__('Error! Reload the page and try again.', 'viral'),
                );
                wp_enqueue_style('viral-welcome', get_template_directory_uri() . '/welcome/css/welcome.css', array(), VIRAL_VERSION);
                wp_enqueue_script('viral-welcome', get_template_directory_uri() . '/welcome/js/welcome.js', array('plugin-install', 'updates'), VIRAL_VERSION, true);
                wp_localize_script('viral-welcome', 'importer_params', $importer_params);
            }
        }

        /* Check if plugin is installed */

        public function check_plugin_installed_state($slug, $filename) {
            return file_exists(ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php') ? true : false;
        }

        /* Check if plugin is activated */

        public function check_plugin_active_state($slug, $filename) {
            return is_plugin_active($slug . '/' . $filename . '.php') ? true : false;
        }

        /** Generate Url for the Plugin Button */
        public function plugin_generate_url($status, $slug, $file_name) {
            switch ($status) {
                case 'install':
                    return wp_nonce_url(add_query_arg(array(
                        'action' => 'install-plugin',
                        'plugin' => esc_attr($slug)
                                    ), network_admin_url('update.php')), 'install-plugin_' . esc_attr($slug));
                    break;

                case 'inactive':
                    return add_query_arg(array(
                        'action' => 'deactivate',
                        'plugin' => rawurlencode(esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                        'plugin_status' => 'all',
                        'paged' => '1',
                        '_wpnonce' => wp_create_nonce('deactivate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                            ), network_admin_url('plugins.php'));
                    break;

                case 'active':
                    return add_query_arg(array(
                        'action' => 'activate',
                        'plugin' => rawurlencode(esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                        'plugin_status' => 'all',
                        'paged' => '1',
                        '_wpnonce' => wp_create_nonce('activate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                            ), network_admin_url('plugins.php'));
                    break;
            }
        }

        /** Ajax Plugin Activation */
        public function activate_plugin() {
            $slug = isset($_POST['slug']) ? $_POST['slug'] : '';
            $file = isset($_POST['file']) ? $_POST['file'] : '';
            $success = false;

            if (!empty($slug) && !empty($file)) {
                $result = activate_plugin($slug . '/' . $file . '.php');
                update_option('viral_hide_notice', true);
                if (!is_wp_error($result)) {
                    $success = true;
                }
            }
            echo wp_json_encode(array('success' => $success));
            die();
        }

        /** Adds Footer Notes */
        public function admin_footer_text($text) {
            $screen = get_current_screen();

            if ('appearance_page_viral-welcome' == $screen->id) {
                $text = sprintf(esc_html__('Please leave us a %s rating if you like our theme . A huge thank you from HashThemes in advance!', 'viral'), '<a href="https://wordpress.org/support/theme/viral/reviews/?filter=5#new-post" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a>');
            }

            return $text;
        }

        /** Generate HashThemes Demo Importer Install Button Link */
        public function generate_hdi_install_button() {
            $slug = $filename = 'hashthemes-demo-importer';
            $import_url = '#';

            if ($this->check_plugin_installed_state($slug, $filename) && !$this->check_plugin_active_state($slug, $filename)) {
                $import_class = 'button button-primary viral-activate-plugin';
                $import_button_text = esc_html__('Activate Demo Importer Plugin', 'viral');
            } elseif ($this->check_plugin_installed_state($slug, $filename)) {
                $import_class = 'button button-primary';
                $import_button_text = esc_html__('Go to Demo Importer Page', 'viral');
                $import_url = admin_url('themes.php?page=hdi-demo-importer');
            } else {
                $import_class = 'button button-primary viral-install-plugin';
                $import_button_text = esc_html__('Install Demo Importer Plugin', 'viral');
            }
            return '<a data-slug="' . esc_attr($slug) . '" data-filename="' . esc_attr($filename) . '" class="' . esc_attr($import_class) . '" href="' . $import_url . '">' . esc_html($import_button_text) . '</a>';
        }

        /** Generate Plugin Thumb */
        public function plugin_thumb($plugin_slug) {
            if (empty($plugin_slug)) {
                return;
            }
            /** Generate a key that would hold the plugin image url  */
            $key = 'viral-' . $plugin_slug;

            /** Check transient. If it's there - use that, if not re fetch the theme */
            if (false === ( $image_url = get_transient($key) )) {
                $image_types = array('icon-256x256.png', 'icon-256x256.jpg', 'icon-128x128.png', 'icon-128x128.jpg');

                foreach ($image_types as $image_type) {
                    $image_url = 'https://ps.w.org/' . $plugin_slug . '/assets/' . $image_type;
                    if ($this->image_exist($image_url)) {
                        set_transient($key, $image_url, 60 * 60 * 24 * 30);
                        break;
                    }
                }
            }

            return $image_url;
        }

        /** Check for Available Image */
        public function image_exist($url = NULL) {
            if (!$url)
                return FALSE;

            $headers = get_headers($url);
            return stripos($headers[0], "200 OK") ? TRUE : FALSE;
        }

        public function erase_hide_notice() {
            delete_option('viral_hide_notice');
        }

    }

    new Viral_Welcome();

endif;
