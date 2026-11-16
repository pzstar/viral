<?php
$viral_steps = $this->setup_steps();
$viral_done = count(wp_list_filter($viral_steps, array('done' => true)));
$viral_percent = round(100 * $viral_done / count($viral_steps));
?>
<div class="welcome-grid welcome-grid-start">
    <div class="welcome-card welcome-setup-checklist">
        <div class="welcome-setup-head">
            <div class="welcome-ring" style="--welcome-progress:<?php echo absint($viral_percent); ?>" role="progressbar" aria-valuemin="0" aria-valuemax="<?php echo count($viral_steps); ?>" aria-valuenow="<?php echo absint($viral_done); ?>" aria-label="<?php esc_attr_e('Setup progress', 'viral'); ?>">
                <span><?php echo absint($viral_percent); ?>%</span>
            </div>
            <div>
                <h3><?php esc_html_e('Set Up Your Website', 'viral'); ?></h3>
                <p class="welcome-setup-count"><?php /* translators: 1: steps done, 2: all steps */ printf(esc_html__('%1$d of %2$d done', 'viral'), $viral_done, count($viral_steps)); ?></p>
            </div>
        </div>

        <ol class="welcome-setup-steps">
            <?php foreach ($viral_steps as $viral_step) { ?>
                <li class="<?php echo $viral_step['done'] ? 'is-done' : 'is-todo'; ?>">
                    <span class="welcome-setup-mark dashicons <?php echo $viral_step['done'] ? 'dashicons-yes' : ''; ?>" aria-hidden="true"></span>
                    <div class="welcome-setup-text">
                        <strong><?php echo esc_html($viral_step['title']); ?></strong>
                        <span class="screen-reader-text"><?php echo $viral_step['done'] ? esc_html__('(done)', 'viral') : esc_html__('(to do)', 'viral'); ?></span>
                        <p><?php echo esc_html($viral_step['text']); ?></p>
                    </div>
                    <?php
                    if ($viral_step['url']) {
                        echo '<a class="button' . ($viral_step['done'] ? '' : ' button-primary') . '" href="' . esc_url($viral_step['url']) . '">' . ($viral_step['done'] ? esc_html__('Change', 'viral') : esc_html__('Set up', 'viral')) . '</a>';
                    } elseif (!$viral_step['done']) {
                        echo $this->generate_hdi_install_button();
                    }
                    ?>
                </li>
            <?php } ?>
        </ol>
    </div>

    <div class="welcome-card welcome-demo-import">
        <div class="welcome-demo-thumb">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.jpg'); ?>" alt="<?php /* translators: %s: theme name */ printf(esc_attr__('%s Demo', 'viral'), $this->theme_name); ?>">
            <a href="https://demo.hashthemes.com/viral/" target="_blank" class="welcome-demo-view"><span class="dashicons dashicons-external" aria-hidden="true"></span><?php esc_html_e('View Demo', 'viral'); ?></a>
        </div>
        <div class="welcome-card-body">
            <h3><?php esc_html_e('Start From a Demo', 'viral'); ?></h3>
            <p><?php esc_html_e('Import a complete demo website, with its content and settings, in a single click, then replace the content with your own.', 'viral'); ?></p>
            <?php echo $this->generate_hdi_install_button(); ?>
            <p class="welcome-small"><a href="https://hashthemes.com/documentation/viral-documentation/#ImportDemoContent" target="_blank"><?php esc_html_e('How the demo importer works', 'viral'); ?></a></p>
        </div>
    </div>
</div>

<div class="welcome-block">
    <div class="welcome-block-head">
        <h3><?php esc_html_e('Customize Your Site', 'viral'); ?></h3>
        <a href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php esc_html_e('Open the Customizer', 'viral'); ?> <span aria-hidden="true">&rarr;</span></a>
    </div>
    <div class="welcome-quick-links">
        <?php foreach ($this->quick_links() as $viral_link) { ?>
            <a class="welcome-quick-link" href="<?php echo esc_url($viral_link['url']); ?>">
                <span class="dashicons <?php echo esc_attr($viral_link['icon']); ?>" aria-hidden="true"></span>
                <?php echo esc_html($viral_link['label']); ?>
            </a>
        <?php } ?>
    </div>
</div>

<div class="welcome-block">
    <div class="welcome-block-head">
        <h3><?php esc_html_e('Build Your Front Page', 'viral'); ?></h3>
        <a href="https://hashthemes.com/documentation/viral-documentation/#HomePageSetup" target="_blank"><?php esc_html_e('Step-by-step guide', 'viral'); ?> <span aria-hidden="true">&rarr;</span></a>
    </div>
    <p class="welcome-block-intro"><?php echo esc_html__('Build the front page from the theme\'s ready-made news sections in the Customizer, or design it freely with Elementor.', 'viral'); ?></p>

    <div class="welcome-grid welcome-grid-2">
        <div class="welcome-card welcome-method">
            <span class="welcome-method-icon dashicons dashicons-admin-customizer" aria-hidden="true"></span>
            <h4><?php esc_html_e('With the Customizer', 'viral'); ?></h4>
            <ol>
                <li><?php echo sprintf(esc_html__('Go to Appearance > Customize > %s.', 'viral'), '<a href="' . esc_url(admin_url('customize.php?autofocus[section]=static_front_page')) . '">' . esc_html__('Homepage Settings', 'viral') . '</a>'); ?></li>
                <li><?php echo esc_html__('Turn on "Enable FrontPage".', 'viral'); ?></li>
                <li><?php echo esc_html__('Go back, open "Front Page Sections" and fill in the sections you want to show.', 'viral'); ?></li>
            </ol>
        </div>

        <div class="welcome-card welcome-method">
            <span class="welcome-method-icon dashicons dashicons-layout" aria-hidden="true"></span>
            <h4><?php esc_html_e('With Elementor', 'viral'); ?></h4>
            <ol>
                <li><?php printf(esc_html__('Install Elementor from Plugins > Add New, then Hash Elements from the %s.', 'viral'), '<a href="' . esc_url(admin_url('admin.php?page=viral-welcome&section=recommended_plugins')) . '">' . esc_html__('Recommended Plugins tab', 'viral') . '</a>'); ?></li>
                <li><?php echo esc_html__('Create a new page, edit it with Elementor and drag in the news widgets to design your front page.', 'viral'); ?></li>
                <li><?php echo sprintf(esc_html__('In Appearance > Customize > %s, choose "A static page", select your new page as the Homepage and turn off "Enable FrontPage".', 'viral'), '<a href="' . esc_url(admin_url('customize.php?autofocus[section]=static_front_page')) . '">' . esc_html__('Homepage Settings', 'viral') . '</a>'); ?></li>
            </ol>
        </div>
    </div>
</div>
