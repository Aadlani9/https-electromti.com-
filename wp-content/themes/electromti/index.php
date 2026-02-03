<?php
/**
 * The main template file
 *
 * @package ElectroMTI
 */

get_header();

// Get categories
$categories = electromti_get_categories();

// Check if WooCommerce is active and has products
$has_wc_products = electromti_has_wc_products();

// Get customizer settings
$offers_count = electromti_get_option('offers_products_count', 5);
$bestsellers_count = electromti_get_option('bestsellers_products_count', 5);
$show_offers = electromti_get_option('show_offers_section', true);
$show_bestsellers = electromti_get_option('show_bestsellers_section', true);
$offers_title = electromti_get_option('offers_section_title', __('Ofertas del momento', 'electromti'));
$bestsellers_title = electromti_get_option('bestsellers_section_title', __('Los más vendidos', 'electromti'));
?>

<!-- Hero Slider -->
<section class="hero-slider">
    <div class="container">
        <div class="slider-container">
            <!-- Main Slider -->
            <div class="main-slider">
                <!-- Slide 1 -->
                <div class="slide active">
                    <div class="slide-content">
                        <div class="slide-text">
                            <span class="slide-badge"><?php echo esc_html(electromti_get_option('hero_banner_1_badge', '-15% DESCUENTO')); ?></span>
                            <h2 class="slide-title"><?php echo esc_html(electromti_get_option('hero_banner_1_title', 'iPhone 15 Pro Max')); ?></h2>
                            <p class="slide-desc"><?php echo esc_html(electromti_get_option('hero_banner_1_desc', 'El iPhone más potente. Chip A17 Pro, cámara de 48MP y diseño en titanio.')); ?></p>
                            <div class="slide-price">
                                <?php echo esc_html(electromti_get_option('hero_banner_1_price', '1.199€')); ?>
                                <?php $old_price_1 = electromti_get_option('hero_banner_1_old_price', '1.399€'); ?>
                                <?php if (!empty($old_price_1)) : ?>
                                <span class="old-price"><?php echo esc_html($old_price_1); ?></span>
                                <?php endif; ?>
                            </div>
                            <a href="<?php echo esc_url(electromti_get_option('hero_banner_1_link', '#')); ?>" class="slide-btn">
                                <?php _e('Ver ofertas', 'electromti'); ?> <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="slide-image">
                            <?php
                            $banner_1_image = electromti_get_option('hero_banner_1_image', '');
                            if (!empty($banner_1_image)) :
                            ?>
                            <img src="<?php echo esc_url($banner_1_image); ?>" alt="<?php echo esc_attr(electromti_get_option('hero_banner_1_title', 'Banner 1')); ?>">
                            <?php else : ?>
                            <img src="https://placehold.co/400x400/f5f5f5/333333?text=iPhone+15+Pro" alt="iPhone 15 Pro Max">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="slide">
                    <div class="slide-content" style="background: linear-gradient(135deg, #1a1a2e 0%, #0f3460 100%);">
                        <div class="slide-text">
                            <span class="slide-badge" style="background: #14e6f4; color: #072553;"><?php echo esc_html(electromti_get_option('hero_banner_2_badge', 'NUEVO')); ?></span>
                            <h2 class="slide-title"><?php echo esc_html(electromti_get_option('hero_banner_2_title', 'Samsung Galaxy S24 Ultra')); ?></h2>
                            <p class="slide-desc"><?php echo esc_html(electromti_get_option('hero_banner_2_desc', 'Galaxy AI integrada. La experiencia Samsung más avanzada.')); ?></p>
                            <div class="slide-price">
                                <?php echo esc_html(electromti_get_option('hero_banner_2_price', '1.099€')); ?>
                                <?php $old_price_2 = electromti_get_option('hero_banner_2_old_price', '1.299€'); ?>
                                <?php if (!empty($old_price_2)) : ?>
                                <span class="old-price"><?php echo esc_html($old_price_2); ?></span>
                                <?php endif; ?>
                            </div>
                            <a href="<?php echo esc_url(electromti_get_option('hero_banner_2_link', '#')); ?>" class="slide-btn">
                                <?php _e('Comprar ahora', 'electromti'); ?> <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="slide-image">
                            <?php
                            $banner_2_image = electromti_get_option('hero_banner_2_image', '');
                            if (!empty($banner_2_image)) :
                            ?>
                            <img src="<?php echo esc_url($banner_2_image); ?>" alt="<?php echo esc_attr(electromti_get_option('hero_banner_2_title', 'Banner 2')); ?>">
                            <?php else : ?>
                            <img src="https://placehold.co/400x400/f5f5f5/333333?text=Galaxy+S24" alt="Samsung Galaxy S24">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="slide">
                    <div class="slide-content" style="background: linear-gradient(135deg, #ff6b00 0%, #ff8533 100%);">
                        <div class="slide-text">
                            <span class="slide-badge" style="background: white; color: #ff6b00;"><?php echo esc_html(electromti_get_option('hero_banner_3_badge', 'OFERTAS')); ?></span>
                            <h2 class="slide-title"><?php echo esc_html(electromti_get_option('hero_banner_3_title', 'Electrodomésticos')); ?></h2>
                            <p class="slide-desc"><?php echo esc_html(electromti_get_option('hero_banner_3_desc', 'Hasta 40% de descuento en electrodomésticos seleccionados.')); ?></p>
                            <div class="slide-price">
                                <?php echo esc_html(electromti_get_option('hero_banner_3_price', 'Desde 199€')); ?>
                            </div>
                            <a href="<?php echo esc_url(electromti_get_option('hero_banner_3_link', '#')); ?>" class="slide-btn" style="background: #072553;">
                                <?php _e('Ver todo', 'electromti'); ?> <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="slide-image">
                            <?php
                            $banner_3_image = electromti_get_option('hero_banner_3_image', '');
                            if (!empty($banner_3_image)) :
                            ?>
                            <img src="<?php echo esc_url($banner_3_image); ?>" alt="<?php echo esc_attr(electromti_get_option('hero_banner_3_title', 'Banner 3')); ?>">
                            <?php else : ?>
                            <img src="https://placehold.co/400x400/f5f5f5/333333?text=Electrodomesticos" alt="Electrodomésticos">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Slider Controls -->
                <div class="slider-controls">
                    <span class="slider-dot active" data-slide="0"></span>
                    <span class="slider-dot" data-slide="1"></span>
                    <span class="slider-dot" data-slide="2"></span>
                </div>
            </div>

            <!-- Side Banners -->
            <div class="side-banners">
                <a href="<?php echo esc_url(electromti_get_option('side_banner_1_link', '#')); ?>" class="side-banner orange">
                    <div class="side-banner-content">
                        <span class="side-banner-badge"><?php echo esc_html(electromti_get_option('side_banner_1_badge', 'MAYORISTAS')); ?></span>
                        <h3><?php echo esc_html(electromti_get_option('side_banner_1_title', 'Venta al por mayor')); ?></h3>
                        <p><?php echo esc_html(electromti_get_option('side_banner_1_desc', 'Precios especiales para profesionales')); ?></p>
                    </div>
                </a>
                <a href="<?php echo esc_url(electromti_get_option('side_banner_2_link', '#')); ?>" class="side-banner cyan">
                    <div class="side-banner-content">
                        <span class="side-banner-badge"><i class="fas fa-tools"></i> <?php echo esc_html(electromti_get_option('side_banner_2_badge', 'SERVICIO')); ?></span>
                        <h3><?php echo esc_html(electromti_get_option('side_banner_2_title', 'Reparación express')); ?></h3>
                        <p><?php echo esc_html(electromti_get_option('side_banner_2_desc', 'Tu móvil como nuevo en 24h')); ?></p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section">
    <div class="container">
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <div class="service-content">
                    <h3><?php _e('Envío Gratis', 'electromti'); ?></h3>
                    <p><?php _e('En pedidos superiores a 50€', 'electromti'); ?></p>
                </div>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-undo"></i>
                </div>
                <div class="service-content">
                    <h3><?php _e('Devoluciones', 'electromti'); ?></h3>
                    <p><?php _e('14 días para devoluciones', 'electromti'); ?></p>
                </div>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="service-content">
                    <h3><?php _e('Pago Seguro', 'electromti'); ?></h3>
                    <p><?php _e('100% seguro con SSL', 'electromti'); ?></p>
                </div>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <div class="service-content">
                    <h3><?php _e('Soporte 24/7', 'electromti'); ?></h3>
                    <p><?php _e('Atención al cliente dedicada', 'electromti'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="categories-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <i class="fas fa-th-large"></i>
                <?php _e('Categorías', 'electromti'); ?>
            </h2>
            <?php if (class_exists('WooCommerce')) : ?>
            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="view-all">
                <?php _e('Ver todas', 'electromti'); ?> <i class="fas fa-arrow-right"></i>
            </a>
            <?php endif; ?>
        </div>
        <div class="categories-grid">
            <?php foreach ($categories as $category) : ?>
            <a href="<?php echo esc_url(isset($category['link']) ? $category['link'] : '#'); ?>" class="category-card">
                <div class="category-icon">
                    <i class="fas <?php echo esc_attr($category['icon']); ?>"></i>
                </div>
                <h3><?php echo esc_html($category['name']); ?></h3>
                <span><?php echo esc_html($category['count']); ?> <?php _e('productos', 'electromti'); ?></span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php if ($show_offers) : ?>
<!-- Featured Products / Offers -->
<section class="products-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <i class="fas fa-fire"></i>
                <?php echo esc_html($offers_title); ?>
            </h2>
            <?php if (class_exists('WooCommerce')) : ?>
            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop')) . '?on_sale=1'); ?>" class="view-all">
                <?php _e('Ver más', 'electromti'); ?> <i class="fas fa-arrow-right"></i>
            </a>
            <?php endif; ?>
        </div>

        <!-- Products Grid -->
        <div class="products-grid">
            <?php
            if ($has_wc_products) :
                // Get sale products from WooCommerce
                $sale_products = electromti_get_sale_products($offers_count);

                if ($sale_products->have_posts()) :
                    while ($sale_products->have_posts()) :
                        $sale_products->the_post();
                        $product = wc_get_product(get_the_ID());
                        if ($product) {
                            electromti_render_product_card($product);
                        }
                    endwhile;
                    wp_reset_postdata();
                else :
                    // If no sale products, show newest products
                    $new_products = electromti_get_new_products($offers_count);
                    if ($new_products->have_posts()) :
                        while ($new_products->have_posts()) :
                            $new_products->the_post();
                            $product = wc_get_product(get_the_ID());
                            if ($product) {
                                electromti_render_product_card($product);
                            }
                        endwhile;
                        wp_reset_postdata();
                    endif;
                endif;
            else :
                // Show sample products
                $products = electromti_get_sample_products();
                foreach (array_slice($products, 0, $offers_count) as $product) :
            ?>
            <div class="product-card">
                <?php if (!empty($product['badge'])) : ?>
                <span class="product-badge <?php echo esc_attr($product['badge']); ?>">
                    <?php
                    $badges = array(
                        'sale' => '-' . round((($product['old_price'] - $product['price']) / $product['old_price']) * 100) . '%',
                        'new'  => 'NUEVO',
                        'hot'  => 'TOP',
                    );
                    echo esc_html($badges[$product['badge']] ?? '');
                    ?>
                </span>
                <?php endif; ?>

                <div class="product-image">
                    <img src="<?php echo esc_url($product['image']); ?>" alt="<?php echo esc_attr($product['name']); ?>">
                    <div class="product-actions">
                        <button class="product-action-btn" title="<?php _e('Añadir a favoritos', 'electromti'); ?>">
                            <i class="far fa-heart"></i>
                        </button>
                        <button class="product-action-btn" title="<?php _e('Comparar', 'electromti'); ?>">
                            <i class="fas fa-exchange-alt"></i>
                        </button>
                    </div>
                </div>

                <div class="product-info">
                    <span class="product-category"><?php echo esc_html($product['category']); ?></span>
                    <h3 class="product-title">
                        <a href="#"><?php echo esc_html($product['name']); ?></a>
                    </h3>
                    <div class="product-rating">
                        <?php echo electromti_star_rating($product['rating']); ?>
                        <span>(<?php echo esc_html($product['reviews']); ?>)</span>
                    </div>
                    <div class="product-price">
                        <span class="current-price"><?php echo electromti_format_price($product['price']); ?></span>
                        <?php if (!empty($product['old_price'])) : ?>
                        <span class="old-price"><?php echo electromti_format_price($product['old_price']); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="product-footer">
                        <button class="add-to-cart-btn" data-product-id="<?php echo esc_attr($product['id']); ?>">
                            <i class="fas fa-shopping-cart"></i>
                            <?php _e('Añadir', 'electromti'); ?>
                        </button>
                        <button class="quick-view-btn" title="<?php _e('Vista rápida', 'electromti'); ?>">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($show_bestsellers) : ?>
<!-- Best Sellers -->
<section class="products-section" style="background: white;">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <i class="fas fa-star"></i>
                <?php echo esc_html($bestsellers_title); ?>
            </h2>
            <?php if (class_exists('WooCommerce')) : ?>
            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop')) . '?orderby=popularity'); ?>" class="view-all">
                <?php _e('Ver más', 'electromti'); ?> <i class="fas fa-arrow-right"></i>
            </a>
            <?php endif; ?>
        </div>

        <!-- Products Grid -->
        <div class="products-grid">
            <?php
            if ($has_wc_products) :
                // Get best sellers from WooCommerce
                $bestsellers = electromti_get_bestseller_products($bestsellers_count);

                if ($bestsellers->have_posts()) :
                    while ($bestsellers->have_posts()) :
                        $bestsellers->the_post();
                        $product = wc_get_product(get_the_ID());
                        if ($product) {
                            electromti_render_product_card($product);
                        }
                    endwhile;
                    wp_reset_postdata();
                endif;
            else :
                // Show sample products
                $products = electromti_get_sample_products();
                foreach (array_slice($products, 5, $bestsellers_count) as $product) :
            ?>
            <div class="product-card">
                <?php if (!empty($product['badge'])) : ?>
                <span class="product-badge <?php echo esc_attr($product['badge']); ?>">
                    <?php
                    $badges = array(
                        'sale' => '-' . round((($product['old_price'] - $product['price']) / $product['old_price']) * 100) . '%',
                        'new'  => 'NUEVO',
                        'hot'  => 'TOP',
                    );
                    echo esc_html($badges[$product['badge']] ?? '');
                    ?>
                </span>
                <?php endif; ?>

                <div class="product-image">
                    <img src="<?php echo esc_url($product['image']); ?>" alt="<?php echo esc_attr($product['name']); ?>">
                    <div class="product-actions">
                        <button class="product-action-btn" title="<?php _e('Añadir a favoritos', 'electromti'); ?>">
                            <i class="far fa-heart"></i>
                        </button>
                        <button class="product-action-btn" title="<?php _e('Comparar', 'electromti'); ?>">
                            <i class="fas fa-exchange-alt"></i>
                        </button>
                    </div>
                </div>

                <div class="product-info">
                    <span class="product-category"><?php echo esc_html($product['category']); ?></span>
                    <h3 class="product-title">
                        <a href="#"><?php echo esc_html($product['name']); ?></a>
                    </h3>
                    <div class="product-rating">
                        <?php echo electromti_star_rating($product['rating']); ?>
                        <span>(<?php echo esc_html($product['reviews']); ?>)</span>
                    </div>
                    <div class="product-price">
                        <span class="current-price"><?php echo electromti_format_price($product['price']); ?></span>
                        <?php if (!empty($product['old_price'])) : ?>
                        <span class="old-price"><?php echo electromti_format_price($product['old_price']); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="product-footer">
                        <button class="add-to-cart-btn" data-product-id="<?php echo esc_attr($product['id']); ?>">
                            <i class="fas fa-shopping-cart"></i>
                            <?php _e('Añadir', 'electromti'); ?>
                        </button>
                        <button class="quick-view-btn" title="<?php _e('Vista rápida', 'electromti'); ?>">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Brands Section -->
<section class="brands-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <i class="fas fa-award"></i>
                <?php _e('Marcas destacadas', 'electromti'); ?>
            </h2>
        </div>
        <div class="brands-slider">
            <div class="brand-item">
                <img src="https://placehold.co/120x50/ffffff/333333?text=Apple" alt="Apple">
            </div>
            <div class="brand-item">
                <img src="https://placehold.co/120x50/ffffff/333333?text=Samsung" alt="Samsung">
            </div>
            <div class="brand-item">
                <img src="https://placehold.co/120x50/ffffff/333333?text=Xiaomi" alt="Xiaomi">
            </div>
            <div class="brand-item">
                <img src="https://placehold.co/120x50/ffffff/333333?text=Sony" alt="Sony">
            </div>
            <div class="brand-item">
                <img src="https://placehold.co/120x50/ffffff/333333?text=LG" alt="LG">
            </div>
            <div class="brand-item">
                <img src="https://placehold.co/120x50/ffffff/333333?text=Dyson" alt="Dyson">
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
