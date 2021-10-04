<div class="welcome-getting-started">
    <div class="welcome-manual-setup">
        <h3><?php echo esc_html__('Manual Setup', 'viral'); ?></h3>
        <!--
        <div class="welcome-theme-thumb">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/set-front-page.gif'); ?>" alt="<?php echo esc_attr__('Viral Demo', 'viral'); ?>">
        </div> -->
        <p><?php echo esc_html__('You can setup the home page sections either from Customizer Panel or from Elementor Pagebuilder', 'viral'); ?></p>
        <p><strong><?php echo esc_html__('FROM CUSTOMIZER', 'viral'); ?></strong></p>
        <ol>
            <li><?php echo esc_html__('Go to Appearance > Customize', 'viral'); ?></li>
            <li><?php echo sprintf(esc_html__('Click on "%s" and turn on the option for "Enable FrontPage" Setting', 'viral'), '<a href="' . admin_url('customize.php?autofocus[section]=static_front_page') . '" target="_blank">' . esc_html__('Homepage Settings', 'viral') . '</a>'); ?> </li>
            <li><?php echo esc_html__('Now go back and click on "Front Page Sections" and set up the FrontPage Section', 'viral'); ?> </li>
        </ol>
        <p><strong><?php echo esc_html__('FROM ELEMENTOR', 'viral'); ?></strong></p>
        <ol>
            <li><?php printf(esc_html__('Firstly install and activate "Elementor" and "Hash Elements" plugin from %s.', 'viral'), '<a href="' . admin_url('admin.php?page=viral-welcome&section=recommended_plugins') . '" target="_blank">' . esc_html__('Recommended Plugin page', 'viral') . '</a>'); ?></li>
            <li><?php echo esc_html__('Create a new page and edit with Elementor. Drag and drop the news elements in the Elementor to create your own design.', 'viral'); ?></li>
            <li><?php echo esc_html__('Now go to Appearance > Customize > Homepage Settings and choose "A static page" for "Your latest posts" and select the created page for "Home Page" option.', 'viral'); ?> </li>
        </ol>
        <p style="margin-bottom: 0"><?php printf(esc_html__('For detailed documentation, please visit %s.', 'viral'), '<a href="https://hashthemes.com/documentation/viral-documentation/#HomePageSetup" target="_blank">' . esc_html__('Documentation Page', 'viral') . '</a>'); ?></p>
    </div>

    <div class="welcome-demo-import">
        <h3><?php echo esc_html__('Demo Importer', 'viral'); ?><a href="https://demo.hashthemes.com/<?php echo get_option('stylesheet'); ?>" target="_blank" class="button button-primary"><?php esc_html_e('View Demo', 'viral'); ?></a></h3>
        <div class="welcome-theme-thumb">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.jpg'); ?>" alt="<?php printf(esc_attr__('%s Demo', 'viral'), $this->theme_name); ?>">
        </div>

        <div class="welcome-demo-import-text">
            <p><?php esc_html_e('Or you can get started by importing the demo with just one click.', 'viral'); ?></p>
            <p><?php echo sprintf(esc_html__('Click on the button below to install and activate the HashThemes Demo Importer plugin. For more detailed documentation on how the demo importer works, click %s.', 'viral'), '<a href="https://hashthemes.com/documentation/viral-documentation/#ImportDemoContent" target="_blank">' . esc_html__('here', 'viral') . '</a>'); ?></p>
            <?php echo $this->generate_hdi_install_button(); ?>
        </div>
    </div>
</div>