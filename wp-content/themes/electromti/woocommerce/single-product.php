<?php
/**
 * Single Product Page
 *
 * @package ElectroMTI
 */

defined('ABSPATH') || exit;

get_header();

// Sample product data for demo (replace with WooCommerce product data)
$product = array(
    'id'          => 1,
    'name'        => 'iPhone 15 Pro Max 256GB - Titanio Natural',
    'brand'       => 'Apple',
    'category'    => 'Móviles',
    'sku'         => 'APL-IP15PM-256-TN',
    'price'       => 1199.00,
    'old_price'   => 1399.00,
    'rating'      => 4.8,
    'reviews'     => 128,
    'stock'       => 15,
    'description' => 'El iPhone 15 Pro Max cuenta con el chip A17 Pro, el más potente jamás creado para un smartphone. Con su diseño en titanio de grado aeroespacial, cámara de 48MP con zoom óptico 5x y el botón de Acción personalizable, es el iPhone más avanzado hasta la fecha.',
    'features'    => array(
        'Chip A17 Pro con GPU de 6 núcleos',
        'Pantalla Super Retina XDR de 6,7"',
        'Cámara principal de 48MP con sensor quad-pixel',
        'Zoom óptico 5x con teleobjetivo de 120mm',
        'Diseño de titanio de grado aeroespacial',
        'Botón de Acción personalizable',
        'USB-C con USB 3 para transferencias rápidas',
        'Hasta 29 horas de reproducción de vídeo',
    ),
    'specs'       => array(
        'Pantalla'     => '6,7" Super Retina XDR OLED',
        'Procesador'   => 'Apple A17 Pro',
        'RAM'          => '8 GB',
        'Almacenamiento' => '256 GB',
        'Cámara trasera' => '48MP + 12MP + 12MP',
        'Cámara frontal' => '12MP TrueDepth',
        'Batería'      => '4422 mAh',
        'Sistema'      => 'iOS 17',
        'Conectividad' => '5G, Wi-Fi 6E, Bluetooth 5.3',
        'Dimensiones'  => '159,9 x 76,7 x 8,25 mm',
        'Peso'         => '221 g',
    ),
    'images'      => array(
        'https://via.placeholder.com/600x600/f5f5f5/333333?text=iPhone+15+Pro+1',
        'https://via.placeholder.com/600x600/f5f5f5/333333?text=iPhone+15+Pro+2',
        'https://via.placeholder.com/600x600/f5f5f5/333333?text=iPhone+15+Pro+3',
        'https://via.placeholder.com/600x600/f5f5f5/333333?text=iPhone+15+Pro+4',
    ),
    'colors'      => array(
        array('name' => 'Titanio Natural', 'code' => '#C4B6A6'),
        array('name' => 'Titanio Azul', 'code' => '#394E5C'),
        array('name' => 'Titanio Blanco', 'code' => '#F2F1EB'),
        array('name' => 'Titanio Negro', 'code' => '#3C3C3D'),
    ),
    'storage'     => array('128GB', '256GB', '512GB', '1TB'),
);

$discount = round((($product['old_price'] - $product['price']) / $product['old_price']) * 100);
?>

<!-- Breadcrumb -->
<nav class="breadcrumb-nav">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i></a></li>
            <li><a href="#"><?php echo esc_html($product['category']); ?></a></li>
            <li><a href="#"><?php echo esc_html($product['brand']); ?></a></li>
            <li class="active"><?php echo esc_html($product['name']); ?></li>
        </ul>
    </div>
</nav>

