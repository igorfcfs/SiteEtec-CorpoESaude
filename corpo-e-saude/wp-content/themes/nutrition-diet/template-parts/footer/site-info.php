<?php
/**
 * Displays footer site info
 *
 * @subpackage Nutrition Diet
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info py-4 text-center">
    <?php
        echo esc_html( get_theme_mod( 'nutrition_diet_footer_text' ) );
        printf(
            /* translators: %s: Nutrition Diet WordPress Theme. */
            '<a href="' . esc_attr__( 'https://www.ovationthemes.com/wordpress/free-nutrition-wordpress-theme/', 'nutrition-diet' ) . '"> %s</a>',
            esc_html__( 'Nutrition Diet WordPress Theme', 'nutrition-diet' )
        );
    ?>
</div>
