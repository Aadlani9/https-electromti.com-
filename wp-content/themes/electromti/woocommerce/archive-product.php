<?php
/**
 * Shop/Archive Product Page
 *
 * @package ElectroMTI
 */

defined('ABSPATH') || exit;

get_header();

// Get sample products
$products = electromti_get_sample_products();
$categories = electromti_get_categories();

// Current filter values (demo)
$current_category = isset($_GET['cat']) ? sanitize_text_field($_GET['cat']) : 'all';
$current_sort = isset($_GET['sort']) ? sanitize_text_field($_GET['sort']) : 'popular';
$current_view = isset($_GET['view']) ? sanitize_text_field($_GET['view']) : 'grid';
?>

<!-- Breadcrumb -->
<nav class="breadcrumb-nav">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i></a></li>
            <li class="active">Tienda</li>
        </ul>
    </div>
</nav>

<!-- Shop Header -->
<section class="shop-header">
    <div class="container">
        <div class="shop-header-content">
            <div class="shop-title">
                <h1><i class="fas fa-store"></i> Todos los productos</h1>
                <span class="products-count"><?php echo count($products); ?> productos encontrados</span>
            </div>
            <div class="shop-banner">
                <div class="banner-content">
                    <span class="banner-badge">OFERTAS</span>
                    <h3>Hasta 40% de descuento</h3>
                    <p>En productos seleccionados</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Shop Content -->
