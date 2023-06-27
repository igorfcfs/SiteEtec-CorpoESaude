<?php

add_action( 'admin_menu', 'cosmetic_store_getting_started' );
function cosmetic_store_getting_started() {
	add_theme_page( esc_html__('Get Started', 'cosmetic-store'), esc_html__('Get Started', 'cosmetic-store'), 'edit_theme_options', 'cosmetic-store-guide-page', 'cosmetic_store_test_guide');
}

function cosmetic_store_admin_enqueue_scripts() {
	wp_enqueue_style( 'cosmetic-store-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
}
add_action( 'admin_enqueue_scripts', 'cosmetic_store_admin_enqueue_scripts' );

if ( ! defined( 'COSMETIC_STORE_DOCS_FREE' ) ) {
define('COSMETIC_STORE_DOCS_FREE',__('https://www.misbahwp.com/docs/cosmetic-store-free-docs/','cosmetic-store'));
}
if ( ! defined( 'COSMETIC_STORE_DOCS_PRO' ) ) {
define('COSMETIC_STORE_DOCS_PRO',__('https://www.misbahwp.com/docs/cosmetic-store-pro-docs','cosmetic-store'));
}
if ( ! defined( 'COSMETIC_STORE_BUY_NOW' ) ) {
define('COSMETIC_STORE_BUY_NOW',__('https://www.misbahwp.com/themes/cosmetic-store-wordpress-theme/','cosmetic-store'));
}
if ( ! defined( 'COSMETIC_STORE_SUPPORT_FREE' ) ) {
define('COSMETIC_STORE_SUPPORT_FREE',__('https://wordpress.org/support/theme/cosmetic-store','cosmetic-store'));
}
if ( ! defined( 'COSMETIC_STORE_REVIEW_FREE' ) ) {
define('COSMETIC_STORE_REVIEW_FREE',__('https://wordpress.org/support/theme/cosmetic-store/reviews/#new-post','cosmetic-store'));
}
if ( ! defined( 'COSMETIC_STORE_DEMO_PRO' ) ) {
define('COSMETIC_STORE_DEMO_PRO',__('https://www.misbahwp.com/demo/cosmetic-store/','cosmetic-store'));
}

function cosmetic_store_test_guide() { ?>
	<?php $cosmetic_store_theme = wp_get_theme(); ?>

	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( COSMETIC_STORE_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'cosmetic-store' ) ?></a>
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'cosmetic-store' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( COSMETIC_STORE_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'cosmetic-store' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( COSMETIC_STORE_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'cosmetic-store' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','cosmetic-store'); ?><?php echo esc_html( $cosmetic_store_theme ); ?>  <span><?php esc_html_e('Version: ', 'cosmetic-store'); ?><?php echo esc_html($cosmetic_store_theme['Version']);?></span></h3>
				<img class="img_responsive" style="width:100%;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">
				<div id="description-inside">
					<?php
						$cosmetic_store_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $cosmetic_store_theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>

		<div id="righty">
			<div class="postbox donate">
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','cosmetic-store'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','cosmetic-store'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','cosmetic-store'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','cosmetic-store'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
	  		</div>
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'cosmetic-store' ); ?></h3>
				<div class="inside">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','cosmetic-store'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( COSMETIC_STORE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'cosmetic-store' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( COSMETIC_STORE_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'cosmetic-store' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( COSMETIC_STORE_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'cosmetic-store' ) ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>
