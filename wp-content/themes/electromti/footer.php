</main><!-- #main-content -->

<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <!-- Footer Main -->
        <div class="footer-main">
            <!-- Brand Column -->
            <div class="footer-brand">
                <div class="footer-logo">
                    <i class="fas fa-bolt"></i>
                    <span>ELECTROMTI</span>
                </div>
                <p class="footer-desc">
                    <?php _e('Tu tienda de confianza para móviles, electrónica y electrodomésticos. Venta al por mayor y menor con los mejores precios del mercado.', 'electromti'); ?>
                </p>
                <div class="footer-social">
                    <?php if ($facebook = electromti_get_option('facebook_url', 'https://facebook.com/electro.mti')) : ?>
                    <a href="<?php echo esc_url($facebook); ?>" target="_blank" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <?php endif; ?>
                    <?php if ($instagram = electromti_get_option('instagram_url', 'https://instagram.com/electro.mti')) : ?>
                    <a href="<?php echo esc_url($instagram); ?>" target="_blank" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <?php endif; ?>
                    <?php if ($tiktok = electromti_get_option('tiktok_url', 'https://tiktok.com/@electro.mti')) : ?>
                    <a href="<?php echo esc_url($tiktok); ?>" target="_blank" title="TikTok">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <?php endif; ?>
                    <?php if ($twitter = electromti_get_option('twitter_url')) : ?>
                    <a href="<?php echo esc_url($twitter); ?>" target="_blank" title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <?php endif; ?>
                    <?php if ($youtube = electromti_get_option('youtube_url')) : ?>
                    <a href="<?php echo esc_url($youtube); ?>" target="_blank" title="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Products Column -->
            <div class="footer-column">
                <h4><?php _e('Productos', 'electromti'); ?></h4>
                <ul>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Móviles', 'electromti'); ?></a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Portátiles', 'electromti'); ?></a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Tablets', 'electromti'); ?></a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Televisores', 'electromti'); ?></a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Electrodomésticos', 'electromti'); ?></a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Accesorios', 'electromti'); ?></a></li>
                </ul>
            </div>

            <!-- Services Column -->
            <div class="footer-column">
                <h4><?php _e('Servicios', 'electromti'); ?></h4>
                <ul>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Reparación de móviles', 'electromti'); ?></a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Venta al por mayor', 'electromti'); ?></a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Servicio técnico', 'electromti'); ?></a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Instalación', 'electromti'); ?></a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Garantía extendida', 'electromti'); ?></a></li>
                </ul>
            </div>

            <!-- Information Column -->
            <div class="footer-column">
                <h4><?php _e('Información', 'electromti'); ?></h4>
                <ul>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Sobre nosotros', 'electromti'); ?></a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Condiciones de uso', 'electromti'); ?></a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Política de privacidad', 'electromti'); ?></a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Política de devoluciones', 'electromti'); ?></a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Envíos', 'electromti'); ?></a></li>
                </ul>
            </div>

            <!-- Contact Column -->
            <div class="footer-column">
                <h4><?php _e('Contacto', 'electromti'); ?></h4>
                <div class="footer-contact">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?php echo esc_html(electromti_get_option('store_address', 'Avenida Estación, 42 Torre Pacheco, Murcia')); ?></span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone-alt"></i>
                        <span>
                            <?php echo esc_html(electromti_get_option('phone_1', '602 861 227')); ?><br>
                            <?php echo esc_html(electromti_get_option('phone_2', '602 682 042')); ?>
                        </span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span><?php echo esc_html(electromti_get_option('contact_email', 'contact@electromti.com')); ?></span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <span><?php _e('Lun - Sáb: 10:00 - 20:00', 'electromti'); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-copyright">
                &copy; <?php echo date('Y'); ?> <strong>ElectroMTI</strong>. <?php _e('Todos los derechos reservados.', 'electromti'); ?>
            </div>
            <div class="footer-payments">
                <img src="https://placehold.co/50x30/ffffff/333333?text=Visa" alt="Visa">
                <img src="https://placehold.co/50x30/ffffff/333333?text=MC" alt="MasterCard">
                <img src="https://placehold.co/50x30/ffffff/333333?text=PayPal" alt="PayPal">
                <img src="https://placehold.co/50x30/ffffff/333333?text=Bizum" alt="Bizum">
            </div>
        </div>
    </div>
</footer>

<!-- WhatsApp Float Button -->
<a href="https://wa.me/<?php echo esc_attr(electromti_get_option('whatsapp_number', '34602861227')); ?>" class="whatsapp-float" target="_blank" title="<?php _e('Contactar por WhatsApp', 'electromti'); ?>">
    <i class="fab fa-whatsapp"></i>
</a>

<?php wp_footer(); ?>
</body>
</html>
