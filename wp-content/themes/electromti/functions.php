<?php
/**
 * ElectroMTI Theme Functions
 *
 * @package ElectroMTI
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function electromti_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Register navigation menus
    register_nav_menus(array(
        'primary'    => __('Primary Menu', 'electromti'),
        'categories' => __('Categories Menu', 'electromti'),
        'footer'     => __('Footer Menu', 'electromti'),
    ));

    // Image sizes
    add_image_size('product-thumb', 300, 300, true);
    add_image_size('product-large', 600, 600, true);
    add_image_size('banner-large', 1200, 500, true);
    add_image_size('banner-small', 600, 300, true);
}
add_action('after_setup_theme', 'electromti_setup');

/**
 * Enqueue Scripts and Styles
 */
function electromti_scripts() {
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap', array(), null);

    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');

    // Main Stylesheet
    wp_enqueue_style('electromti-style', get_stylesheet_uri(), array(), '1.0.0');

    // Shop Stylesheet
    wp_enqueue_style('electromti-shop', get_template_directory_uri() . '/assets/css/shop.css', array('electromti-style'), '1.0.0');

    // Custom JS
    wp_enqueue_script('electromti-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);

    // Localize script
    wp_localize_script('electromti-main', 'electromti_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('electromti_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'electromti_scripts');

/**
 * Register Sidebars
 */
function electromti_widgets_init() {
    register_sidebar(array(
        'name'          => __('Shop Sidebar', 'electromti'),
        'id'            => 'shop-sidebar',
        'description'   => __('Sidebar for shop pages', 'electromti'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 1', 'electromti'),
        'id'            => 'footer-1',
        'description'   => __('Footer column 1', 'electromti'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 2', 'electromti'),
        'id'            => 'footer-2',
        'description'   => __('Footer column 2', 'electromti'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'electromti_widgets_init');

/**
 * Theme Customizer
 */
function electromti_customize_register($wp_customize) {
    // Contact Information Section
    $wp_customize->add_section('electromti_contact', array(
        'title'    => __('Contact Information', 'electromti'),
        'priority' => 30,
    ));

    // Phone Numbers
    $wp_customize->add_setting('phone_1', array(
        'default'           => '602 861 227',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('phone_1', array(
        'label'   => __('Phone Number 1', 'electromti'),
        'section' => 'electromti_contact',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('phone_2', array(
        'default'           => '602 682 042',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('phone_2', array(
        'label'   => __('Phone Number 2', 'electromti'),
        'section' => 'electromti_contact',
        'type'    => 'text',
    ));

    // Email
    $wp_customize->add_setting('contact_email', array(
        'default'           => 'contact@electromti.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_email', array(
        'label'   => __('Contact Email', 'electromti'),
        'section' => 'electromti_contact',
        'type'    => 'email',
    ));

    // Address
    $wp_customize->add_setting('store_address', array(
        'default'           => 'Avenida Estación, 42 - Torre Pacheco, Murcia',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('store_address', array(
        'label'   => __('Store Address', 'electromti'),
        'section' => 'electromti_contact',
        'type'    => 'text',
    ));

    // WhatsApp Number
    $wp_customize->add_setting('whatsapp_number', array(
        'default'           => '34602861227',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('whatsapp_number', array(
        'label'   => __('WhatsApp Number (with country code)', 'electromti'),
        'section' => 'electromti_contact',
        'type'    => 'text',
    ));

    // Social Media Section
    $wp_customize->add_section('electromti_social', array(
        'title'    => __('Social Media', 'electromti'),
        'priority' => 35,
    ));

    $social_networks = array('facebook', 'instagram', 'tiktok', 'twitter', 'youtube');
    foreach ($social_networks as $network) {
        $wp_customize->add_setting($network . '_url', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control($network . '_url', array(
            'label'   => ucfirst($network) . ' URL',
            'section' => 'electromti_social',
            'type'    => 'url',
        ));
    }

    // Repair Service Section
    $wp_customize->add_section('electromti_repair', array(
        'title'    => __('Repair Service', 'electromti'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('repair_enabled', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('repair_enabled', array(
        'label'   => __('Enable Repair Button', 'electromti'),
        'section' => 'electromti_repair',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_setting('repair_url', array(
        'default'           => '#repair',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('repair_url', array(
        'label'   => __('Repair Page URL', 'electromti'),
        'section' => 'electromti_repair',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('repair_text', array(
        'default'           => 'Reparación de Móviles',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('repair_text', array(
        'label'   => __('Repair Button Text', 'electromti'),
        'section' => 'electromti_repair',
        'type'    => 'text',
    ));

    // ========================================
    // Hero Banners Section
    // ========================================
    $wp_customize->add_section('electromti_hero_banners', array(
        'title'    => __('Hero Banners', 'electromti'),
        'priority' => 45,
    ));

    // Banner 1
    $wp_customize->add_setting('hero_banner_1_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_banner_1_image', array(
        'label'   => __('Banner 1 - Image', 'electromti'),
        'section' => 'electromti_hero_banners',
    )));

    $wp_customize->add_setting('hero_banner_1_badge', array(
        'default'           => '-15% DESCUENTO',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_banner_1_badge', array(
        'label'   => __('Banner 1 - Badge Text', 'electromti'),
        'section' => 'electromti_hero_banners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_banner_1_title', array(
        'default'           => 'iPhone 15 Pro Max',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_banner_1_title', array(
        'label'   => __('Banner 1 - Title', 'electromti'),
        'section' => 'electromti_hero_banners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_banner_1_desc', array(
        'default'           => 'El iPhone más potente. Chip A17 Pro, cámara de 48MP y diseño en titanio.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_banner_1_desc', array(
        'label'   => __('Banner 1 - Description', 'electromti'),
        'section' => 'electromti_hero_banners',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('hero_banner_1_price', array(
        'default'           => '1.199€',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_banner_1_price', array(
        'label'   => __('Banner 1 - Price', 'electromti'),
        'section' => 'electromti_hero_banners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_banner_1_old_price', array(
        'default'           => '1.399€',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_banner_1_old_price', array(
        'label'   => __('Banner 1 - Old Price', 'electromti'),
        'section' => 'electromti_hero_banners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_banner_1_link', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('hero_banner_1_link', array(
        'label'   => __('Banner 1 - Link URL', 'electromti'),
        'section' => 'electromti_hero_banners',
        'type'    => 'url',
    ));

    // Banner 2
    $wp_customize->add_setting('hero_banner_2_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_banner_2_image', array(
        'label'   => __('Banner 2 - Image', 'electromti'),
        'section' => 'electromti_hero_banners',
    )));

    $wp_customize->add_setting('hero_banner_2_badge', array(
        'default'           => 'NUEVO',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_banner_2_badge', array(
        'label'   => __('Banner 2 - Badge Text', 'electromti'),
        'section' => 'electromti_hero_banners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_banner_2_title', array(
        'default'           => 'Samsung Galaxy S24 Ultra',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_banner_2_title', array(
        'label'   => __('Banner 2 - Title', 'electromti'),
        'section' => 'electromti_hero_banners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_banner_2_desc', array(
        'default'           => 'Galaxy AI integrada. La experiencia Samsung más avanzada.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_banner_2_desc', array(
        'label'   => __('Banner 2 - Description', 'electromti'),
        'section' => 'electromti_hero_banners',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('hero_banner_2_price', array(
        'default'           => '1.099€',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_banner_2_price', array(
        'label'   => __('Banner 2 - Price', 'electromti'),
        'section' => 'electromti_hero_banners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_banner_2_old_price', array(
        'default'           => '1.299€',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_banner_2_old_price', array(
        'label'   => __('Banner 2 - Old Price', 'electromti'),
        'section' => 'electromti_hero_banners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_banner_2_link', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('hero_banner_2_link', array(
        'label'   => __('Banner 2 - Link URL', 'electromti'),
        'section' => 'electromti_hero_banners',
        'type'    => 'url',
    ));

    // Banner 3
    $wp_customize->add_setting('hero_banner_3_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_banner_3_image', array(
        'label'   => __('Banner 3 - Image', 'electromti'),
        'section' => 'electromti_hero_banners',
    )));

    $wp_customize->add_setting('hero_banner_3_badge', array(
        'default'           => 'OFERTAS',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_banner_3_badge', array(
        'label'   => __('Banner 3 - Badge Text', 'electromti'),
        'section' => 'electromti_hero_banners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_banner_3_title', array(
        'default'           => 'Electrodomésticos',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_banner_3_title', array(
        'label'   => __('Banner 3 - Title', 'electromti'),
        'section' => 'electromti_hero_banners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_banner_3_desc', array(
        'default'           => 'Hasta 40% de descuento en electrodomésticos seleccionados.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_banner_3_desc', array(
        'label'   => __('Banner 3 - Description', 'electromti'),
        'section' => 'electromti_hero_banners',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('hero_banner_3_price', array(
        'default'           => 'Desde 199€',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_banner_3_price', array(
        'label'   => __('Banner 3 - Price', 'electromti'),
        'section' => 'electromti_hero_banners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_banner_3_link', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('hero_banner_3_link', array(
        'label'   => __('Banner 3 - Link URL', 'electromti'),
        'section' => 'electromti_hero_banners',
        'type'    => 'url',
    ));

    // ========================================
    // Side Banners Section
    // ========================================
    $wp_customize->add_section('electromti_side_banners', array(
        'title'    => __('Side Banners', 'electromti'),
        'priority' => 46,
    ));

    // Side Banner 1 (Mayoristas)
    $wp_customize->add_setting('side_banner_1_badge', array(
        'default'           => 'MAYORISTAS',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('side_banner_1_badge', array(
        'label'   => __('Side Banner 1 - Badge', 'electromti'),
        'section' => 'electromti_side_banners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('side_banner_1_title', array(
        'default'           => 'Venta al por mayor',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('side_banner_1_title', array(
        'label'   => __('Side Banner 1 - Title', 'electromti'),
        'section' => 'electromti_side_banners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('side_banner_1_desc', array(
        'default'           => 'Precios especiales para profesionales',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('side_banner_1_desc', array(
        'label'   => __('Side Banner 1 - Description', 'electromti'),
        'section' => 'electromti_side_banners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('side_banner_1_link', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('side_banner_1_link', array(
        'label'   => __('Side Banner 1 - Link URL', 'electromti'),
        'section' => 'electromti_side_banners',
        'type'    => 'url',
    ));

    // Side Banner 2 (Reparación)
    $wp_customize->add_setting('side_banner_2_badge', array(
        'default'           => 'SERVICIO',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('side_banner_2_badge', array(
        'label'   => __('Side Banner 2 - Badge', 'electromti'),
        'section' => 'electromti_side_banners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('side_banner_2_title', array(
        'default'           => 'Reparación express',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('side_banner_2_title', array(
        'label'   => __('Side Banner 2 - Title', 'electromti'),
        'section' => 'electromti_side_banners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('side_banner_2_desc', array(
        'default'           => 'Tu móvil como nuevo en 24h',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('side_banner_2_desc', array(
        'label'   => __('Side Banner 2 - Description', 'electromti'),
        'section' => 'electromti_side_banners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('side_banner_2_link', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('side_banner_2_link', array(
        'label'   => __('Side Banner 2 - Link URL', 'electromti'),
        'section' => 'electromti_side_banners',
        'type'    => 'url',
    ));

    // ========================================
    // Tagline Bar Section
    // ========================================
    $wp_customize->add_section('electromti_tagline', array(
        'title'    => __('Tagline Bar', 'electromti'),
        'priority' => 47,
    ));

    $wp_customize->add_setting('tagline_text_bold', array(
        'default'           => 'Expertos en tecnología',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('tagline_text_bold', array(
        'label'   => __('Tagline Bold Text', 'electromti'),
        'section' => 'electromti_tagline',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('tagline_text_normal', array(
        'default'           => 'con un servicio 5 estrellas',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('tagline_text_normal', array(
        'label'   => __('Tagline Normal Text', 'electromti'),
        'section' => 'electromti_tagline',
        'type'    => 'text',
    ));

    // ========================================
    // Homepage Sections Section
    // ========================================
    $wp_customize->add_section('electromti_homepage', array(
        'title'    => __('Homepage Sections', 'electromti'),
        'priority' => 48,
    ));

    $wp_customize->add_setting('show_offers_section', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('show_offers_section', array(
        'label'   => __('Show Offers Section', 'electromti'),
        'section' => 'electromti_homepage',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_setting('offers_section_title', array(
        'default'           => 'Ofertas del momento',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('offers_section_title', array(
        'label'   => __('Offers Section Title', 'electromti'),
        'section' => 'electromti_homepage',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('offers_products_count', array(
        'default'           => 5,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('offers_products_count', array(
        'label'   => __('Number of Offer Products', 'electromti'),
        'section' => 'electromti_homepage',
        'type'    => 'number',
    ));

    $wp_customize->add_setting('show_bestsellers_section', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('show_bestsellers_section', array(
        'label'   => __('Show Best Sellers Section', 'electromti'),
        'section' => 'electromti_homepage',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_setting('bestsellers_section_title', array(
        'default'           => 'Los más vendidos',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('bestsellers_section_title', array(
        'label'   => __('Best Sellers Section Title', 'electromti'),
        'section' => 'electromti_homepage',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('bestsellers_products_count', array(
        'default'           => 5,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('bestsellers_products_count', array(
        'label'   => __('Number of Best Seller Products', 'electromti'),
        'section' => 'electromti_homepage',
        'type'    => 'number',
    ));
}
add_action('customize_register', 'electromti_customize_register');

/**
 * Helper Functions
 */

// Get theme option with default
function electromti_get_option($option, $default = '') {
    return get_theme_mod($option, $default);
}

// Display star rating
function electromti_star_rating($rating = 5, $max = 5) {
    $output = '<div class="stars">';
    for ($i = 1; $i <= $max; $i++) {
        if ($i <= $rating) {
            $output .= '<i class="fas fa-star"></i>';
        } elseif ($i - 0.5 <= $rating) {
            $output .= '<i class="fas fa-star-half-alt"></i>';
        } else {
            $output .= '<i class="far fa-star"></i>';
        }
    }
    $output .= '</div>';
    return $output;
}

// Format price
function electromti_format_price($price) {
    return number_format($price, 2, ',', '.') . '€';
}

// Get cart count
function electromti_get_cart_count() {
    if (class_exists('WooCommerce')) {
        return WC()->cart->get_cart_contents_count();
    }
    return 0;
}

// Sample products data (for demo)
function electromti_get_sample_products() {
    return array(
        array(
            'id'       => 1,
            'name'     => 'iPhone 15 Pro Max 256GB',
            'category' => 'Móviles',
            'price'    => 1199.00,
            'old_price' => 1399.00,
            'rating'   => 5,
            'reviews'  => 128,
            'badge'    => 'sale',
            'image'    => 'https://placehold.co/300x300/f5f5f5/333333?text=iPhone+15',
        ),
        array(
            'id'       => 2,
            'name'     => 'Samsung Galaxy S24 Ultra 512GB',
            'category' => 'Móviles',
            'price'    => 1099.00,
            'old_price' => 1299.00,
            'rating'   => 5,
            'reviews'  => 95,
            'badge'    => 'hot',
            'image'    => 'https://placehold.co/300x300/f5f5f5/333333?text=Galaxy+S24',
        ),
        array(
            'id'       => 3,
            'name'     => 'MacBook Air M3 13" 256GB',
            'category' => 'Portátiles',
            'price'    => 1099.00,
            'old_price' => 1249.00,
            'rating'   => 5,
            'reviews'  => 67,
            'badge'    => 'new',
            'image'    => 'https://placehold.co/300x300/f5f5f5/333333?text=MacBook+Air',
        ),
        array(
            'id'       => 4,
            'name'     => 'iPad Pro 12.9" M2 128GB WiFi',
            'category' => 'Tablets',
            'price'    => 1149.00,
            'old_price' => 1329.00,
            'rating'   => 4.5,
            'reviews'  => 43,
            'badge'    => 'sale',
            'image'    => 'https://placehold.co/300x300/f5f5f5/333333?text=iPad+Pro',
        ),
        array(
            'id'       => 5,
            'name'     => 'AirPods Pro 2ª Generación',
            'category' => 'Accesorios',
            'price'    => 229.00,
            'old_price' => 279.00,
            'rating'   => 4.5,
            'reviews'  => 210,
            'badge'    => 'hot',
            'image'    => 'https://placehold.co/300x300/f5f5f5/333333?text=AirPods+Pro',
        ),
        array(
            'id'       => 6,
            'name'     => 'Xiaomi Redmi Note 13 Pro 256GB',
            'category' => 'Móviles',
            'price'    => 299.00,
            'old_price' => 349.00,
            'rating'   => 4,
            'reviews'  => 156,
            'badge'    => 'sale',
            'image'    => 'https://placehold.co/300x300/f5f5f5/333333?text=Redmi+Note',
        ),
        array(
            'id'       => 7,
            'name'     => 'ASUS ROG Strix G16 RTX 4070',
            'category' => 'Portátiles',
            'price'    => 1599.00,
            'old_price' => 1899.00,
            'rating'   => 5,
            'reviews'  => 34,
            'badge'    => 'new',
            'image'    => 'https://placehold.co/300x300/f5f5f5/333333?text=ASUS+ROG',
        ),
        array(
            'id'       => 8,
            'name'     => 'Samsung Smart TV 55" 4K QLED',
            'category' => 'Televisores',
            'price'    => 699.00,
            'old_price' => 899.00,
            'rating'   => 4.5,
            'reviews'  => 78,
            'badge'    => 'sale',
            'image'    => 'https://placehold.co/300x300/f5f5f5/333333?text=Samsung+TV',
        ),
        array(
            'id'       => 9,
            'name'     => 'Dyson V15 Detect Absolute',
            'category' => 'Electrodomésticos',
            'price'    => 599.00,
            'old_price' => 749.00,
            'rating'   => 5,
            'reviews'  => 89,
            'badge'    => 'hot',
            'image'    => 'https://placehold.co/300x300/f5f5f5/333333?text=Dyson+V15',
        ),
        array(
            'id'       => 10,
            'name'     => 'PlayStation 5 Slim Digital',
            'category' => 'Gaming',
            'price'    => 449.00,
            'old_price' => 499.00,
            'rating'   => 5,
            'reviews'  => 234,
            'badge'    => 'hot',
            'image'    => 'https://placehold.co/300x300/f5f5f5/333333?text=PS5+Slim',
        ),
    );
}

// Get categories from WooCommerce (with fallback to sample data)
function electromti_get_categories() {
    // If WooCommerce is active, get real categories
    if (class_exists('WooCommerce')) {
        $categories = get_terms(array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
            'parent'     => 0, // Only top-level categories
            'number'     => 6,
        ));

        if (!empty($categories) && !is_wp_error($categories)) {
            $result = array();
            // Default icons mapping
            $icons = array(
                'moviles'          => 'fa-mobile-alt',
                'telefonos'        => 'fa-mobile-alt',
                'portatiles'       => 'fa-laptop',
                'laptops'          => 'fa-laptop',
                'tablets'          => 'fa-tablet-alt',
                'televisores'      => 'fa-tv',
                'tv'               => 'fa-tv',
                'electrodomesticos' => 'fa-blender',
                'accesorios'       => 'fa-headphones',
                'gaming'           => 'fa-gamepad',
                'audio'            => 'fa-headphones',
            );

            foreach ($categories as $cat) {
                // Try to get custom icon from term meta, or use default
                $icon = get_term_meta($cat->term_id, 'category_icon', true);
                if (empty($icon)) {
                    $icon = isset($icons[$cat->slug]) ? $icons[$cat->slug] : 'fa-box';
                }

                $result[] = array(
                    'name'  => $cat->name,
                    'icon'  => $icon,
                    'count' => $cat->count,
                    'slug'  => $cat->slug,
                    'link'  => get_term_link($cat),
                );
            }
            return $result;
        }
    }

    // Fallback to sample data
    return array(
        array(
            'name'  => 'Móviles',
            'icon'  => 'fa-mobile-alt',
            'count' => 0,
            'slug'  => 'moviles',
            'link'  => '#',
        ),
        array(
            'name'  => 'Portátiles',
            'icon'  => 'fa-laptop',
            'count' => 0,
            'slug'  => 'portatiles',
            'link'  => '#',
        ),
        array(
            'name'  => 'Tablets',
            'icon'  => 'fa-tablet-alt',
            'count' => 0,
            'slug'  => 'tablets',
            'link'  => '#',
        ),
        array(
            'name'  => 'Televisores',
            'icon'  => 'fa-tv',
            'count' => 0,
            'slug'  => 'televisores',
            'link'  => '#',
        ),
        array(
            'name'  => 'Electrodomésticos',
            'icon'  => 'fa-blender',
            'count' => 0,
            'slug'  => 'electrodomesticos',
            'link'  => '#',
        ),
        array(
            'name'  => 'Accesorios',
            'icon'  => 'fa-headphones',
            'count' => 0,
            'slug'  => 'accesorios',
            'link'  => '#',
        ),
    );
}

/**
 * WooCommerce Dynamic Product Functions
 */

// Get on-sale products
function electromti_get_sale_products($limit = 5) {
    if (!class_exists('WooCommerce')) {
        return electromti_get_sample_products();
    }

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
        'meta_query'     => array(
            'relation' => 'OR',
            array(
                'key'     => '_sale_price',
                'value'   => 0,
                'compare' => '>',
                'type'    => 'NUMERIC',
            ),
            array(
                'key'     => '_min_variation_sale_price',
                'value'   => 0,
                'compare' => '>',
                'type'    => 'NUMERIC',
            ),
        ),
    );

    return new WP_Query($args);
}

// Get featured products
function electromti_get_featured_products($limit = 5) {
    if (!class_exists('WooCommerce')) {
        return electromti_get_sample_products();
    }

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
            ),
        ),
    );

    return new WP_Query($args);
}

// Get best selling products
function electromti_get_bestseller_products($limit = 5) {
    if (!class_exists('WooCommerce')) {
        return electromti_get_sample_products();
    }

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
        'meta_key'       => 'total_sales',
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC',
    );

    return new WP_Query($args);
}

// Get newest products
function electromti_get_new_products($limit = 5) {
    if (!class_exists('WooCommerce')) {
        return electromti_get_sample_products();
    }

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    return new WP_Query($args);
}

// Get products by category
function electromti_get_products_by_category($category_slug, $limit = 5) {
    if (!class_exists('WooCommerce')) {
        return electromti_get_sample_products();
    }

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $category_slug,
            ),
        ),
    );

    return new WP_Query($args);
}

// Helper function to render a product card
function electromti_render_product_card($product) {
    if (!$product instanceof WC_Product) {
        return;
    }

    $product_id = $product->get_id();
    $product_name = $product->get_name();
    $product_link = get_permalink($product_id);
    $product_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'product-thumb');
    $product_image_url = $product_image ? $product_image[0] : wc_placeholder_img_src('product-thumb');
    $regular_price = $product->get_regular_price();
    $sale_price = $product->get_sale_price();
    $current_price = $product->get_price();
    $rating = $product->get_average_rating();
    $review_count = $product->get_review_count();

    // Get product categories
    $categories = wp_get_post_terms($product_id, 'product_cat');
    $category_name = !empty($categories) ? $categories[0]->name : '';

    // Determine badge
    $badge = '';
    $badge_class = '';
    if ($product->is_on_sale() && $regular_price > 0) {
        $discount = round((($regular_price - $sale_price) / $regular_price) * 100);
        $badge = '-' . $discount . '%';
        $badge_class = 'sale';
    } elseif ($product->is_featured()) {
        $badge = 'TOP';
        $badge_class = 'hot';
    } else {
        // Check if product is new (added in last 30 days)
        $post_date = get_the_date('U', $product_id);
        $thirty_days_ago = strtotime('-30 days');
        if ($post_date > $thirty_days_ago) {
            $badge = 'NUEVO';
            $badge_class = 'new';
        }
    }
    ?>
    <div class="product-card">
        <?php if (!empty($badge)) : ?>
        <span class="product-badge <?php echo esc_attr($badge_class); ?>">
            <?php echo esc_html($badge); ?>
        </span>
        <?php endif; ?>

        <div class="product-image">
            <a href="<?php echo esc_url($product_link); ?>">
                <img src="<?php echo esc_url($product_image_url); ?>" alt="<?php echo esc_attr($product_name); ?>">
            </a>
            <div class="product-actions">
                <button class="product-action-btn wishlist-btn" data-product-id="<?php echo esc_attr($product_id); ?>" title="<?php esc_attr_e('Añadir a favoritos', 'electromti'); ?>">
                    <i class="far fa-heart"></i>
                </button>
                <button class="product-action-btn compare-btn" data-product-id="<?php echo esc_attr($product_id); ?>" title="<?php esc_attr_e('Comparar', 'electromti'); ?>">
                    <i class="fas fa-exchange-alt"></i>
                </button>
            </div>
        </div>

        <div class="product-info">
            <?php if (!empty($category_name)) : ?>
            <span class="product-category"><?php echo esc_html($category_name); ?></span>
            <?php endif; ?>
            <h3 class="product-title">
                <a href="<?php echo esc_url($product_link); ?>"><?php echo esc_html($product_name); ?></a>
            </h3>
            <div class="product-rating">
                <?php echo electromti_star_rating($rating); ?>
                <span>(<?php echo esc_html($review_count); ?>)</span>
            </div>
            <div class="product-price">
                <span class="current-price"><?php echo wc_price($current_price); ?></span>
                <?php if ($product->is_on_sale() && $regular_price > 0) : ?>
                <span class="old-price"><?php echo wc_price($regular_price); ?></span>
                <?php endif; ?>
            </div>
            <div class="product-footer">
                <button class="add-to-cart-btn" data-product-id="<?php echo esc_attr($product_id); ?>">
                    <i class="fas fa-shopping-cart"></i>
                    <?php esc_html_e('Añadir', 'electromti'); ?>
                </button>
                <a href="<?php echo esc_url($product_link); ?>" class="quick-view-btn" title="<?php esc_attr_e('Ver detalles', 'electromti'); ?>">
                    <i class="fas fa-eye"></i>
                </a>
            </div>
        </div>
    </div>
    <?php
}

// Check if WooCommerce has products
function electromti_has_wc_products() {
    if (!class_exists('WooCommerce')) {
        return false;
    }

    $count = wp_count_posts('product');
    return ($count->publish > 0);
}

/**
 * WooCommerce Support
 */
function electromti_woocommerce_support() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'electromti_woocommerce_support');

// Remove WooCommerce default styles
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * AJAX Add to Cart
 */
function electromti_ajax_add_to_cart() {
    check_ajax_referer('electromti_nonce', 'nonce');

    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    if ($product_id && class_exists('WooCommerce')) {
        WC()->cart->add_to_cart($product_id, $quantity);

        wp_send_json_success(array(
            'cart_count' => WC()->cart->get_cart_contents_count(),
            'message'    => __('Product added to cart!', 'electromti'),
        ));
    }

    wp_send_json_error(array('message' => __('Error adding product', 'electromti')));
}
add_action('wp_ajax_electromti_add_to_cart', 'electromti_ajax_add_to_cart');
add_action('wp_ajax_nopriv_electromti_add_to_cart', 'electromti_ajax_add_to_cart');

/**
 * Custom Login Page Styles
 */
function electromti_login_styles() {
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome-login', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');

    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts-login', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap', array(), null);

    // Enqueue custom login styles
    wp_enqueue_style('electromti-login', get_template_directory_uri() . '/assets/css/login.css', array(), '1.0.0');
}
add_action('login_enqueue_scripts', 'electromti_login_styles');

/**
 * Custom Login Logo URL
 */
function electromti_login_logo_url() {
    return home_url('/');
}
add_filter('login_headerurl', 'electromti_login_logo_url');

/**
 * Custom Login Logo Title
 */
function electromti_login_logo_title() {
    return 'ElectroMTI - Tu tienda de electrónica';
}
add_filter('login_headertext', 'electromti_login_logo_title');

/**
 * Add body font family to login page
 */
function electromti_login_head() {
    echo '<style>
        body.login, #login, #loginform, #registerform, #lostpasswordform {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        }
    </style>';
}
add_action('login_head', 'electromti_login_head');