<!-- Single Product -->
<section class="single-product">
    <div class="container">
        <div class="product-layout">
            <!-- Product Gallery -->
            <div class="product-gallery">
                <div class="gallery-badges">
                    <span class="badge sale">-<?php echo $discount; ?>%</span>
                    <span class="badge free-shipping"><i class="fas fa-truck"></i> Envío gratis</span>
                </div>

                <div class="gallery-main">
                    <img id="mainImage" src="<?php echo esc_url($product['images'][0]); ?>" alt="<?php echo esc_attr($product['name']); ?>">
                    <button class="zoom-btn" title="Ampliar imagen">
                        <i class="fas fa-search-plus"></i>
                    </button>
                </div>

                <div class="gallery-thumbs">
                    <?php foreach ($product['images'] as $index => $image) : ?>
                    <button class="thumb-btn <?php echo $index === 0 ? 'active' : ''; ?>" data-image="<?php echo esc_url($image); ?>">
                        <img src="<?php echo esc_url($image); ?>" alt="Imagen <?php echo $index + 1; ?>">
                    </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Product Info -->
            <div class="product-info-main">
                <div class="product-brand">
                    <img src="https://via.placeholder.com/100x40/ffffff/333333?text=<?php echo esc_attr($product['brand']); ?>" alt="<?php echo esc_attr($product['brand']); ?>">
                </div>

                <h1 class="product-title"><?php echo esc_html($product['name']); ?></h1>

                <div class="product-meta">
                    <div class="product-rating">
                        <div class="stars">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <?php if ($i <= floor($product['rating'])) : ?>
                                    <i class="fas fa-star"></i>
                                <?php elseif ($i - 0.5 <= $product['rating']) : ?>
                                    <i class="fas fa-star-half-alt"></i>
                                <?php else : ?>
                                    <i class="far fa-star"></i>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                        <span class="rating-value"><?php echo $product['rating']; ?></span>
                        <a href="#reviews" class="reviews-link">(<?php echo $product['reviews']; ?> opiniones)</a>
                    </div>
                    <span class="product-sku">SKU: <?php echo esc_html($product['sku']); ?></span>
                </div>

                <div class="product-price-box">
                    <div class="price-main">
                        <span class="current-price"><?php echo electromti_format_price($product['price']); ?></span>
                        <span class="old-price"><?php echo electromti_format_price($product['old_price']); ?></span>
                        <span class="discount-tag">Ahorras <?php echo electromti_format_price($product['old_price'] - $product['price']); ?></span>
                    </div>
                    <div class="price-finance">
                        <i class="fas fa-credit-card"></i>
                        <span>o desde <strong><?php echo electromti_format_price($product['price'] / 12); ?>/mes</strong> en 12 cuotas</span>
                    </div>
                </div>

                <!-- Color Selection -->
                <div class="product-option">
                    <label>Color: <strong>Titanio Natural</strong></label>
                    <div class="color-options">
                        <?php foreach ($product['colors'] as $index => $color) : ?>
                        <button class="color-btn <?php echo $index === 0 ? 'active' : ''; ?>"
                                style="background-color: <?php echo esc_attr($color['code']); ?>"
                                title="<?php echo esc_attr($color['name']); ?>">
                        </button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Storage Selection -->
                <div class="product-option">
                    <label>Capacidad:</label>
                    <div class="storage-options">
                        <?php foreach ($product['storage'] as $index => $storage) : ?>
                        <button class="storage-btn <?php echo $index === 1 ? 'active' : ''; ?>">
                            <?php echo esc_html($storage); ?>
                        </button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Stock Status -->
                <div class="stock-status in-stock">
                    <i class="fas fa-check-circle"></i>
                    <span>En stock - <strong><?php echo $product['stock']; ?> unidades</strong> disponibles</span>
                </div>

                <!-- Add to Cart -->
                <div class="add-to-cart-box">
                    <div class="quantity-selector">
                        <button class="qty-btn minus"><i class="fas fa-minus"></i></button>
                        <input type="number" class="qty-input" value="1" min="1" max="<?php echo $product['stock']; ?>">
                        <button class="qty-btn plus"><i class="fas fa-plus"></i></button>
                    </div>
                    <button class="btn-add-cart">
                        <i class="fas fa-shopping-cart"></i>
                        Añadir al carrito
                    </button>
                    <button class="btn-buy-now">
                        <i class="fas fa-bolt"></i>
                        Comprar ahora
                    </button>
                </div>

                <!-- Quick Actions -->
                <div class="quick-actions">
                    <button class="action-btn">
                        <i class="far fa-heart"></i>
                        <span>Añadir a favoritos</span>
                    </button>
                    <button class="action-btn">
                        <i class="fas fa-exchange-alt"></i>
                        <span>Comparar</span>
                    </button>
                    <button class="action-btn">
                        <i class="fas fa-share-alt"></i>
                        <span>Compartir</span>
                    </button>
                </div>

                <!-- Delivery Info -->
                <div class="delivery-info">
                    <div class="delivery-item">
                        <i class="fas fa-truck"></i>
                        <div>
                            <strong>Envío gratis</strong>
                            <span>Recíbelo el martes 15 de febrero</span>
                        </div>
                    </div>
                    <div class="delivery-item">
                        <i class="fas fa-store"></i>
                        <div>
                            <strong>Recogida en tienda gratis</strong>
                            <span>Disponible en 2 horas en Torre Pacheco</span>
                        </div>
                    </div>
                    <div class="delivery-item">
                        <i class="fas fa-undo"></i>
                        <div>
                            <strong>Devolución gratuita</strong>
                            <span>14 días para devoluciones</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details Tabs -->
        <div class="product-tabs">
            <div class="tabs-nav">
                <button class="tab-btn active" data-tab="description">Descripción</button>
                <button class="tab-btn" data-tab="specs">Especificaciones</button>
                <button class="tab-btn" data-tab="reviews">Opiniones (<?php echo $product['reviews']; ?>)</button>
            </div>

            <div class="tabs-content">
                <!-- Description Tab -->
                <div class="tab-pane active" id="description">
                    <div class="description-content">
                        <h3>Descripción del producto</h3>
                        <p><?php echo esc_html($product['description']); ?></p>

                        <h4>Características principales</h4>
                        <ul class="features-list">
                            <?php foreach ($product['features'] as $feature) : ?>
                            <li><i class="fas fa-check"></i> <?php echo esc_html($feature); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Specifications Tab -->
                <div class="tab-pane" id="specs">
                    <div class="specs-content">
                        <h3>Especificaciones técnicas</h3>
                        <table class="specs-table">
                            <?php foreach ($product['specs'] as $key => $value) : ?>
                            <tr>
                                <th><?php echo esc_html($key); ?></th>
                                <td><?php echo esc_html($value); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>

                <!-- Reviews Tab -->
                <div class="tab-pane" id="reviews">
                    <div class="reviews-content">
                        <div class="reviews-summary">
                            <div class="rating-big">
                                <span class="rating-number"><?php echo $product['rating']; ?></span>
                                <div class="rating-stars">
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <?php if ($i <= floor($product['rating'])) : ?>
                                            <i class="fas fa-star"></i>
                                        <?php elseif ($i - 0.5 <= $product['rating']) : ?>
                                            <i class="fas fa-star-half-alt"></i>
                                        <?php else : ?>
                                            <i class="far fa-star"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                                <span class="rating-count"><?php echo $product['reviews']; ?> opiniones</span>
                            </div>
                            <div class="rating-bars">
                                <div class="rating-bar">
                                    <span>5 <i class="fas fa-star"></i></span>
                                    <div class="bar"><div class="fill" style="width: 75%;"></div></div>
                                    <span>96</span>
                                </div>
                                <div class="rating-bar">
                                    <span>4 <i class="fas fa-star"></i></span>
                                    <div class="bar"><div class="fill" style="width: 18%;"></div></div>
                                    <span>23</span>
                                </div>
                                <div class="rating-bar">
                                    <span>3 <i class="fas fa-star"></i></span>
                                    <div class="bar"><div class="fill" style="width: 5%;"></div></div>
                                    <span>6</span>
                                </div>
                                <div class="rating-bar">
                                    <span>2 <i class="fas fa-star"></i></span>
                                    <div class="bar"><div class="fill" style="width: 2%;"></div></div>
                                    <span>2</span>
                                </div>
                                <div class="rating-bar">
                                    <span>1 <i class="fas fa-star"></i></span>
                                    <div class="bar"><div class="fill" style="width: 1%;"></div></div>
                                    <span>1</span>
                                </div>
                            </div>
                        </div>

                        <!-- Sample Reviews -->
                        <div class="reviews-list">
                            <div class="review-item">
                                <div class="review-header">
                                    <div class="reviewer-avatar">JM</div>
                                    <div class="reviewer-info">
                                        <strong>Juan M.</strong>
                                        <span>Compra verificada - 10/02/2024</span>
                                    </div>
                                    <div class="review-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <h4>Increíble teléfono</h4>
                                <p>El mejor iPhone que he tenido. La cámara es espectacular y el rendimiento es brutal. El diseño en titanio se siente premium.</p>
                            </div>
                            <div class="review-item">
                                <div class="review-header">
                                    <div class="reviewer-avatar">ML</div>
                                    <div class="reviewer-info">
                                        <strong>María L.</strong>
                                        <span>Compra verificada - 05/02/2024</span>
                                    </div>
                                    <div class="review-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                </div>
                                <h4>Muy satisfecha</h4>
                                <p>Excelente servicio de ElectroMTI. El teléfono llegó muy rápido y en perfectas condiciones. El zoom 5x es una pasada.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="related-products">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <i class="fas fa-th-large"></i>
                Productos relacionados
            </h2>
            <a href="#" class="view-all">Ver más <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="products-grid">
            <?php
            $related = array_slice(electromti_get_sample_products(), 0, 5);
            foreach ($related as $item) :
            ?>
            <div class="product-card">
                <?php if (!empty($item['badge'])) : ?>
                <span class="product-badge <?php echo esc_attr($item['badge']); ?>">
                    <?php
                    $badges = array(
                        'sale' => '-' . round((($item['old_price'] - $item['price']) / $item['old_price']) * 100) . '%',
                        'new'  => 'NUEVO',
                        'hot'  => 'TOP',
                    );
                    echo esc_html($badges[$item['badge']] ?? '');
                    ?>
                </span>
                <?php endif; ?>
                <div class="product-image">
                    <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['name']); ?>">
                    <div class="product-actions">
                        <button class="product-action-btn"><i class="far fa-heart"></i></button>
                        <button class="product-action-btn"><i class="fas fa-exchange-alt"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <span class="product-category"><?php echo esc_html($item['category']); ?></span>
                    <h3 class="product-title"><a href="#"><?php echo esc_html($item['name']); ?></a></h3>
                    <div class="product-rating">
                        <?php echo electromti_star_rating($item['rating']); ?>
                        <span>(<?php echo $item['reviews']; ?>)</span>
                    </div>
                    <div class="product-price">
                        <span class="current-price"><?php echo electromti_format_price($item['price']); ?></span>
                        <?php if (!empty($item['old_price'])) : ?>
                        <span class="old-price"><?php echo electromti_format_price($item['old_price']); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="product-footer">
                        <button class="add-to-cart-btn"><i class="fas fa-shopping-cart"></i> Añadir</button>
                        <button class="quick-view-btn"><i class="fas fa-eye"></i></button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
