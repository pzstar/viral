<?php

$image_path_url = get_template_directory_uri() . '/images/';

$wp_customize->get_setting('blogname')->transport = 'postMessage';
$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
$wp_customize->get_setting('custom_logo')->transport = 'refresh';

$viral_pro_features = '<ul class="upsell-features">
	<li>' . esc_html__("13 more demos that can be imported with one click", "viral") . '</li>
        <li>' . esc_html__("Elementor compatible - Built your Home Page with Customizer or Elementor whichever you like", "viral") . '</li>
	<li>' . esc_html__("50+ magazine blocks for customizer", "viral") . '</li>
	<li>' . esc_html__("Customizer home page section reorder", "viral") . '</li>
	<li>' . esc_html__("45+ magazine widgets for Elementor", "viral") . '</li>
        <li>' . esc_html__("Ajax Tabs and Ajax Paginations for all Elementor widgets", "viral") . '</li>
	<li>' . esc_html__("7 differently designed Blog/Archive layouts", "viral") . '</li>
	<li>' . esc_html__("7 differently designed Single Article/Post layouts", "viral") . '</li>
	<li>' . esc_html__("22 custom widgets", "viral") . '</li>
	<li>' . esc_html__("GDPR compliance & cookies consent", "viral") . '</li>
	<li>' . esc_html__("Multiple header layouts and settings", "viral") . '</li>
	<li>' . esc_html__("In-built megaMenu", "viral") . '</li>
	<li>' . esc_html__("Advanced typography options", "viral") . '</li>
	<li>' . esc_html__("Advanced color options", "viral") . '</li>
	<li>' . esc_html__("Preloader option", "viral") . '</li>
	<li>' . esc_html__("Sidebar layout options", "viral") . '</li>
	<li>' . esc_html__("Website layout (fullwidth or boxed)", "viral") . '</li>
	<li>' . esc_html__("Advanced blog & article settings", "viral") . '</li>
	<li>' . esc_html__("Advanced footer setting", "viral") . '</li>
	<li>' . esc_html__("Advanced advertising & monetization options", "viral") . '</li>
	<li>' . esc_html__("Blog single page - Author Box, Social Share and Related Post", "viral") . '</li>
	<li>' . esc_html__("WooCommerce compatible", "viral") . '</li>
	<li>' . esc_html__("Fully multilingual and translation ready", "viral") . '</li>
	<li>' . esc_html__("Fully RTL(right to left) languages compatible", "viral") . '</li>
        <li>' . esc_html__("Maintenance mode option", "viral") . '</li>
        <li>' . esc_html__("Remove footer credit text", "viral") . '</li>
	</ul>
	<a class="ht-implink" href="' . admin_url('admin.php?page=viral-welcome&section=free_vs_pro') . '" target="_blank">' . esc_html__("Comparision - Free Vs Pro", "viral") . '</a>';

