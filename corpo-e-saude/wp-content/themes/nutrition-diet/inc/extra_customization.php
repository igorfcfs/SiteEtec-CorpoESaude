<?php

	/*---------------------------Width -------------------*/

	$nutrition_diet_custom_style= "";

	$nutrition_diet_theme_width = get_theme_mod( 'nutrition_diet_width_options','full_width');

    if($nutrition_diet_theme_width == 'full_width'){

		$nutrition_diet_custom_style .='body{';

			$nutrition_diet_custom_style .='max-width: 100%;';

		$nutrition_diet_custom_style .='}';

	}else if($nutrition_diet_theme_width == 'container'){

		$nutrition_diet_custom_style .='body{';

			$nutrition_diet_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';

		$nutrition_diet_custom_style .='}';

	}else if($nutrition_diet_theme_width == 'container_fluid'){

		$nutrition_diet_custom_style .='body{';

			$nutrition_diet_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

		$nutrition_diet_custom_style .='}';
	}

	/*----------------------------------------------*/
// sticky header
	$nutrition_diet_custom_style= "";

	if( get_option( 'nutrition_diet_sticky_header',false) != 'on') {

		$nutrition_diet_custom_style .='.wrap_figure.fixed{';

			$nutrition_diet_custom_style .='position: static;';
			
		$nutrition_diet_custom_style .='}';
	}

	if( get_option( 'nutrition_diet_sticky_header',true) != 'off') {

		$nutrition_diet_custom_style .='.wrap_figure.fixed{';

			$nutrition_diet_custom_style .='position: fixed;';
			
		$nutrition_diet_custom_style .='}';
	}

	/*---------------------------Scroll-top-position -------------------*/

	$nutrition_diet_scroll_options = get_theme_mod( 'nutrition_diet_scroll_options','right_align');

    if($nutrition_diet_scroll_options == 'right_align'){

		$nutrition_diet_custom_style .='.scroll-top button{';

			$nutrition_diet_custom_style .='';

		$nutrition_diet_custom_style .='}';

	}else if($nutrition_diet_scroll_options == 'center_align'){

		$nutrition_diet_custom_style .='.scroll-top button{';

			$nutrition_diet_custom_style .='right: 0; left:0; margin: 0 auto; top:85% !important';

		$nutrition_diet_custom_style .='}';

	}else if($nutrition_diet_scroll_options == 'left_align'){

		$nutrition_diet_custom_style .='.scroll-top button{';

			$nutrition_diet_custom_style .='right: auto; left:5%; margin: 0 auto';

		$nutrition_diet_custom_style .='}';
	}

	//------------------------------------------------------------------------------

	$nutrition_diet_logo_max_height = get_theme_mod('nutrition_diet_logo_max_height');

	if($nutrition_diet_logo_max_height != false){

		$nutrition_diet_custom_style .='.custom-logo-link img{';

			$nutrition_diet_custom_style .='max-height: '.esc_html($nutrition_diet_logo_max_height).'px;';

		$nutrition_diet_custom_style .='}';
	}

				/*---------------------------text-transform-------------------*/

	$nutrition_diet_text_transform = get_theme_mod( 'nutrition_diet_menu_text_transform','CAPITALISE');
    if($nutrition_diet_text_transform == 'CAPITALISE'){

		$nutrition_diet_custom_style .='nav#top_gb_menu ul li a{';

			$nutrition_diet_custom_style .='text-transform: capitalize ; font-size: 14px;';

		$nutrition_diet_custom_style .='}';

	}else if($nutrition_diet_text_transform == 'UPPERCASE'){

		$nutrition_diet_custom_style .='nav#top_gb_menu ul li a{';

			$nutrition_diet_custom_style .='text-transform: uppercase ; font-size: 14px;';

		$nutrition_diet_custom_style .='}';

	}else if($nutrition_diet_text_transform == 'LOWERCASE'){

		$nutrition_diet_custom_style .='nav#top_gb_menu ul li a{';

			$nutrition_diet_custom_style .='text-transform: lowercase ; font-size: 14px;';

		$nutrition_diet_custom_style .='}';
	}

			/*-------------------------Slider-content-alignment-------------------*/

		$nutrition_diet_slider_content_alignment = get_theme_mod( 'nutrition_diet_slider_content_alignment','LEFT-ALIGN');

		 if($nutrition_diet_slider_content_alignment == 'LEFT-ALIGN'){

				$nutrition_diet_custom_style .='.slider-inner{';

					$nutrition_diet_custom_style .='text-align:left;';

				$nutrition_diet_custom_style .='}';


			}else if($nutrition_diet_slider_content_alignment == 'CENTER-ALIGN'){

				$nutrition_diet_custom_style .='.slider-inner{';

					$nutrition_diet_custom_style .='text-align:center;';

				$nutrition_diet_custom_style .='}';


			}else if($nutrition_diet_slider_content_alignment == 'RIGHT-ALIGN'){

				$nutrition_diet_custom_style .='.slider-inner{';

					$nutrition_diet_custom_style .='text-align:right;';

				$nutrition_diet_custom_style .='}';

			}
