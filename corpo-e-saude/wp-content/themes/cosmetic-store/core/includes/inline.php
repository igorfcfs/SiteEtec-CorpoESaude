<?php


$cosmetic_store_custom_css = '';

/*---------------------------text-transform-------------------*/

$cosmetic_store_text_transform = get_theme_mod( 'menu_text_transform_cosmetic_store','CAPITALISE');
if($cosmetic_store_text_transform == 'CAPITALISE'){

	$cosmetic_store_custom_css .='#main-menu ul li a{';

		$cosmetic_store_custom_css .='text-transform: capitalize ; font-size: 13px;';

	$cosmetic_store_custom_css .='}';

}else if($cosmetic_store_text_transform == 'UPPERCASE'){

	$cosmetic_store_custom_css .='#main-menu ul li a{';

		$cosmetic_store_custom_css .='text-transform: uppercase ; font-size: 13px;';

	$cosmetic_store_custom_css .='}';

}else if($cosmetic_store_text_transform == 'LOWERCASE'){

	$cosmetic_store_custom_css .='#main-menu ul li a{';

		$cosmetic_store_custom_css .='text-transform: lowercase ; font-size: 13px;';

	$cosmetic_store_custom_css .='}';
}

/*---------------------------Container Width-------------------*/

$cosmetic_store_container_width = get_theme_mod('cosmetic_store_container_width');

	$cosmetic_store_custom_css .='body{';

		$cosmetic_store_custom_css .='width: '.esc_attr($cosmetic_store_container_width).'%; margin: auto;';

	$cosmetic_store_custom_css .='}';

	/*---------------------------Slider-content-alignment-------------------*/

	$cosmetic_store_slider_content_alignment = get_theme_mod( 'cosmetic_store_slider_content_alignment','LEFT-ALIGN');

	 if($cosmetic_store_slider_content_alignment == 'LEFT-ALIGN'){

			$cosmetic_store_custom_css .='.blog_box{';

				$cosmetic_store_custom_css .='text-align:left;';

			$cosmetic_store_custom_css .='}';


		}else if($cosmetic_store_slider_content_alignment == 'CENTER-ALIGN'){

			$cosmetic_store_custom_css .='.blog_box{';

				$cosmetic_store_custom_css .='text-align:center;';

			$cosmetic_store_custom_css .='}';


		}else if($cosmetic_store_slider_content_alignment == 'RIGHT-ALIGN'){

			$cosmetic_store_custom_css .='.blog_box{';

				$cosmetic_store_custom_css .='text-align:right;';

			$cosmetic_store_custom_css .='}';

		}

	/*---------------------------Copyright Text alignment-------------------*/

$cosmetic_store_copyright_text_alignment = get_theme_mod( 'cosmetic_store_copyright_text_alignment','LEFT-ALIGN');

 if($cosmetic_store_copyright_text_alignment == 'LEFT-ALIGN'){

		$cosmetic_store_custom_css .='.copy-text p{';

			$cosmetic_store_custom_css .='text-align:left;';

		$cosmetic_store_custom_css .='}';


	}else if($cosmetic_store_copyright_text_alignment == 'CENTER-ALIGN'){

		$cosmetic_store_custom_css .='.copy-text p{';

			$cosmetic_store_custom_css .='text-align:center;';

		$cosmetic_store_custom_css .='}';


	}else if($cosmetic_store_copyright_text_alignment == 'RIGHT-ALIGN'){

		$cosmetic_store_custom_css .='.copy-text p{';

			$cosmetic_store_custom_css .='text-align:right;';

		$cosmetic_store_custom_css .='}';

	}
