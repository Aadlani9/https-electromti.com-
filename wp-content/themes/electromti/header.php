<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ElectroMTI - Los mejores móviles y electrónicos a precios excepcionales. Venta al por mayor y menor en Torre Pacheco, Murcia.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Top Bar -->
<div class="top-bar">
    <div class="container">
        <div class="top-bar-content">
            <div class="top-bar-left">
                <a href="tel:<?php echo esc_attr(electromti_get_option('phone_1', '602861227')); ?>">
                    <i class="fas fa-phone-alt"></i> <?php echo esc_html(electromti_get_option('phone_1', '602 861 227')); ?>
                </a>
                <a href="mailto:<?php echo esc_attr(electromti_get_option('contact_email', 'contact@electromti.com')); ?>">
                    <i class="fas fa-envelope"></i> <?php echo esc_html(electromti_get_option('contact_email', 'contact@electromti.com')); ?>
                </a>
                <span>
                    <i class="fas fa-map-marker-alt"></i> <?php echo esc_html(electromti_get_option('store_address', 'Avenida Estación, 42 - Torre Pacheco, Murcia')); ?>
                </span>
            </div>
            <div class="top-bar-right">
                <a href="#"><i class="fas fa-truck"></i> Envío gratis +50€</a>
                <a href="#"><i class="fas fa-undo"></i> Devoluciones 14 días</a>
                <a href="#"><i class="fas fa-shield-alt"></i> Pago seguro</a>
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<header class="site-header">
    <div class="header-main">
        <div class="container">
            <div class="header-content">
                <!-- Logo -->
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                    <i class="fas fa-bolt"></i>
                    <span>ELECTROMTI</span>
                </a>

                <!-- Search Bar -->
                <div class="search-bar">
                    <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                        <select name="product_cat">
                            <option value=""><?php _e('Todas las categorías', 'electromti'); ?></option>
                            <option value="moviles"><?php _e('Móviles', 'electromti'); ?></option>
                            <option value="portatiles"><?php _e('Portátiles', 'electromti'); ?></option>
                            <option value="tablets"><?php _e('Tablets', 'electromti'); ?></option>
                            <option value="televisores"><?php _e('Televisores', 'electromti'); ?></option>
                            <option value="electrodomesticos"><?php _e('Electrodomésticos', 'electromti'); ?></option>
                            <option value="accesorios"><?php _e('Accesorios', 'electromti'); ?></option>
                        </select>
                        <input type="text" name="s" placeholder="<?php _e('Buscar productos...', 'electromti'); ?>" value="<?php echo get_search_query(); ?>">
                        <input type="hidden" name="post_type" value="product">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>

                <!-- Header Actions -->
                <div class="header-actions">
                    <a href="#" class="header-action" title="<?php _e('Buscar con IA', 'electromti'); ?>">
                        <i class="fas fa-microphone"></i>
                        <span><?php _e('Buscar con IA', 'electromti'); ?></span>
                    </a>
                    <a href="<?php echo esc_url(wp_login_url()); ?>" class="header-action">
                        <i class="fas fa-user"></i>
                        <span><?php _e('Mi cuenta', 'electromti'); ?></span>
                    </a>
                    <a href="<?php echo esc_url(function_exists('wc_get_cart_url') ? wc_get_cart_url() : '#'); ?>" class="header-action cart">
                        <i class="fas fa-shopping-cart"></i>
                        <span><?php _e('Mi cesta', 'electromti'); ?></span>
                        <span class="cart-count"><?php echo electromti_get_cart_count(); ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="main-nav">
        <div class="container">
            <div class="nav-content">
                <!-- Categories Button -->
                <button class="categories-btn" id="categoriesToggle">
                    <i class="fas fa-bars"></i>
                    <span><?php _e('Todas las categorías', 'electromti'); ?></span>
                    <i class="fas fa-chevron-down"></i>
                </button>

                <!-- Main Menu -->
                <ul class="nav-menu">
                    <li>
                        <a href="#">
                            <span><?php _e('Ofertas', 'electromti'); ?></span>
                            <i class="fas fa-fire" style="color: #ff6b00;"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span><?php _e('Móviles', 'electromti'); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a href="#"><i class="fab fa-apple"></i> iPhone</a>
                            <a href="#"><i class="fab fa-android"></i> Samsung</a>
                            <a href="#"><i class="fas fa-mobile-alt"></i> Xiaomi</a>
                            <a href="#"><i class="fas fa-mobile-alt"></i> OPPO</a>
                            <a href="#"><i class="fas fa-mobile-alt"></i> Realme</a>
                            <a href="#"><i class="fas fa-mobile-alt"></i> OnePlus</a>
                        </div>
                    </li>
                    <li>
                        <a href="#">
                            <span><?php _e('Portátiles', 'electromti'); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a href="#"><i class="fab fa-apple"></i> MacBook</a>
                            <a href="#"><i class="fas fa-laptop"></i> Gaming</a>
                            <a href="#"><i class="fas fa-laptop"></i> Ultrabooks</a>
                            <a href="#"><i class="fas fa-laptop"></i> 2 en 1</a>
                        </div>
                    </li>
                    <li>
                        <a href="#">
                            <span><?php _e('Electrodomésticos', 'electromti'); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a href="#"><i class="fas fa-snowflake"></i> Frigoríficos</a>
                            <a href="#"><i class="fas fa-soap"></i> Lavadoras</a>
                            <a href="#"><i class="fas fa-wind"></i> Aire Acondicionado</a>
                            <a href="#"><i class="fas fa-blender"></i> Pequeño electrodoméstico</a>
                        </div>
                    </li>
                    <li>
                        <a href="#">
                            <span><?php _e('Accesorios', 'electromti'); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span><?php _e('Mayoristas', 'electromti'); ?></span>
                            <i class="fas fa-crown" style="color: #ffc107;"></i>
                        </a>
                    </li>
                </ul>

                <!-- Repair Button -->
                <?php if (electromti_get_option('repair_enabled', true)) : ?>
                <a href="<?php echo esc_url(electromti_get_option('repair_url', '#repair')); ?>" class="repair-btn">
                    <i class="fas fa-tools"></i>
                    <span><?php echo esc_html(electromti_get_option('repair_text', 'Reparación de Móviles')); ?></span>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>

<main id="main-content">
