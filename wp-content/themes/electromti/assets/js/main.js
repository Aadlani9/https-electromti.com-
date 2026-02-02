/**
 * ElectroMTI Theme JavaScript
 *
 * @package ElectroMTI
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        ElectroMTI.init();
    });

    // ElectroMTI Object
    var ElectroMTI = {
        init: function() {
            this.slider();
            this.productTabs();
            this.addToCart();
            this.mobileMenu();
            this.stickyHeader();
            this.searchToggle();
            this.quickView();
            this.wishlist();
        },

        // Hero Slider
        slider: function() {
            var $slider = $('.main-slider');
            if (!$slider.length) return;

            var $slides = $slider.find('.slide');
            var $dots = $slider.find('.slider-dot');
            var currentSlide = 0;
            var slideCount = $slides.length;
            var autoSlide;

            function showSlide(index) {
                $slides.removeClass('active');
                $dots.removeClass('active');
                $slides.eq(index).addClass('active');
                $dots.eq(index).addClass('active');
                currentSlide = index;
            }

            function nextSlide() {
                var next = (currentSlide + 1) % slideCount;
                showSlide(next);
            }

            function startAutoSlide() {
                autoSlide = setInterval(nextSlide, 5000);
            }

            function stopAutoSlide() {
                clearInterval(autoSlide);
            }

            // Dot click
            $dots.on('click', function() {
                var index = $(this).data('slide');
                showSlide(index);
                stopAutoSlide();
                startAutoSlide();
            });

            // Start auto slide
            startAutoSlide();

            // Pause on hover
            $slider.on('mouseenter', stopAutoSlide);
            $slider.on('mouseleave', startAutoSlide);
        },

        // Product Tabs
        productTabs: function() {
            var $tabs = $('.products-tabs .tab-btn');
            if (!$tabs.length) return;

            $tabs.on('click', function() {
                var $this = $(this);
                var tab = $this.data('tab');

                $tabs.removeClass('active');
                $this.addClass('active');

                // Filter products (you can implement AJAX filtering here)
                console.log('Filter by:', tab);
            });
        },

        // Add to Cart
        addToCart: function() {
            var $buttons = $('.add-to-cart-btn');
            if (!$buttons.length) return;

            $buttons.on('click', function(e) {
                e.preventDefault();
                var $btn = $(this);
                var productId = $btn.data('product-id');
                var originalText = $btn.html();

                // Add loading state
                $btn.html('<i class="fas fa-spinner fa-spin"></i>').prop('disabled', true);

                // Simulate AJAX (replace with real AJAX call)
                setTimeout(function() {
                    // Update cart count
                    var $cartCount = $('.cart-count');
                    var count = parseInt($cartCount.text()) || 0;
                    $cartCount.text(count + 1);

                    // Success animation
                    $btn.html('<i class="fas fa-check"></i> Añadido');
                    $btn.addClass('added');

                    // Reset button
                    setTimeout(function() {
                        $btn.html(originalText).prop('disabled', false).removeClass('added');
                    }, 2000);

                    // Show notification
                    ElectroMTI.showNotification('Producto añadido al carrito', 'success');
                }, 500);

                // Real AJAX call (uncomment when WooCommerce is active)
                /*
                $.ajax({
                    url: electromti_ajax.ajax_url,
                    type: 'POST',
                    data: {
                        action: 'electromti_add_to_cart',
                        product_id: productId,
                        quantity: 1,
                        nonce: electromti_ajax.nonce
                    },
                    success: function(response) {
                        if (response.success) {
                            $('.cart-count').text(response.data.cart_count);
                            $btn.html('<i class="fas fa-check"></i> Añadido');
                            ElectroMTI.showNotification(response.data.message, 'success');
                        } else {
                            ElectroMTI.showNotification(response.data.message, 'error');
                        }
                    },
                    error: function() {
                        ElectroMTI.showNotification('Error de conexión', 'error');
                    },
                    complete: function() {
                        setTimeout(function() {
                            $btn.html(originalText).prop('disabled', false);
                        }, 2000);
                    }
                });
                */
            });
        },

        // Mobile Menu
        mobileMenu: function() {
            var $toggle = $('#categoriesToggle');
            var $menu = $('.nav-menu');
            var $mobilePanel = $('#mobileMenuPanel');
            var $mobileOverlay = $('#mobileMenuOverlay');
            var $mobileClose = $('#mobileMenuClose');
            var $submenuToggles = $('.mobile-menu-item-toggle');

            // Toggle for mobile view - open mobile panel
            $toggle.on('click', function() {
                if ($(window).width() <= 768) {
                    // On mobile, open the mobile panel
                    $mobilePanel.addClass('active');
                    $mobileOverlay.addClass('active');
                    $('body').css('overflow', 'hidden');
                } else {
                    // On desktop, toggle dropdown menu
                    $menu.slideToggle(300);
                    $(this).toggleClass('active');
                }
            });

            // Close mobile panel
            $mobileClose.on('click', function() {
                closeMobileMenu();
            });

            $mobileOverlay.on('click', function() {
                closeMobileMenu();
            });

            function closeMobileMenu() {
                $mobilePanel.removeClass('active');
                $mobileOverlay.removeClass('active');
                $('body').css('overflow', '');
            }

            // Submenu toggle
            $submenuToggles.on('click', function(e) {
                e.preventDefault();
                var $parent = $(this).parent();
                $parent.toggleClass('open');
            });

            // Close on window resize
            $(window).on('resize', function() {
                if ($(window).width() > 768) {
                    closeMobileMenu();
                    $menu.show();
                }
            });

            // Close on escape key
            $(document).on('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeMobileMenu();
                }
            });
        },

        // Sticky Header
        stickyHeader: function() {
            var $header = $('.site-header');
            var headerOffset = $header.offset().top;

            $(window).on('scroll', function() {
                if ($(window).scrollTop() > headerOffset + 100) {
                    $header.addClass('sticky');
                } else {
                    $header.removeClass('sticky');
                }
            });
        },

        // Search Toggle
        searchToggle: function() {
            var $searchBar = $('.search-bar');
            var $input = $searchBar.find('input');

            $input.on('focus', function() {
                $searchBar.addClass('focused');
            });

            $input.on('blur', function() {
                if (!$(this).val()) {
                    $searchBar.removeClass('focused');
                }
            });
        },

        // Quick View
        quickView: function() {
            var $buttons = $('.quick-view-btn');
            if (!$buttons.length) return;

            $buttons.on('click', function(e) {
                e.preventDefault();
                var $card = $(this).closest('.product-card');
                var productName = $card.find('.product-title').text();

                // Show quick view modal (implement modal logic)
                ElectroMTI.showNotification('Vista rápida: ' + productName, 'info');
            });
        },

        // Wishlist
        wishlist: function() {
            var $buttons = $('.product-action-btn');
            if (!$buttons.length) return;

            $buttons.on('click', function(e) {
                e.preventDefault();
                var $btn = $(this);
                var $icon = $btn.find('i');

                if ($icon.hasClass('far')) {
                    $icon.removeClass('far').addClass('fas');
                    $btn.addClass('active');
                    ElectroMTI.showNotification('Añadido a favoritos', 'success');
                } else {
                    $icon.removeClass('fas').addClass('far');
                    $btn.removeClass('active');
                    ElectroMTI.showNotification('Eliminado de favoritos', 'info');
                }
            });
        },

        // Notification System
        showNotification: function(message, type) {
            type = type || 'info';
            var icons = {
                success: 'fa-check-circle',
                error: 'fa-times-circle',
                info: 'fa-info-circle',
                warning: 'fa-exclamation-circle'
            };

            var $notification = $('<div class="electromti-notification ' + type + '">' +
                '<i class="fas ' + icons[type] + '"></i>' +
                '<span>' + message + '</span>' +
                '</div>');

            // Add styles if not exists
            if (!$('#electromti-notification-styles').length) {
                $('head').append(
                    '<style id="electromti-notification-styles">' +
                    '.electromti-notification {' +
                    '  position: fixed;' +
                    '  top: 100px;' +
                    '  right: 20px;' +
                    '  padding: 15px 25px;' +
                    '  background: white;' +
                    '  border-radius: 8px;' +
                    '  box-shadow: 0 4px 20px rgba(0,0,0,0.15);' +
                    '  display: flex;' +
                    '  align-items: center;' +
                    '  gap: 10px;' +
                    '  font-size: 14px;' +
                    '  font-weight: 500;' +
                    '  z-index: 9999;' +
                    '  animation: slideInRight 0.3s ease;' +
                    '  border-left: 4px solid #14e6f4;' +
                    '}' +
                    '.electromti-notification.success { border-color: #28a745; }' +
                    '.electromti-notification.success i { color: #28a745; }' +
                    '.electromti-notification.error { border-color: #dc3545; }' +
                    '.electromti-notification.error i { color: #dc3545; }' +
                    '.electromti-notification.info { border-color: #14e6f4; }' +
                    '.electromti-notification.info i { color: #14e6f4; }' +
                    '.electromti-notification.warning { border-color: #ffc107; }' +
                    '.electromti-notification.warning i { color: #ffc107; }' +
                    '@keyframes slideInRight {' +
                    '  from { transform: translateX(100px); opacity: 0; }' +
                    '  to { transform: translateX(0); opacity: 1; }' +
                    '}' +
                    '</style>'
                );
            }

            $('body').append($notification);

            // Remove after 3 seconds
            setTimeout(function() {
                $notification.css({
                    animation: 'slideInRight 0.3s ease reverse forwards'
                });
                setTimeout(function() {
                    $notification.remove();
                }, 300);
            }, 3000);
        }
    };

    // Make ElectroMTI globally accessible
    window.ElectroMTI = ElectroMTI;

})(jQuery);