// Register sections.
$wp_customize->add_section(new Viral_Upgrade_Section($wp_customize, 'viral-pro-section', array(
    'priority' => 0,
    //'title' => esc_html__('Christmas & New Year Deal. Use Coupon Code: HOLIDAY', 'viral'),
    'upgrade_text' => esc_html__('Upgrade to Pro', 'viral'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/?utm_source=wordpress&utm_medium=viral-customizer-button&utm_campaign=viral-upgrade',
)));

$wp_customize->add_section(new Viral_Upgrade_Section($wp_customize, 'viral-doc-section', array(
    'title' => esc_html__('Documentation', 'viral'),
    'priority' => 1000,
    'upgrade_text' => esc_html__('View', 'viral'),
    'upgrade_url' => 'https://hashthemes.com/documentation/viral-documentation/'
)));

$wp_customize->add_section(new Viral_Upgrade_Section($wp_customize, 'viral-demo-import-section', array(
    'title' => esc_html__('Import Demo Content', 'viral'),
    'priority' => 999,
    'upgrade_text' => esc_html__('Import', 'viral'),
    'upgrade_url' => admin_url('admin.php?page=viral-welcome')
)));

/* ============HOMEPAGE SETTINGS PANEL============ */
$wp_customize->add_setting('viral_enable_frontpage', array(
    'sanitize_callback' => 'viral_sanitize_checkbox'
));

$wp_customize->add_control(new Viral_Toggle_Control($wp_customize, 'viral_enable_frontpage', array(
    'section' => 'static_front_page',
    'label' => esc_html__('Enable FrontPage', 'viral'),
    'description' => sprintf(esc_html__('Overwrites the homepage displays setting and shows the frontpage for Customizer %s', 'viral'), '<a href="javascript:wp.customize.panel(\'viral_front_page_panel\').focus()">' . esc_html__('Front Page Sections', 'viral') . '</a>') . '<br/><br/>' . esc_html__('Do not enable this option if you want to use Elementor in home page.', 'viral')
)));

/* ============GENERAL SETTINGS PANEL============ */
$wp_customize->add_panel('viral_general_settings_panel', array(
    'title' => esc_html__('General Settings', 'viral'),
    'priority' => 2
));

$wp_customize->get_section('static_front_page')->priority = 1;
$wp_customize->get_section('title_tagline')->panel = 'viral_header_setting_panel';
$wp_customize->get_section('title_tagline')->title = esc_html__('Logo & Favicon', 'viral');
$wp_customize->get_control('header_text')->label = esc_html__('Display Site Title and Tagline(Only Displays if Logo is Removed)', 'viral');
$wp_customize->get_section('colors')->title = esc_html__('Color Settings', 'viral');
$wp_customize->get_section('colors')->priority = 15;

//MOVE BACKGROUND AND COLOR SETTING INTO GENERAL SETTING PANEL
$wp_customize->get_control('background_color')->section = 'viral_website_layout_sec';
$wp_customize->get_control('background_image')->section = 'viral_website_layout_sec';
$wp_customize->get_control('background_preset')->section = 'viral_website_layout_sec';
$wp_customize->get_control('background_position')->section = 'viral_website_layout_sec';
$wp_customize->get_control('background_size')->section = 'viral_website_layout_sec';
$wp_customize->get_control('background_repeat')->section = 'viral_website_layout_sec';
$wp_customize->get_control('background_attachment')->section = 'viral_website_layout_sec';

$wp_customize->get_control('background_color')->priority = 20;
$wp_customize->get_control('background_image')->priority = 20;
$wp_customize->get_control('background_preset')->priority = 20;
$wp_customize->get_control('background_position')->priority = 20;
$wp_customize->get_control('background_size')->priority = 20;
$wp_customize->get_control('background_repeat')->priority = 20;
$wp_customize->get_control('background_attachment')->priority = 20;

$wp_customize->add_section('viral_website_layout_sec', array(
    'title' => esc_html__('Website Layout', 'viral'),
    'panel' => 'viral_general_settings_panel'
));

$wp_customize->add_setting('viral_website_layout', array(
    'default' => 'fullwidth',
    'sanitize_callback' => 'viral_sanitize_choices'
));

$wp_customize->add_control('viral_website_layout', array(
    'type' => 'radio',
    'settings' => 'viral_website_layout',
    'section' => 'viral_website_layout_sec',
    'label' => esc_html__('Choose the Layout', 'viral'),
    'choices' => array(
        'fullwidth' => esc_html__('Full Width', 'viral'),
        'boxed' => esc_html__('Boxed', 'viral'),
    )));

$wp_customize->add_setting('viral_background_heading', array(
    'sanitize_callback' => 'viral_sanitize_text',
));

$wp_customize->add_control(new Viral_Heading_Control($wp_customize, 'viral_background_heading', array(
    'section' => 'viral_website_layout_sec',
    'label' => esc_html__('Background', 'viral'),
)));

$wp_customize->add_setting('viral_web_layout_upgrade_text', array(
    'sanitize_callback' => 'viral_sanitize_text'
));

$wp_customize->add_control(new Viral_Upgrade_Info_Control($wp_customize, 'viral_web_layout_upgrade_text', array(
    'section' => 'viral_website_layout_sec',
    'label' => esc_html__('For more options,', 'viral'),
    'choices' => array(
        esc_html__('Fuild Layout', 'viral'),
        esc_html__('Set custom container & sidebar width', 'viral'),
        esc_html__('16+ animated preloaders', 'viral'),
        esc_html__('Admin page custom logo', 'viral'),
        esc_html__('Show/Hide Back to Top button with advanced settings', 'viral')
    ),
    'priority' => 100,
    'upgrade_text' => esc_html__('Upgrade to Pro', 'viral'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/?utm_source=wordpress&utm_medium=viral-link&utm_campaign=viral-upgrade',
    'active_callback' => 'viral_is_upgrade_notice_active'
)));

/* GOOGLE FONT SECTION */
$wp_customize->add_section('viral_google_font_section', array(
    'title' => esc_html__('Google Fonts', 'viral'),
    'panel' => 'viral_general_settings_panel',
    'priority' => 1000
));

$wp_customize->add_setting('viral_load_google_font_locally', array(
    'sanitize_callback' => 'viral_sanitize_checkbox',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Toggle_Control($wp_customize, 'viral_load_google_font_locally', array(
    'section' => 'viral_google_font_section',
    'label' => esc_html__('Load Google Fonts Locally', 'viral'),
    'description' => esc_html__('It is required to load the Google Fonts locally in order to comply with GDPR. However, if your website is not required to comply with GDPR then you can check this field off. Loading the Fonts locally with lots of different Google fonts can decrease the speed of the website slightly.', 'viral'),
)));

/* SEO SECTION */
$wp_customize->add_section('viral_seo_section', array(
    'title' => esc_html__('SEO', 'viral'),
    'panel' => 'viral_general_settings_panel',
    'priority' => 1000
));

$wp_customize->add_setting('viral_schema_markup', array(
    'sanitize_callback' => 'viral_sanitize_checkbox',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Toggle_Control($wp_customize, 'viral_schema_markup', array(
    'section' => 'viral_seo_section',
    'label' => esc_html__('Schema.org Markup', 'viral'),
    'description' => esc_html__('Enable Schema.org markup feature for your site. You can disable this option if if you use a SEO plugin.', 'viral'),
)));

$wp_customize->add_setting('viral_title_tagline_upgrade_text', array(
    'sanitize_callback' => 'viral_sanitize_text'
));

$wp_customize->add_control(new Viral_Upgrade_Info_Control($wp_customize, 'viral_title_tagline_upgrade_text', array(
    'section' => 'title_tagline',
    'label' => esc_html__('For more options,', 'viral'),
    'choices' => array(
        esc_html__('Show/Hide title & tagline seperately', 'viral'),
        esc_html__('Set title/tagline position', 'viral'),
        esc_html__('Set logo height and top/bottom spacing', 'viral'),
        esc_html__('Set title & tagline typography individually', 'viral'),
    ),
    'priority' => 100,
    'upgrade_text' => esc_html__('Upgrade to Pro', 'viral'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/?utm_source=wordpress&utm_medium=viral-link&utm_campaign=viral-upgrade',
    'active_callback' => 'viral_is_upgrade_notice_active'
)));

/* ============COLOR SETTING============ */
$wp_customize->add_setting('viral_template_color', array(
    'default' => '#0078af',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_template_color', array(
    'section' => 'colors',
    'label' => esc_html__('Template Color', 'viral')
)));

$wp_customize->add_setting('viral_color_upgrade_text', array(
    'sanitize_callback' => 'viral_sanitize_text'
));

$wp_customize->add_control(new Viral_Upgrade_Info_Control($wp_customize, 'viral_color_upgrade_text', array(
    'section' => 'colors',
    'label' => esc_html__('For more color settings,', 'viral'),
    'choices' => array(
        esc_html__('Content text color', 'viral'),
        esc_html__('Content link & link hover color', 'viral'),
        esc_html__('Category tags color for front page blocks', 'viral'),
    ),
    'priority' => 100,
    'upgrade_text' => esc_html__('Upgrade to Pro', 'viral'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/?utm_source=wordpress&utm_medium=viral-link&utm_campaign=viral-upgrade',
    'active_callback' => 'viral_is_upgrade_notice_active'
)));

/* ============TYPOGRAPHY SETTING ============ */
$wp_customize->add_panel('viral_typography_panel', array(
    'priority' => 10,
    'title' => esc_html__('Typography Settings', 'viral')
));

// Add the body typography section.
$wp_customize->add_section('viral_body_typography_section', array(
    'panel' => 'viral_typography_panel',
    'title' => esc_html__('Body', 'viral')
));

$wp_customize->add_setting('viral_body_typography', array(
    'default' => 'Roboto',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('viral_body_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('viral_body_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('viral_body_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('viral_body_size', array(
    'default' => '16',
    'sanitize_callback' => 'absint',
));

$wp_customize->add_setting('viral_body_line_height', array(
    'default' => '1.8',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('viral_body_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('viral_body_color', array(
    'default' => '#444444',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new Viral_Typography_Control($wp_customize, 'viral_body_typo', array(
    'label' => esc_html__('Body Typography', 'viral'),
    'description' => __('Select how you want your body to appear.', 'viral'),
    'section' => 'viral_body_typography_section',
    'settings' => array(
        'family' => 'viral_body_typography',
        'style' => 'viral_body_style',
        'text_decoration' => 'viral_body_text_decoration',
        'text_transform' => 'viral_body_text_transform',
        'size' => 'viral_body_size',
        'line_height' => 'viral_body_line_height',
        'letter_spacing' => 'viral_body_letter_spacing',
        'color' => 'viral_body_color'
    ),
    'input_attrs' => array(
        'min' => 10,
        'max' => 40,
        'step' => 1
    )
)));

// Add Header typography section.
$wp_customize->add_section('viral_header_typography_section', array(
    'panel' => 'viral_typography_panel',
    'title' => esc_html__('Header', 'viral')
));

// Add H typography section.
$wp_customize->add_setting('viral_header_typography', array(
    'default' => 'Roboto Condensed',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('viral_header_style', array(
    'default' => '700',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('viral_header_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('viral_header_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('viral_header_line_height', array(
    'default' => '1.2',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('viral_header_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control(new Viral_Typography_Control($wp_customize, 'viral_header_typo', array(
    'label' => esc_html__('Header Typography', 'viral'),
    'description' => __('Select how you want your Header to appear.', 'viral'),
    'section' => 'viral_header_typography_section',
    'settings' => array(
        'family' => 'viral_header_typography',
        'style' => 'viral_header_style',
        'text_decoration' => 'viral_header_text_decoration',
        'text_transform' => 'viral_header_text_transform',
        'line_height' => 'viral_header_line_height',
        'letter_spacing' => 'viral_header_letter_spacing'
    ),
    'input_attrs' => array(
        'min' => 10,
        'max' => 100,
        'step' => 1
    )
)));

// Add Menu typography section.
$wp_customize->add_section('viral_menu_typography_section', array(
    'panel' => 'viral_typography_panel',
    'title' => esc_html__('Menu', 'viral')
));

// Add Menu typography section.
$wp_customize->add_setting('viral_menu_typography', array(
    'default' => 'Roboto',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('viral_menu_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('viral_menu_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('viral_menu_text_transform', array(
    'default' => 'uppercase',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('viral_menu_size', array(
    'default' => '15',
    'sanitize_callback' => 'absint',
));

$wp_customize->add_setting('viral_menu_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control(new Viral_Typography_Control($wp_customize, 'viral_menu_typo', array(
    'label' => esc_html__('Menu Typography', 'viral'),
    'description' => __('Select how you want your menu to appear.', 'viral'),
    'section' => 'viral_menu_typography_section',
    'settings' => array(
        'family' => 'viral_menu_typography',
        'style' => 'viral_menu_style',
        'text_decoration' => 'viral_menu_text_decoration',
        'text_transform' => 'viral_menu_text_transform',
        'size' => 'viral_menu_size',
        'letter_spacing' => 'viral_menu_letter_spacing'
    ),
    'input_attrs' => array(
        'min' => 10,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('viral_typography_upgrade_text', array(
    'sanitize_callback' => 'viral_sanitize_text'
));

$wp_customize->add_control(new Viral_Upgrade_Info_Control($wp_customize, 'viral_typography_upgrade_text', array(
    'section' => 'viral_typography_section',
    'label' => esc_html__('For more fonts and settings,', 'viral'),
    'choices' => array(
        esc_html__('800+ Google fonts', 'viral'),
        esc_html__('Seperate Typography settings for Menu, Header Titles(H1, H2, H3, H4, H5, H6), Page Title, Block Title, Widget Title and other', 'viral'),
        esc_html__('More advanced Typography options like font family, font weight, text transform, text dectoration, font size, line height, letter spacing', 'viral')
    ),
    'priority' => 100,
    'upgrade_text' => esc_html__('Upgrade to Pro', 'viral'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/?utm_source=wordpress&utm_medium=viral-link&utm_campaign=viral-upgrade',
    'active_callback' => 'viral_is_upgrade_notice_active'
)));

$wp_customize->add_section(new Viral_Upgrade_Section($wp_customize, 'viral-hcfu-section', array(
    'title' => esc_html__('Want To Use Custom Fonts?', 'viral'),
    'panel' => 'viral_typography_panel',
    'priority' => 1000,
    'class' => 'ht--boxed',
    'options' => array(
        esc_html__('Upload custom fonts. The uploaded font will display in the typography font family list.', 'viral'),
    ),
    'upgrade_text' => esc_html__('Purchase Custom Font Uploader', 'viral'),
    'upgrade_url' => 'https://hashthemes.com/downloads/hash-custom-font-uploader/',
    'active_callback' => 'viral_check_cfu'
)));

/* ============HEADER SETTING PANEL============ */
$wp_customize->add_panel('viral_header_setting_panel', array(
    'title' => esc_html__('Header Settings', 'viral'),
    'priority' => 2
));

$wp_customize->add_section('viral_top_header_settings_sec', array(
    'title' => esc_html__('Top Header Settings', 'viral'),
    'panel' => 'viral_header_setting_panel'
));

$wp_customize->add_setting('viral_left_header_date', array(
    'default' => true,
    'sanitize_callback' => 'viral_sanitize_checkbox'
));

$wp_customize->add_control('viral_left_header_date', array(
    'type' => 'checkbox',
    'settings' => 'viral_left_header_date',
    'section' => 'viral_top_header_settings_sec',
    'label' => esc_html__('Show Date in Header', 'viral')
));

$wp_customize->add_setting('viral_left_header_text', array(
    'sanitize_callback' => 'viral_sanitize_text'
));

$wp_customize->add_control('viral_left_header_text', array(
    'type' => 'text',
    'settings' => 'viral_left_header_text',
    'section' => 'viral_top_header_settings_sec',
    'label' => esc_html__('Header Left Text', 'viral')
));

$wp_customize->add_setting('viral_left_header_menu', array(
    'sanitize_callback' => 'viral_sanitize_text'
));

$wp_customize->add_control(new Viral_Upgrade_Info_Control($wp_customize, 'viral_left_header_menu', array(
    'settings' => 'viral_left_header_menu',
    'section' => 'viral_top_header_settings_sec',
    'description' => esc_html__('To add the Menu, Go to Appearance -> Menu and save it as Top Menu', 'viral')
)));

$wp_customize->add_setting('viral_social_icon_header', array(
    'sanitize_callback' => 'viral_sanitize_integer'
));

$wp_customize->add_control(new Viral_Heading_Control($wp_customize, 'viral_social_icon_header', array(
    'settings' => 'viral_social_icon_header',
    'section' => 'viral_top_header_settings_sec',
    'label' => esc_html__('Social Icons - Right Header', 'viral')
)));

$wp_customize->add_setting('viral_social_facebook', array(
    'default' => '#',
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control('viral_social_facebook', array(
    'settings' => 'viral_social_facebook',
    'section' => 'viral_top_header_settings_sec',
    'type' => 'url',
    'label' => esc_html__('Facebook', 'viral')
));

$wp_customize->add_setting('viral_social_twitter', array(
    'default' => '#',
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control('viral_social_twitter', array(
    'settings' => 'viral_social_twitter',
    'section' => 'viral_top_header_settings_sec',
    'type' => 'url',
    'label' => esc_html__('Twitter', 'viral')
));

$wp_customize->add_setting('viral_social_pinterest', array(
    'default' => '#',
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control('viral_social_pinterest', array(
    'settings' => 'viral_social_pinterest',
    'section' => 'viral_top_header_settings_sec',
    'type' => 'url',
    'label' => esc_html__('Pinterest', 'viral')
));

$wp_customize->add_setting('viral_social_youtube', array(
    'default' => '#',
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control('viral_social_youtube', array(
    'settings' => 'viral_social_youtube',
    'section' => 'viral_top_header_settings_sec',
    'type' => 'url',
    'label' => esc_html__('Youtube', 'viral')
));

$wp_customize->add_setting('viral_social_linkedin', array(
    'default' => '#',
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control('viral_social_linkedin', array(
    'settings' => 'viral_social_linkedin',
    'section' => 'viral_top_header_settings_sec',
    'type' => 'url',
    'label' => esc_html__('Linkedin', 'viral')
));

$wp_customize->add_setting('viral_social_instagram', array(
    'default' => '#',
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control('viral_social_instagram', array(
    'settings' => 'viral_social_instagram',
    'section' => 'viral_top_header_settings_sec',
    'type' => 'url',
    'label' => esc_html__('Instagram', 'viral')
));

$wp_customize->add_setting('viral_top_header_upgrade_text', array(
    'sanitize_callback' => 'viral_sanitize_text'
));

$wp_customize->add_control(new Viral_Upgrade_Info_Control($wp_customize, 'viral_top_header_upgrade_text', array(
    'section' => 'viral_top_header_settings_sec',
    'label' => esc_html__('For more options,', 'viral'),
    'choices' => array(
        esc_html__('Set custom content for left & right header', 'viral'),
        esc_html__('Custom content includes Social Icons, Menu, Widget, Html Text, Date & Time, News Ticker', 'viral'),
        esc_html__('Set header height, custom background, border and text colors', 'viral'),
        esc_html__('Unlimited social medias with custom icon selection', 'viral')
    ),
    'priority' => 100,
    'upgrade_text' => esc_html__('Upgrade to Pro', 'viral'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/?utm_source=wordpress&utm_medium=viral-link&utm_campaign=viral-upgrade',
    'active_callback' => 'viral_is_upgrade_notice_active'
)));

$wp_customize->add_section('viral_main_header_settings_sec', array(
    'title' => esc_html__('Main Header Settings', 'viral'),
    'panel' => 'viral_header_setting_panel'
));

$wp_customize->add_setting('viral_full_width_menu_bar', array(
    'default' => false,
    'sanitize_callback' => 'viral_sanitize_checkbox'
));

$wp_customize->add_control('viral_full_width_menu_bar', array(
    'type' => 'checkbox',
    'settings' => 'viral_full_width_menu_bar',
    'section' => 'viral_main_header_settings_sec',
    'label' => esc_html__('Full Width Menu Bar', 'viral')
));

$wp_customize->add_setting('viral_disable_menu_shadow', array(
    'default' => false,
    'sanitize_callback' => 'viral_sanitize_checkbox'
));

$wp_customize->add_control('viral_disable_menu_shadow', array(
    'type' => 'checkbox',
    'settings' => 'viral_disable_menu_shadow',
    'section' => 'viral_main_header_settings_sec',
    'label' => esc_html__('Disable Shadow Below Menu', 'viral')
));

$wp_customize->add_setting('viral_main_header_upgrade_text', array(
    'sanitize_callback' => 'viral_sanitize_text'
));

$wp_customize->add_control(new Viral_Upgrade_Info_Control($wp_customize, 'viral_main_header_upgrade_text', array(
    'section' => 'viral_main_header_settings_sec',
    'label' => esc_html__('For more options,', 'viral'),
    'choices' => array(
        esc_html__('7 header layouts', 'viral'),
        esc_html__('Sticky header', 'viral'),
        esc_html__('Search button', 'viral'),
        esc_html__('OffCanvas menu', 'viral'),
        esc_html__('Header color options', 'viral'),
        esc_html__('10 Menu hover styles', 'viral'),
        esc_html__('Menu color options', 'viral'),
        esc_html__('Differently designed call to action button at the end of the menu', 'viral'),
        esc_html__('Enable/Disable header breadcrumb', 'viral'),
        esc_html__('Page title custom typography', 'viral'),
    ),
    'priority' => 100,
    'upgrade_text' => esc_html__('Upgrade to Pro', 'viral'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/?utm_source=wordpress&utm_medium=viral-link&utm_campaign=viral-upgrade',
    'active_callback' => 'viral_is_upgrade_notice_active'
)));

/* ============FRONT PAGE PANEL============ */
$wp_customize->add_panel('viral_front_page_panel', array(
    'title' => esc_html__('Front Page Sections', 'viral'),
    'priority' => 20
));

$wp_customize->add_section(new Viral_Upgrade_Section($wp_customize, 'viral-frontpage-notice', array(
    'title' => sprintf(esc_html__('Important! Home Page Sections are not enabled. Enable it %1shere%2s.', 'viral'), '<a href="javascript:wp.customize.section( \'static_front_page\' ).focus()">', '</a>'),
    'priority' => -1,
    'class' => 'ht--single-row',
    'panel' => 'viral_front_page_panel',
    'active_callback' => 'viral_check_frontpage'
)));

/* ============FRONT PAGE TOP SECTION============ */
$wp_customize->add_section('viral_frontpage_top_sec', array(
    'title' => esc_html__('Home Top Section', 'viral'),
    'panel' => 'viral_front_page_panel',
    'priority' => 10
));

$wp_customize->add_setting('viral_ticker_title', array(
    'default' => esc_html__('Breaking News', 'viral'),
    'sanitize_callback' => 'viral_sanitize_text'
));

$wp_customize->add_control('viral_ticker_title', array(
    'settings' => 'viral_ticker_title',
    'section' => 'viral_frontpage_top_sec',
    'label' => esc_html__('Ticker Title', 'viral')
));

$wp_customize->add_setting('viral_ticker_category', array(
    'default' => '-1',
    'sanitize_callback' => 'viral_sanitize_text'
));

$wp_customize->add_control(new Viral_Chosen_Select_Control($wp_customize, 'viral_ticker_category', array(
    'settings' => 'viral_ticker_category',
    'section' => 'viral_frontpage_top_sec',
    'label' => esc_html__('Choose Ticker Category', 'viral'),
    'choices' => viral_ticker_cat()
)));

$wp_customize->add_setting('viral_frontpage_top_blocks', array(
    'sanitize_callback' => 'viral_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'category' => '',
            'layout' => 'style1',
            'enable' => 'on'
        )
    ))
));

$wp_customize->add_setting('viral_ticker_dark_color_scheme', array(
    'default' => false,
    'sanitize_callback' => 'viral_sanitize_checkbox'
));

$wp_customize->add_control('viral_ticker_dark_color_scheme', array(
    'type' => 'checkbox',
    'settings' => 'viral_ticker_dark_color_scheme',
    'section' => 'viral_frontpage_top_sec',
    'label' => esc_html__('Enable Black Background on Ticker', 'viral')
));

$wp_customize->add_control(new Viral_Repeater_Control($wp_customize, 'viral_frontpage_top_blocks', array(
    'label' => esc_html__('FrontPage Top Blocks - FullWidth', 'viral'),
    'section' => 'viral_frontpage_top_sec',
    'settings' => 'viral_frontpage_top_blocks',
    'box_label' => esc_html__('News Section', 'viral'),
    'add_label' => esc_html__('Add Section', 'viral'),
), array(
    'category' => array(
        'type' => 'multicategory',
        'label' => esc_html__('Select Category', 'viral'),
        'description' => esc_html__('All latest post will display if no category is selected', 'viral')
    ),
    'layout' => array(
        'type' => 'selector',
        'label' => esc_html__('Layouts', 'viral'),
        'description' => esc_html__('Select the Block Layout', 'viral'),
        'class' => 'ht--half-width',
        'options' => array(
            'style1' => $image_path_url . 'top-layout1.png',
            'style2' => $image_path_url . 'top-layout2.png',
            'style3' => $image_path_url . 'top-layout3.png',
            'style4' => $image_path_url . 'top-layout4.png',
        ),
        'default' => 'style1'
    ),
    'enable' => array(
        'type' => 'switch',
        'label' => esc_html__('Enable Section', 'viral'),
        'switch' => array(
            'on' => 'Yes',
            'off' => 'No'
        ),
        'default' => 'on'
    )
)));

$wp_customize->add_setting('viral_top_section_upgrade_text', array(
    'sanitize_callback' => 'viral_sanitize_text'
));

$wp_customize->add_control(new Viral_Upgrade_Info_Control($wp_customize, 'viral_top_section_upgrade_text', array(
    'section' => 'viral_frontpage_top_sec',
    'label' => esc_html__('For more block layouts and settings,', 'viral'),
    'choices' => array(
        esc_html__('30+ more block styles', 'viral'),
        esc_html__('Show/Hide category, author and date', 'viral'),
        esc_html__('Display Advertisement(image/Google ads) above and below the section', 'viral'),
        esc_html__('Add color, image, gradient or video background for the section', 'viral'),
        esc_html__('Set top and bottom margin & padding', 'viral'),
        esc_html__('Set top and bottom SVG seperators', 'viral'),
        esc_html__('12 heading styles with custom colors', 'viral'),
        esc_html__('Lazy load for image', 'viral'),
        esc_html__('10 image hover styles', 'viral'),
        esc_html__('Set typography for heading and post titles', 'viral'),
    ),
    'priority' => 100,
    'upgrade_text' => esc_html__('Upgrade to Pro', 'viral'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/?utm_source=wordpress&utm_medium=viral-link&utm_campaign=viral-upgrade',
    'active_callback' => 'viral_is_upgrade_notice_active'
)));

/* ============FRONT PAGE MIDDLE SECTION============ */
$wp_customize->add_section('viral_frontpage_middle_left_sec', array(
    'title' => esc_html__('Home Middle Section - Left Content', 'viral'),
    'panel' => 'viral_front_page_panel',
    'priority' => 20
));

$wp_customize->add_setting('viral_frontpage_middle_blocks', array(
    'sanitize_callback' => 'viral_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'title' => esc_html__('Title', 'viral'),
            'category' => '-1',
            'layout' => 'style1',
            'enable' => 'on'
        )
    ))
));

$wp_customize->add_control(new Viral_Repeater_Control($wp_customize, 'viral_frontpage_middle_blocks', array(
    'label' => esc_html__('FrontPage Middle Blocks - Left Content', 'viral'),
    'section' => 'viral_frontpage_middle_left_sec',
    'settings' => 'viral_frontpage_middle_blocks',
    'box_label' => esc_html__('News Section', 'viral'),
    'add_label' => esc_html__('Add Section', 'viral'),
), array(
    'title' => array(
        'type' => 'text',
        'label' => esc_html__('Title', 'viral'),
        'default' => esc_html__('Title', 'viral'),
        'description' => esc_html__('Optional - Leave blank to hide Title', 'viral')
    ),
    'category' => array(
        'type' => 'category',
        'label' => esc_html__('Category', 'viral'),
        'default' => '-1'
    ),
    'layout' => array(
        'type' => 'selector',
        'label' => esc_html__('Layouts', 'viral'),
        'description' => esc_html__('Select the Block Layout', 'viral'),
        'options' => array(
            'style1' => $image_path_url . 'middle-layout1.png',
            'style2' => $image_path_url . 'middle-layout2.png',
            'style3' => $image_path_url . 'middle-layout3.png',
            'style4' => $image_path_url . 'middle-layout4.png',
        ),
        'default' => 'style1'
    ),
    'enable' => array(
        'type' => 'switch',
        'label' => esc_html__('Enable Section', 'viral'),
        'switch' => array(
            'on' => 'Yes',
            'off' => 'No'
        ),
        'default' => 'on'
    )
)));

$wp_customize->add_setting('viral_middle_left_section_upgrade_text', array(
    'sanitize_callback' => 'viral_sanitize_text'
));

$wp_customize->add_control(new Viral_Upgrade_Info_Control($wp_customize, 'viral_middle_left_section_upgrade_text', array(
    'section' => 'viral_frontpage_middle_left_sec',
    'label' => esc_html__('For more block layouts and settings,', 'viral'),
    'choices' => array(
        esc_html__('30+ more block styles', 'viral'),
        esc_html__('Show/Hide category, author and date', 'viral'),
        esc_html__('Display Advertisement(image/Google ads) above and below the section', 'viral'),
        esc_html__('Add color, image, gradient or video background for the section', 'viral'),
        esc_html__('Set top and bottom margin & padding', 'viral'),
        esc_html__('Set top and bottom SVG seperators', 'viral'),
        esc_html__('12 heading styles with custom colors', 'viral'),
        esc_html__('Lazy load for image', 'viral'),
        esc_html__('10 image hover styles', 'viral'),
        esc_html__('Set typography for heading and post titles', 'viral'),
    ),
    'priority' => 100,
    'upgrade_text' => esc_html__('Upgrade to Pro', 'viral'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/?utm_source=wordpress&utm_medium=viral-link&utm_campaign=viral-upgrade',
    'active_callback' => 'viral_is_upgrade_notice_active'
)));

$wp_customize->add_section('viral_frontpage_middle_right_sec', array(
    'title' => esc_html__('Home Middle Section - Right Sidebar', 'viral'),
    'panel' => 'viral_front_page_panel',
    'priority' => 20
));

$wp_customize->add_setting('viral_frontpage_middle_right_sec_text', array(
    'sanitize_callback' => 'viral_sanitize_text'
));

$wp_customize->add_control(new Viral_Text_Info_Control($wp_customize, 'viral_frontpage_middle_right_sec_text', array(
    'section' => 'viral_frontpage_middle_right_sec',
    'label' => esc_html__('Note', 'viral'),
    'description' => sprintf(esc_html__('For the right sidebar, add the widgets in the "Home Middle Section - Right Sidebar" in the %s page.', 'viral'), '<a href="' . admin_url('/widgets.php') . '" target="_blank">widget</a>'),
)));

/* ============FRONT PAGE BOTTOM SECTION============ */
$wp_customize->add_section('viral_frontpage_bottom_sec', array(
    'title' => esc_html__('Home Bottom Section', 'viral'),
    'panel' => 'viral_front_page_panel',
    'priority' => 40
));

$wp_customize->add_setting('viral_frontpage_bottom_blocks', array(
    'sanitize_callback' => 'viral_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'category1' => '-1',
            'category2' => '-1',
            'category3' => '-1',
            'layout' => 'style1',
            'enable' => 'on'
        )
    ))
));

$wp_customize->add_control(new Viral_Repeater_Control($wp_customize, 'viral_frontpage_bottom_blocks', array(
    'label' => esc_html__('FrontPage Bottom Blocks - FullWidth', 'viral'),
    'section' => 'viral_frontpage_bottom_sec',
    'settings' => 'viral_frontpage_bottom_blocks',
    'box_label' => esc_html__('News Section', 'viral'),
    'add_label' => esc_html__('Add Section', 'viral'),
), array(
    'category1' => array(
        'type' => 'category',
        'label' => esc_html__('Category', 'viral'),
        'default' => '-1',
        'class' => 'vl-bottom-block-cat1'
    ),
    'category2' => array(
        'type' => 'category',
        'label' => esc_html__('Category', 'viral'),
        'default' => '-1',
        'class' => 'vl-bottom-block-cat2'
    ),
    'category3' => array(
        'type' => 'category',
        'label' => esc_html__('Category', 'viral'),
        'default' => '-1',
        'class' => 'vl-bottom-block-cat3'
    ),
    'layout' => array(
        'type' => 'selector',
        'label' => esc_html__('Layouts', 'viral'),
        'description' => esc_html__('Select the Block Layout', 'viral'),
        'options' => array(
            'style1' => $image_path_url . 'bottom-layout1.png',
            'style2' => $image_path_url . 'bottom-layout2.png',
        ),
        'default' => 'style1',
        'class' => 'vl-bottom-block-layout'
    ),
    'enable' => array(
        'type' => 'switch',
        'label' => esc_html__('Enable Section', 'viral'),
        'switch' => array(
            'on' => 'Yes',
            'off' => 'No'
        ),
        'default' => 'on'
    )
)));

$wp_customize->add_setting('viral_bottom_section_upgrade_text', array(
    'sanitize_callback' => 'viral_sanitize_text'
));

$wp_customize->add_control(new Viral_Upgrade_Info_Control($wp_customize, 'viral_bottom_section_upgrade_text', array(
    'section' => 'viral_frontpage_bottom_sec',
    'label' => esc_html__('For more block layouts and settings,', 'viral'),
    'priority' => 100,
    'choices' => array(
        esc_html__('30+ more block styles', 'viral'),
        esc_html__('Show/Hide category, author and date', 'viral'),
        esc_html__('Display Advertisement(image/Google ads) above and below the section', 'viral'),
        esc_html__('Add color, image, gradient or video background for the section', 'viral'),
        esc_html__('Set top and bottom margin & padding', 'viral'),
        esc_html__('Set top and bottom SVG seperators', 'viral'),
        esc_html__('12 heading styles with custom colors', 'viral'),
        esc_html__('Lazy load for image', 'viral'),
        esc_html__('10 image hover styles', 'viral'),
        esc_html__('Set typography for heading and post titles', 'viral'),
    ),
    'upgrade_text' => esc_html__('Upgrade to Pro', 'viral'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/?utm_source=wordpress&utm_medium=viral-link&utm_campaign=viral-upgrade',
    'active_callback' => 'viral_is_upgrade_notice_active'
)));

$wp_customize->add_section(new Viral_Upgrade_Section($wp_customize, 'viral-upgrade-section', array(
    'title' => esc_html__('More Sections on Premium', 'viral'),
    'panel' => 'viral_front_page_panel',
    'priority' => 1000,
    'options' => array(
        esc_html__('--Drag and Drop Reorder Sections--', 'viral'),
        esc_html__('- Ticker Module', 'viral'),
        esc_html__('- Tile Module', 'viral'),
        esc_html__('- Slider Module', 'viral'),
        esc_html__('- Carousel Module', 'viral'),
        esc_html__('- News Module - Left Sidebar', 'viral'),
        esc_html__('- News Module - Right Sidebar', 'viral'),
        esc_html__('- Mini News Module', 'viral'),
        esc_html__('- Video Playlist Module', 'viral'),
        esc_html__('- Full Width News Module', 'viral'),
        esc_html__('- Featured Image Module', 'viral'),
        esc_html__('- Three Column Module', 'viral'),
        esc_html__('- Google Ads/Image Ads in betweeen Modules', 'viral')
    ),
    'upgrade_text' => esc_html__('Upgrade to Pro', 'viral'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/?utm_source=wordpress&utm_medium=viral-link&utm_campaign=viral-upgrade',
    'active_callback' => 'viral_is_upgrade_notice_active'
)));

/* ============SINGLE POST SECTION============ */
$wp_customize->add_section('viral_single_post_sec', array(
    'title' => esc_html__('Single Post Settings', 'viral'),
    'priority' => 30
));

$wp_customize->add_setting('viral_display_featured_image', array(
    'sanitize_callback' => 'viral_sanitize_checkbox'
));

$wp_customize->add_control(new Viral_Toggle_Control($wp_customize, 'viral_display_featured_image', array(
    'section' => 'viral_single_post_sec',
    'label' => esc_html__('Display Featured Image', 'viral'),
    'description' => esc_html__('Displays Featured Image at the top of the post.', 'viral'),
)));

$wp_customize->add_setting('viral_blog_display_date_option', array(
    'default' => 'posted',
    'sanitize_callback' => 'viral_sanitize_choices'
));

$wp_customize->add_control('viral_blog_display_date_option', array(
    'section' => 'viral_single_post_sec',
    'type' => 'radio',
    'label' => esc_html__('Display Posted/Updated Date', 'viral'),
    'description' => esc_html__('Applies on Single and Archive Pages', 'viral'),
    'choices' => array(
        'posted' => esc_html__('Posted Date', 'viral'),
        'updated' => esc_html__('Updated Date', 'viral')
    )
));

$wp_customize->add_setting('viral_single_post_sec_upgrade_text', array(
    'sanitize_callback' => 'viral_sanitize_text'
));

$wp_customize->add_control(new Viral_Upgrade_Info_Control($wp_customize, 'viral_single_post_sec_upgrade_text', array(
    'section' => 'viral_single_post_sec',
    'label' => esc_html__('For more options,', 'viral'),
    'choices' => array(
        esc_html__('7 differently designed single post layouts', 'viral'),
        esc_html__('Enable and disable every elements like author, date, comments, tags, categories', 'viral'),
        esc_html__('Display reading time & post view counts', 'viral'),
        esc_html__('Sticky & non sticky social share button', 'viral'),
        esc_html__('Author box & 4 differently designed related posts', 'viral'),
    ),
    'upgrade_text' => esc_html__('Upgrade to Pro', 'viral'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/?utm_source=wordpress&utm_medium=viral-link&utm_campaign=viral-upgrade',
    'active_callback' => 'viral_is_upgrade_notice_active'
)));

/* ============PRO FEATURES============ */
$wp_customize->add_section('viral_pro_feature_section', array(
    'title' => esc_html__('Pro Theme Features', 'viral'),
    'priority' => 0
));

$wp_customize->add_setting('viral_hide_upgrade_notice', array(
    'sanitize_callback' => 'viral_sanitize_checkbox',
    'default' => false,
));

$wp_customize->add_control(new Viral_Toggle_Control($wp_customize, 'viral_hide_upgrade_notice', array(
    'section' => 'viral_pro_feature_section',
    'label' => esc_html__('Hide all Upgrade Notices from Customizer', 'viral'),
    'description' => esc_html__('If you don\'t want to upgrade to premium version then you can turn off all the upgrade notices. However you can turn it on anytime if you make mind to upgrade to premium version.', 'viral')
)));

$wp_customize->add_setting('viral_pro_features', array(
    'sanitize_callback' => 'viral_sanitize_text',
));

$wp_customize->add_control(new Viral_Upgrade_Info_Control($wp_customize, 'viral_pro_features', array(
    'settings' => 'viral_pro_features',
    'section' => 'viral_pro_feature_section',
    'description' => $viral_pro_features,
    'active_callback' => 'viral_is_upgrade_notice_active'
)));
