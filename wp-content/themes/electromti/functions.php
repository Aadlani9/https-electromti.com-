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

// Get categories
function electromti_get_categories() {
    return array(
        array(
            'name'  => 'Móviles',
            'icon'  => 'fa-mobile-alt',
            'count' => 156,
            'slug'  => 'moviles',
        ),
        array(
            'name'  => 'Portátiles',
            'icon'  => 'fa-laptop',
            'count' => 89,
            'slug'  => 'portatiles',
        ),
        array(
            'name'  => 'Tablets',
            'icon'  => 'fa-tablet-alt',
            'count' => 45,
            'slug'  => 'tablets',
        ),
        array(
            'name'  => 'Televisores',
            'icon'  => 'fa-tv',
            'count' => 67,
            'slug'  => 'televisores',
        ),
        array(
            'name'  => 'Electrodomésticos',
            'icon'  => 'fa-blender',
            'count' => 123,
            'slug'  => 'electrodomesticos',
        ),
        array(
            'name'  => 'Accesorios',
            'icon'  => 'fa-headphones',
            'count' => 234,
            'slug'  => 'accesorios',
        ),
    );
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