<section class="shop-content">
    <div class="container">
        <div class="shop-layout">
            <!-- Sidebar Filters -->
            <aside class="shop-sidebar">
                <!-- Categories Filter -->
                <div class="filter-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-list"></i> Categorías
                    </h3>
                    <ul class="category-filter">
                        <li>
                            <a href="?cat=all" class="<?php echo $current_category === 'all' ? 'active' : ''; ?>">
                                <span>Todas las categorías</span>
                                <span class="count"><?php echo count($products); ?></span>
                            </a>
                        </li>
                        <?php foreach ($categories as $cat) : ?>
                        <li>
                            <a href="?cat=<?php echo esc_attr($cat['slug']); ?>" class="<?php echo $current_category === $cat['slug'] ? 'active' : ''; ?>">
                                <i class="fas <?php echo esc_attr($cat['icon']); ?>"></i>
                                <span><?php echo esc_html($cat['name']); ?></span>
                                <span class="count"><?php echo $cat['count']; ?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Price Filter -->
                <div class="filter-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-euro-sign"></i> Precio
                    </h3>
                    <div class="price-filter">
                        <div class="price-inputs">
                            <div class="input-group">
                                <span>Min</span>
                                <input type="number" id="priceMin" value="0" min="0">
                            </div>
                            <span class="separator">-</span>
                            <div class="input-group">
                                <span>Max</span>
                                <input type="number" id="priceMax" value="2000" max="5000">
                            </div>
                        </div>
                        <div class="price-slider">
                            <input type="range" id="priceRange" min="0" max="2000" value="2000">
                        </div>
                        <button class="btn-filter">Aplicar filtro</button>
                    </div>
                </div>

                <!-- Brand Filter -->
                <div class="filter-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-tag"></i> Marca
                    </h3>
                    <div class="brand-filter">
                        <label class="checkbox-item">
                            <input type="checkbox" checked> Apple
                            <span class="checkmark"></span>
                            <span class="count">(45)</span>
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" checked> Samsung
                            <span class="checkmark"></span>
                            <span class="count">(38)</span>
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox"> Xiaomi
                            <span class="checkmark"></span>
                            <span class="count">(52)</span>
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox"> Sony
                            <span class="checkmark"></span>
                            <span class="count">(23)</span>
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox"> LG
                            <span class="checkmark"></span>
                            <span class="count">(31)</span>
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox"> Dyson
                            <span class="checkmark"></span>
                            <span class="count">(18)</span>
                        </label>
                    </div>
                </div>

                <!-- Rating Filter -->
                <div class="filter-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-star"></i> Valoración
                    </h3>
                    <div class="rating-filter">
                        <label class="radio-item">
                            <input type="radio" name="rating" value="5">
                            <span class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="count">(56)</span>
                        </label>
                        <label class="radio-item">
                            <input type="radio" name="rating" value="4">
                            <span class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </span>
                            <span>y más</span>
                            <span class="count">(89)</span>
                        </label>
                        <label class="radio-item">
                            <input type="radio" name="rating" value="3">
                            <span class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </span>
                            <span>y más</span>
                            <span class="count">(112)</span>
                        </label>
                    </div>
                </div>

                <!-- Availability Filter -->
                <div class="filter-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-box"></i> Disponibilidad
                    </h3>
                    <div class="availability-filter">
                        <label class="checkbox-item">
                            <input type="checkbox" checked> En stock
                            <span class="checkmark"></span>
                            <span class="count">(156)</span>
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox"> Próximamente
                            <span class="checkmark"></span>
                            <span class="count">(12)</span>
                        </label>
                    </div>
                </div>

                <!-- Clear Filters -->
                <button class="btn-clear-filters">
                    <i class="fas fa-times"></i> Limpiar filtros
                </button>
            </aside>

            <!-- Products Grid -->
            <div class="shop-main">
                <!-- Toolbar -->
                <div class="shop-toolbar">
                    <div class="toolbar-left">
                        <button class="filter-toggle" id="filterToggle">
                            <i class="fas fa-filter"></i> Filtros
                        </button>
                        <div class="active-filters">
                            <span class="filter-tag">Apple <i class="fas fa-times"></i></span>
                            <span class="filter-tag">Samsung <i class="fas fa-times"></i></span>
                        </div>
                    </div>
                    <div class="toolbar-right">
                        <div class="sort-by">
                            <label>Ordenar por:</label>
                            <select id="sortSelect">
                                <option value="popular" <?php echo $current_sort === 'popular' ? 'selected' : ''; ?>>Más populares</option>
                                <option value="newest" <?php echo $current_sort === 'newest' ? 'selected' : ''; ?>>Más recientes</option>
                                <option value="price-low" <?php echo $current_sort === 'price-low' ? 'selected' : ''; ?>>Precio: menor a mayor</option>
                                <option value="price-high" <?php echo $current_sort === 'price-high' ? 'selected' : ''; ?>>Precio: mayor a menor</option>
                                <option value="rating" <?php echo $current_sort === 'rating' ? 'selected' : ''; ?>>Mejor valorados</option>
                                <option value="discount" <?php echo $current_sort === 'discount' ? 'selected' : ''; ?>>Mayor descuento</option>
                            </select>
                        </div>
                        <div class="view-toggle">
                            <button class="view-btn <?php echo $current_view === 'grid' ? 'active' : ''; ?>" data-view="grid" title="Vista en cuadrícula">
                                <i class="fas fa-th"></i>
                            </button>
                            <button class="view-btn <?php echo $current_view === 'list' ? 'active' : ''; ?>" data-view="list" title="Vista en lista">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="products-grid shop-grid" id="productsGrid">
                    <?php foreach ($products as $product) : ?>
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
                            <a href="#">
                                <img src="<?php echo esc_url($product['image']); ?>" alt="<?php echo esc_attr($product['name']); ?>">
                            </a>
                            <div class="product-actions">
                                <button class="product-action-btn" title="Añadir a favoritos">
                                    <i class="far fa-heart"></i>
                                </button>
                                <button class="product-action-btn" title="Comparar">
                                    <i class="fas fa-exchange-alt"></i>
                                </button>
                                <button class="product-action-btn" title="Vista rápida">
                                    <i class="fas fa-eye"></i>
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
                                    Añadir
                                </button>
                                <button class="quick-view-btn" title="Vista rápida">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <nav class="shop-pagination">
                    <ul class="pagination">
                        <li class="disabled">
                            <a href="#"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li class="dots"><span>...</span></li>
                        <li><a href="#">12</a></li>
                        <li>
                            <a href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                    <div class="pagination-info">
                        Mostrando 1-10 de <?php echo count($products); ?> productos
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
