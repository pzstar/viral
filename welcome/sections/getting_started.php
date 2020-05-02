<div class="welcome-getting-started">
    <div class="welcome-manual-setup">
        <h3><?php echo esc_html__('Manual Setup from Customizer Panel', 'viral'); ?></h3>
        <div class="welcome-theme-thumb">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/set-front-page.gif'); ?>" alt="<?php echo esc_html__('Viral Demo', 'viral'); ?>">
        </div>

        <ol>
            <li><?php echo esc_html__('Go to Appearance > Customize', 'viral'); ?></li>
            <li><?php echo esc_html__('Click on "Homepage Settings" and turn on the option for "Enable FrontPage" Setting', 'viral'); ?> </li>
            <li><?php echo esc_html__('Now go back and click on "Front Page Sections" and set up the FrontPage Section', 'viral'); ?> </li>
        </ol>
        <a class="button button-primary" href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php echo esc_html__('Go to Customizer Panels', 'viral'); ?></a>
    </div>

    <div class="welcome-demo-import">
        <h3><?php echo esc_html__('Demo Importer', 'viral'); ?><a href="https://demo.hashthemes.com/<?php echo get_option('stylesheet'); ?>" target="_blank" class="button button-primary"><?php esc_html_e('View Demo', 'viral'); ?></a></h3>
        <div class="welcome-theme-thumb">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.png'); ?>" alt="<?php printf(esc_html__('%s Demo', 'viral'), $this->theme_name); ?>">
        </div>

        <div class="welcome-demo-import-text">
            <p><?php esc_html_e('Or you can get started by importing the demo with just one click.', 'viral'); ?></p>
            <p><?php echo sprintf(esc_html__('Click on the button below to install and activate the HashThemes Demo Importer plugin. For more detailed documentation on how the demo importer works, click %s.', 'viral'), '<a href="https://hashthemes.com/documentation/viral-documentation/#ImportDemoContent" target="_blank">' . esc_html__('here', 'viral') . '</a>'); ?></p>
            <?php echo $this->generate_hdi_install_button(); ?>
        </div>
    </div>
</div>