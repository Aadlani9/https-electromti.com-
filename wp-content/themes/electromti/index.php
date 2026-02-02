<?php
/**
 * The main template file
 *
 * @package ElectroMTI
 */

get_header();

// Get sample data
$products = electromti_get_sample_products();
$categories = electromti_get_categories();
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
                            <span class="slide-badge">-15% DESCUENTO</span>
                            <h2 class="slide-title">iPhone 15 Pro Max</h2>
                            <p class="slide-desc">El iPhone más potente. Chip A17 Pro, cámara de 48MP y diseño en titanio.</p>
                            <div class="slide-price">
                                1.199€ <span class="old-price">1.399€</span>
                            </div>
                            <a href="#" class="slide-btn">
                                Ver ofertas <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="slide-image">
                            <img src="https://placehold.co/400x400/f5f5f5/333333?text=iPhone+15+Pro" alt="iPhone 15 Pro Max">
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="slide">
                    <div class="slide-content" style="background: linear-gradient(135deg, #1a1a2e 0%, #0f3460 100%);">
                        <div class="slide-text">
                            <span class="slide-badge" style="background: #14e6f4; color: #072553;">NUEVO</span>
                            <h2 class="slide-title">Samsung Galaxy S24 Ultra</h2>
                            <p class="slide-desc">Galaxy AI integrada. La experiencia Samsung más avanzada.</p>
                            <div class="slide-price">
                                1.099€ <span class="old-price">1.299€</span>
                            </div>
                            <a href="#" class="slide-btn">
                                Comprar ahora <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="slide-image">
                            <img src="https://placehold.co/400x400/f5f5f5/333333?text=Galaxy+S24" alt="Samsung Galaxy S24">
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="slide">
                    <div class="slide-content" style="background: linear-gradient(135deg, #ff6b00 0%, #ff8533 100%);">
                        <div class="slide-text">
                            <span class="slide-badge" style="background: white; color: #ff6b00;">OFERTAS</span>
                            <h2 class="slide-title">Electrodomésticos</h2>
                            <p class="slide-desc">Hasta 40% de descuento en electrodomésticos seleccionados.</p>
                            <div class="slide-price">
                                Desde 199€
                            </div>
                            <a href="#" class="slide-btn" style="background: #072553;">
                                Ver todo <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="slide-image">
                            <img src="https://placehold.co/400x400/f5f5f5/333333?text=Electrodomesticos" alt="Electrodomésticos">
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
                <div class="side-banner orange">
                    <div class="side-banner-content">
                        <span class="side-banner-badge">MAYORISTAS</span>
                        <h3>Venta al por mayor</h3>
                        <p>Precios especiales para profesionales</p>
                    </div>
                </div>
                <div class="side-banner cyan">
                    <div class="side-banner-content">
                        <span class="side-banner-badge"><i class="fas fa-tools"></i> SERVICIO</span>
                        <h3>Reparación express</h3>
                        <p>Tu móvil como nuevo en 24h</p>
                    </div>
                </div>
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
            <a href="#" class="view-all">
                <?php _e('Ver todas', 'electromti'); ?> <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="categories-grid">
            <?php foreach ($categories as $category) : ?>
            <a href="#" class="category-card">
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

<!-- Featured Products -->
<section class="products-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <i class="fas fa-fire"></i>
                <?php _e('Ofertas del momento', 'electromti'); ?>
            </h2>
            <a href="#" class="view-all">
                <?php _e('Ver más', 'electromti'); ?> <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <!-- Tabs -->
        <div class="products-tabs">
            <button class="tab-btn active" data-tab="all"><?php _e('Todos', 'electromti'); ?></button>
            <button class="tab-btn" data-tab="moviles"><?php _e('Móviles', 'electromti'); ?></button>
            <button class="tab-btn" data-tab="portatiles"><?php _e('Portátiles', 'electromti'); ?></button>
            <button class="tab-btn" data-tab="electrodomesticos"><?php _e('Electrodomésticos', 'electromti'); ?></button>
            <button class="tab-btn" data-tab="accesorios"><?php _e('Accesorios', 'electromti'); ?></button>
        </div>

        <!-- Products Grid -->
        <div class="products-grid">
            <?php foreach (array_slice($products, 0, 5) as $product) : ?>
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
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Best Sellers -->
<section class="products-section" style="background: white;">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <i class="fas fa-star"></i>
                <?php _e('Los más vendidos', 'electromti'); ?>
            </h2>
            <a href="#" class="view-all">
                <?php _e('Ver más', 'electromti'); ?> <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <!-- Products Grid -->
        <div class="products-grid">
            <?php foreach (array_slice($products, 5, 5) as $product) : ?>
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
            <?php endforeach; ?>
        </div>
    </div>
</section>

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
