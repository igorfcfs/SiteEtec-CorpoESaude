<?php
/**
 * Displays footer site info
 *
 * @subpackage Fitmeal Dietitian
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info py-4 text-center">
    <?php
        echo esc_html( get_theme_mod( 'nutrition_diet_footer_text' ) );
        printf(
            /* translators: %s: Dietition WordPress Theme. */
            '<a href="' . esc_attr__( 'https://www.ovationthemes.com/wordpress/free-fitmeal-wordpress-theme/', 'fitmeal-dietitian' ) . '"> %s</a>',
            esc_html__( 'Dietition WordPress Theme', 'fitmeal-dietitian' )
        );
    ?>
</div>
