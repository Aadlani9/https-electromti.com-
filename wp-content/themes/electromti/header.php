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

<!-- Header -->
<header class="site-header">
    <div class="header-main">
        <div class="container">
            <div class="header-content">
                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="<?php _e('Abrir menú', 'electromti'); ?>">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Logo -->
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="ElectroMTI" class="logo-image">
                    <span class="logo-text">ELECTROMTI</span>
                </a>

                <!-- Search Bar (Desktop) -->
                <div class="search-bar desktop-search">
                    <button type="button" class="search-trigger" id="searchTrigger">
                        <span class="search-placeholder"><?php _e('Buscar', 'electromti'); ?></span>
                        <i class="fas fa-search"></i>
                    </button>
                </div>

                <!-- Search Bar (Mobile) - Click to open panel -->
                <button class="mobile-search-btn" id="mobileSearchBtn" aria-label="<?php _e('Buscar', 'electromti'); ?>">
                    <i class="fas fa-search"></i>
                </button>

                <!-- Header Actions -->
                <div class="header-actions">
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

    <!-- Tagline Bar -->
    <div class="tagline-bar">
        <div class="container">
            <span class="tagline-text"><strong><?php _e('Expertos en tecnología', 'electromti'); ?></strong> <?php _e('con un servicio 5 estrellas', 'electromti'); ?></span>
        </div>
    </div>

    <!-- Navigation (Desktop Only) -->
    <nav class="main-nav desktop-nav">
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

                <!-- Repair Button (Desktop) -->
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

<!-- Search Panel (Full Screen) -->
<div class="search-panel" id="searchPanel" aria-hidden="true">
    <div class="search-panel-header">
        <button class="search-panel-back" id="searchPanelBack" aria-label="<?php _e('Volver', 'electromti'); ?>">
            <i class="fas fa-arrow-left"></i>
        </button>
        <form class="search-panel-form" action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search">
            <input type="text" name="s" id="searchPanelInput" placeholder="<?php _e('Buscar', 'electromti'); ?>" autocomplete="off">
            <input type="hidden" name="post_type" value="product">
            <button type="submit" class="search-panel-submit" aria-label="<?php _e('Buscar', 'electromti'); ?>">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    <div class="search-panel-content">
        <h3 class="search-suggestions-title"><?php _e('LO MÁS BUSCADO', 'electromti'); ?></h3>
        <ul class="search-suggestions">
            <li><a href="?s=iphone&post_type=product">iphone</a></li>
            <li><a href="?s=samsung&post_type=product">samsung</a></li>
            <li><a href="?s=portatil&post_type=product">portátil</a></li>
            <li><a href="?s=tablet&post_type=product">tablet</a></li>
            <li><a href="?s=televisor&post_type=product">televisor</a></li>
            <li><a href="?s=auriculares&post_type=product">auriculares</a></li>
            <li><a href="?s=xiaomi&post_type=product">xiaomi</a></li>
            <li><a href="?s=macbook&post_type=product">macbook</a></li>
            <li><a href="?s=lavadora&post_type=product">lavadora</a></li>
            <li><a href="?s=frigorifico&post_type=product">frigorífico</a></li>
        </ul>
    </div>
</div>

<!-- Mobile Menu Panel -->
<aside class="mobile-menu-panel" id="mobileMenuPanel" aria-hidden="true">
    <div class="mobile-menu-header">
        <span class="mobile-menu-title"><?php _e('Categorías', 'electromti'); ?></span>
        <button class="mobile-menu-close" id="mobileMenuClose" aria-label="<?php _e('Cerrar menú', 'electromti'); ?>">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <nav class="mobile-menu-content">
        <!-- Repair Button - Prominent at top -->
        <?php if (electromti_get_option('repair_enabled', true)) : ?>
        <a href="<?php echo esc_url(electromti_get_option('repair_url', '#repair')); ?>" class="mobile-repair-btn">
            <i class="fas fa-tools"></i>
            <span><?php echo esc_html(electromti_get_option('repair_text', 'Reparación de Móviles')); ?></span>
            <i class="fas fa-chevron-right"></i>
        </a>
        <?php endif; ?>

        <div class="mobile-menu-divider"></div>
        <h3 class="mobile-menu-section-title"><?php _e('Categorías', 'electromti'); ?></h3>

        <ul class="mobile-menu-list">
            <li>
                <a href="#">
                    <i class="fas fa-fire"></i>
                    <span><?php _e('Ofertas', 'electromti'); ?></span>
                    <span class="badge-featured"><?php _e('Destacado', 'electromti'); ?></span>
                </a>
            </li>
            <li class="has-submenu">
                <a href="#" class="mobile-menu-item-toggle">
                    <i class="fas fa-mobile-alt"></i>
                    <span><?php _e('Móviles', 'electromti'); ?></span>
                    <i class="fas fa-chevron-down toggle-icon"></i>
                </a>
                <ul class="mobile-submenu">
                    <li><a href="#"><i class="fab fa-apple"></i> iPhone</a></li>
                    <li><a href="#"><i class="fab fa-android"></i> Samsung</a></li>
                    <li><a href="#"><i class="fas fa-mobile-alt"></i> Xiaomi</a></li>
                    <li><a href="#"><i class="fas fa-mobile-alt"></i> OPPO</a></li>
                    <li><a href="#"><i class="fas fa-mobile-alt"></i> Realme</a></li>
                    <li><a href="#"><i class="fas fa-mobile-alt"></i> OnePlus</a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <a href="#" class="mobile-menu-item-toggle">
                    <i class="fas fa-laptop"></i>
                    <span><?php _e('Portátiles', 'electromti'); ?></span>
                    <i class="fas fa-chevron-down toggle-icon"></i>
                </a>
                <ul class="mobile-submenu">
                    <li><a href="#"><i class="fab fa-apple"></i> MacBook</a></li>
                    <li><a href="#"><i class="fas fa-gamepad"></i> Gaming</a></li>
                    <li><a href="#"><i class="fas fa-laptop"></i> Ultrabooks</a></li>
                    <li><a href="#"><i class="fas fa-laptop"></i> 2 en 1</a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <a href="#" class="mobile-menu-item-toggle">
                    <i class="fas fa-blender"></i>
                    <span><?php _e('Electrodomésticos', 'electromti'); ?></span>
                    <i class="fas fa-chevron-down toggle-icon"></i>
                </a>
                <ul class="mobile-submenu">
                    <li><a href="#"><i class="fas fa-snowflake"></i> Frigoríficos</a></li>
                    <li><a href="#"><i class="fas fa-soap"></i> Lavadoras</a></li>
                    <li><a href="#"><i class="fas fa-wind"></i> Aire Acondicionado</a></li>
                    <li><a href="#"><i class="fas fa-blender"></i> Pequeño electrodoméstico</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-headphones"></i>
                    <span><?php _e('Accesorios', 'electromti'); ?></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-crown"></i>
                    <span><?php _e('Mayoristas', 'electromti'); ?></span>
                    <span class="badge-pro">PRO</span>
                </a>
            </li>
        </ul>

        <div class="mobile-menu-divider"></div>
        <h3 class="mobile-menu-section-title"><?php _e('Trending', 'electromti'); ?></h3>

        <ul class="mobile-menu-list mobile-menu-trending">
            <li><a href="#"><span><?php _e('Configurador PCs', 'electromti'); ?></span></a></li>
            <li><a href="#"><span><?php _e('Reacondicionados', 'electromti'); ?></span></a></li>
            <li><a href="#"><span><?php _e('Servicios', 'electromti'); ?></span></a></li>
        </ul>
    </nav>
</aside>
<div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>

<main id="main-content">
