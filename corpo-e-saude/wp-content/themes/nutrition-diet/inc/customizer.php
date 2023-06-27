<?php
/**
 * Nutrition Diet: Customizer
 *
 * @subpackage Nutrition Diet
 * @since 1.0
 */

function nutrition_diet_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// fontawesome icon-picker

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/switch/control_switch.php' );

	$wp_customize->add_section( 'nutrition_diet_typography_settings', array(
		'title'       => __( 'Typography', 'nutrition-diet' ),
		'priority'       => 2,
	) );

	$font_choices = array(
			'' => 'Select',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
			'Droid Sans:400,700' => 'Droid Sans',
			'Lato:400,700,400italic,700italic' => 'Lato',
			'Arvo:400,700,400italic,700italic' => 'Arvo',
			'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif',
			'PT Sans:400,700,400italic,700italic' => 'PT Sans',
			'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
			'Arimo:400,700,400italic,700italic' => 'Arimo',
			'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
			'Bitter:400,700,400italic' => 'Bitter',
			'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Roboto:400,400italic,700,700italic' => 'Roboto',
			'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
			'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
			'Roboto Slab:400,700' => 'Roboto Slab',
			'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
			'Rokkitt:400' => 'Rokkitt',
		);

	$wp_customize->add_setting( 'nutrition_diet_section_typo_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
	$wp_customize->add_control( new nutrition_diet_Customizer_Customcontrol_Section_Heading( $wp_customize, 'nutrition_diet_section_typo_heading', array(
		'label'       => esc_html__( 'Typography Settings', 'nutrition-diet' ),
		'section'     => 'nutrition_diet_typography_settings',
		'settings'    => 'nutrition_diet_section_typo_heading',
	) ) );

	$wp_customize->add_setting( 'nutrition_diet_headings_text', array(
		'sanitize_callback' => 'nutrition_diet_sanitize_fonts',
	));
	$wp_customize->add_control( 'nutrition_diet_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'nutrition-diet'),
		'section' => 'nutrition_diet_typography_settings',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'nutrition_diet_body_text', array(
		'sanitize_callback' => 'nutrition_diet_sanitize_fonts'
	));
	$wp_customize->add_control( 'nutrition_diet_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'nutrition-diet' ),
		'section' => 'nutrition_diet_typography_settings',
		'choices' => $font_choices
	) );

 	$wp_customize->add_section('nutrition_diet_pro', array(
        'title'    => __('UPGRADE NUTRITION DIET PREMIUM', 'nutrition-diet'),
        'priority' => 1,
    ));

    $wp_customize->add_setting('nutrition_diet_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Nutrition_Diet_Pro_Control($wp_customize, 'nutrition_diet_pro', array(
        'label'    => __('NUTRITION DIET PREMIUM', 'nutrition-diet'),
        'section'  => 'nutrition_diet_pro',
        'settings' => 'nutrition_diet_pro',
        'priority' => 1,
    )));

    //Logo
    $wp_customize->add_setting('nutrition_diet_logo_max_height',array(
		'default'	=> '',
		'sanitize_callback'	=> 'nutrition_diet_sanitize_number_absint'
	));
	$wp_customize->add_control('nutrition_diet_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','nutrition-diet'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('nutrition_diet_logo_title',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'nutrition_diet_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Nutrition_Diet_Customizer_Customcontrol_Switch(
			$wp_customize,
			'nutrition_diet_logo_title',
			array(
				'settings'        => 'nutrition_diet_logo_title',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Title', 'nutrition-diet' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'nutrition-diet' ),
					'off'    => __( 'Off', 'nutrition-diet' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('nutrition_diet_logo_text',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'nutrition_diet_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Nutrition_Diet_Customizer_Customcontrol_Switch(
			$wp_customize,
			'nutrition_diet_logo_text',
			array(
				'settings'        => 'nutrition_diet_logo_text',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Tagline', 'nutrition-diet' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'nutrition-diet' ),
					'off'    => __( 'Off', 'nutrition-diet' ),
				),
				'active_callback' => '',
			)
		)
	);

    // Theme General Settings
    $wp_customize->add_section('nutrition_diet_theme_settings',array(
        'title' => __('Theme General Settings', 'nutrition-diet'),
        'priority' => 1,
    ) );

    $wp_customize->add_setting(
		'nutrition_diet_sticky_header',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'nutrition_diet_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Nutrition_Diet_Customizer_Customcontrol_Switch(
			$wp_customize,
			'nutrition_diet_sticky_header',
			array(
				'settings'        => 'nutrition_diet_sticky_header',
				'section'         => 'nutrition_diet_theme_settings',
				'label'           => __( 'Show Sticky Header', 'nutrition-diet' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'nutrition-diet' ),
					'off'    => __( 'Off', 'nutrition-diet' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'nutrition_diet_theme_loader',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'nutrition_diet_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Nutrition_Diet_Customizer_Customcontrol_Switch(
			$wp_customize,
			'nutrition_diet_theme_loader',
			array(
				'settings'        => 'nutrition_diet_theme_loader',
				'section'         => 'nutrition_diet_theme_settings',
				'label'           => __( 'Show Site Loader', 'nutrition-diet' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'nutrition-diet' ),
					'off'    => __( 'Off', 'nutrition-diet' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('nutrition_diet_menu_text_transform',array(
        'default' => 'CAPITALISE',
        'sanitize_callback' => 'nutrition_diet_sanitize_choices'
	));
	$wp_customize->add_control('nutrition_diet_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','nutrition-diet'),
        'section' => 'nutrition_diet_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','nutrition-diet'),
            'UPPERCASE' => __('UPPERCASE','nutrition-diet'),
            'LOWERCASE' => __('LOWERCASE','nutrition-diet'),
        ),
	) );

	$wp_customize->add_setting( 'nutrition_diet_section_scroll_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new nutrition_diet_Customizer_Customcontrol_Section_Heading( $wp_customize, 'nutrition_diet_section_scroll_heading', array(
		'label'       => esc_html__( 'Scroll Top Settings', 'nutrition-diet' ),
		'section'     => 'nutrition_diet_theme_settings',
		'settings'    => 'nutrition_diet_section_scroll_heading',
	) ) );

	$wp_customize->add_setting(
		'nutrition_diet_scroll_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'nutrition_diet_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Nutrition_Diet_Customizer_Customcontrol_Switch(
			$wp_customize,
			'nutrition_diet_scroll_enable',
			array(
				'settings'        => 'nutrition_diet_scroll_enable',
				'section'         => 'nutrition_diet_theme_settings',
				'label'           => __( 'Show Scroll Top', 'nutrition-diet' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'nutrition-diet' ),
					'off'    => __( 'Off', 'nutrition-diet' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('nutrition_diet_scroll_options',array(
        'default' => 'right_align',
        'sanitize_callback' => 'nutrition_diet_sanitize_choices'
	));
	$wp_customize->add_control('nutrition_diet_scroll_options',array(
        'type' => 'select',
        'label' => __('Scroll Top Alignment','nutrition-diet'),
        'section' => 'nutrition_diet_theme_settings',
        'choices' => array(
            'right_align' => __('Right Align','nutrition-diet'),
            'center_align' => __('Center Align','nutrition-diet'),
            'left_align' => __('Left Align','nutrition-diet'),
        ),
	) );

	$wp_customize->add_setting('nutrition_diet_scroll_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Nutrition_Diet_Fontawesome_Icon_Chooser(
        $wp_customize,'nutrition_diet_scroll_top_icon',array(
		'label'	=> __('Add Scroll Top Icon','nutrition-diet'),
		'transport' => 'refresh',
		'section'	=> 'nutrition_diet_theme_settings',
		'setting'	=> 'nutrition_diet_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'nutrition_diet_section_shoppage_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new nutrition_diet_Customizer_Customcontrol_Section_Heading( $wp_customize, 'nutrition_diet_section_shoppage_heading', array(
		'label'       => esc_html__( 'Shop Page Settings', 'nutrition-diet' ),
		'section'     => 'nutrition_diet_theme_settings',
		'settings'    => 'nutrition_diet_section_shoppage_heading',
	) ) );

	$wp_customize->add_setting(
		'nutrition_diet_shop_page_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'nutrition_diet_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Nutrition_Diet_Customizer_Customcontrol_Switch(
			$wp_customize,
			'nutrition_diet_shop_page_sidebar',
			array(
				'settings'        => 'nutrition_diet_shop_page_sidebar',
				'section'         => 'nutrition_diet_theme_settings',
				'label'           => __( 'Show Shop Page Sidebar', 'nutrition-diet' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'nutrition-diet' ),
					'off'    => __( 'Off', 'nutrition-diet' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'nutrition_diet_wocommerce_single_page_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'nutrition_diet_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Nutrition_Diet_Customizer_Customcontrol_Switch(
			$wp_customize,
			'nutrition_diet_wocommerce_single_page_sidebar',
			array(
				'settings'        => 'nutrition_diet_wocommerce_single_page_sidebar',
				'section'         => 'nutrition_diet_theme_settings',
				'label'           => __( 'Show Single Product Page Sidebar', 'nutrition-diet' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'nutrition-diet' ),
					'off'    => __( 'Off', 'nutrition-diet' ),
				),
				'active_callback' => '',
			)
		)
	);

    //theme width
	$wp_customize->add_section('nutrition_diet_theme_width_settings',array(
        'title' => __('Theme Width Option', 'nutrition-diet'),
        'priority'   => 1,
    ) );

	$wp_customize->add_setting('nutrition_diet_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'nutrition_diet_sanitize_choices'
	));
	$wp_customize->add_control('nutrition_diet_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','nutrition-diet'),
        'section' => 'nutrition_diet_theme_width_settings',
        'choices' => array(
            'full_width' => __('Fullwidth','nutrition-diet'),
            'container' => __('Container','nutrition-diet'),
            'container_fluid' => __('Container Fluid','nutrition-diet'),
        ),
	) );

	// Post Layouts
    $wp_customize->add_section('nutrition_diet_layout',array(
        'title' => __('Post Layout', 'nutrition-diet'),
       'priority' => 1
    ) );

    $wp_customize->add_setting( 'nutrition_diet_section_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new nutrition_diet_Customizer_Customcontrol_Section_Heading( $wp_customize, 'nutrition_diet_section_post_heading', array(
		'label'       => esc_html__( 'Page Structure', 'nutrition-diet' ),
		 'description' => __( 'Change the post layout from below options', 'nutrition-diet' ),
		'section'     => 'nutrition_diet_layout',
		'settings'    => 'nutrition_diet_section_post_heading',
	) ) );

	$wp_customize->add_setting(
		'nutrition_diet_post_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'nutrition_diet_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Nutrition_Diet_Customizer_Customcontrol_Switch(
			$wp_customize,
			'nutrition_diet_post_sidebar',
			array(
				'settings'        => 'nutrition_diet_post_sidebar',
				'section'         => 'nutrition_diet_layout',
				'label'           => __( 'Show Fullwidth', 'nutrition-diet' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'nutrition-diet' ),
					'off'    => __( 'Off', 'nutrition-diet' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'nutrition_diet_single_post_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'nutrition_diet_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Nutrition_Diet_Customizer_Customcontrol_Switch(
			$wp_customize,
			'nutrition_diet_single_post_sidebar',
			array(
				'settings'        => 'nutrition_diet_single_post_sidebar',
				'section'         => 'nutrition_diet_layout',
				'label'           => __( 'Show Single Post Fullwidth', 'nutrition-diet' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'nutrition-diet' ),
					'off'    => __( 'Off', 'nutrition-diet' ),
				),
				'active_callback' => '',
			)
		)
	);

    $wp_customize->add_setting('nutrition_diet_post_option',array(
		'default' => 'simple_post',
		'sanitize_callback' => 'nutrition_diet_sanitize_select'
	));
	$wp_customize->add_control('nutrition_diet_post_option',array(
		'label' => esc_html__('Select Layout','nutrition-diet'),
		'section' => 'nutrition_diet_layout',
		'setting' => 'nutrition_diet_post_option',
		'type' => 'radio',
        'choices' => array(
            'simple_post' => __('Simple Post','nutrition-diet'),
            'grid_post' => __('Grid Post','nutrition-diet'),
        ),
	));

    $wp_customize->add_setting('nutrition_diet_grid_column',array(
		'default' => '3_column',
		'sanitize_callback' => 'nutrition_diet_sanitize_select'
	));
	$wp_customize->add_control('nutrition_diet_grid_column',array(
		'label' => esc_html__('Grid Post Per Row','nutrition-diet'),
		'section' => 'nutrition_diet_layout',
		'setting' => 'nutrition_diet_grid_column',
		'type' => 'radio',
        'choices' => array(
            '1_column' => __('1','nutrition-diet'),
            '2_column' => __('2','nutrition-diet'),
            '3_column' => __('3','nutrition-diet'),
            '4_column' => __('4','nutrition-diet'),
            '5_column' => __('6','nutrition-diet'),
        ),
	));

	$wp_customize->add_setting('nutrition_diet_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'nutrition_diet_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Nutrition_Diet_Customizer_Customcontrol_Switch(
			$wp_customize,
			'nutrition_diet_date',
			array(
				'settings'        => 'nutrition_diet_date',
				'section'         => 'nutrition_diet_layout',
				'label'           => __( 'Show Date', 'nutrition-diet' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'nutrition-diet' ),
					'off'    => __( 'Off', 'nutrition-diet' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'nutrition_diet_date', array(
		'selector' => '.date-box',
		'render_callback' => 'nutrition_diet_customize_partial_nutrition_diet_date',
	) );

	$wp_customize->add_setting('nutrition_diet_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'nutrition_diet_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Nutrition_Diet_Customizer_Customcontrol_Switch(
			$wp_customize,
			'nutrition_diet_admin',
			array(
				'settings'        => 'nutrition_diet_admin',
				'section'         => 'nutrition_diet_layout',
				'label'           => __( 'Show Author/Admin', 'nutrition-diet' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'nutrition-diet' ),
					'off'    => __( 'Off', 'nutrition-diet' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'nutrition_diet_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'nutrition_diet_customize_partial_nutrition_diet_admin',
	) );

	$wp_customize->add_setting('nutrition_diet_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'nutrition_diet_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Nutrition_Diet_Customizer_Customcontrol_Switch(
			$wp_customize,
			'nutrition_diet_comment',
			array(
				'settings'        => 'nutrition_diet_comment',
				'section'         => 'nutrition_diet_layout',
				'label'           => __( 'Show Comment', 'nutrition-diet' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'nutrition-diet' ),
					'off'    => __( 'Off', 'nutrition-diet' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'nutrition_diet_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'nutrition_diet_customize_partial_nutrition_diet_comment',
	) );

	// Top Header
    $wp_customize->add_section('nutrition_diet_top',array(
        'title' => __('Contact info', 'nutrition-diet'),
        'priority' => 1
    ) );

    $wp_customize->add_setting( 'nutrition_diet_section_contact_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new nutrition_diet_Customizer_Customcontrol_Section_Heading( $wp_customize, 'nutrition_diet_section_contact_heading', array(
			'label'       => esc_html__( 'Contact Settings', 'nutrition-diet' ),	
			'description' => __( 'Add contact info in the below feilds', 'nutrition-diet' ),		
			'section'     => 'nutrition_diet_top',
			'settings'    => 'nutrition_diet_section_contact_heading',
		) ) );	

    $wp_customize->add_setting('nutrition_diet_call_number',array(
		'default' => '',
		'sanitize_callback' => 'nutrition_diet_sanitize_phone_number'
	));
	$wp_customize->add_control('nutrition_diet_call_number',array(
		'label' => esc_html__('Add Phone Number','nutrition-diet'),
		'section' => 'nutrition_diet_top',
		'setting' => 'nutrition_diet_call_number',
		'type'    => 'text',
	));

	$wp_customize->add_setting('nutrition_diet_call_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Nutrition_Diet_Fontawesome_Icon_Chooser(
        $wp_customize,'nutrition_diet_call_icon',array(
		'label'	=> __('Add Phone Icon','nutrition-diet'),
		'transport' => 'refresh',
		'section'	=> 'nutrition_diet_top',
		'setting'	=> 'nutrition_diet_call_icon',
		'type'		=> 'icon',
	)));

	$wp_customize->selective_refresh->add_partial( 'nutrition_diet_call_number', array(
		'selector' => '.top_bar i',
		'render_callback' => 'nutrition_diet_customize_partial_nutrition_diet_call_number',
	) );

    $wp_customize->add_setting('nutrition_diet_email_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	));
	$wp_customize->add_control('nutrition_diet_email_address',array(
		'label' => esc_html__('Add Email Address','nutrition-diet'),
		'section' => 'nutrition_diet_top',
		'setting' => 'nutrition_diet_email_address',
		'type'    => 'text',
	));

	$wp_customize->add_setting('nutrition_diet_mail_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Nutrition_Diet_Fontawesome_Icon_Chooser(
        $wp_customize,'nutrition_diet_mail_icon',array(
		'label'	=> __('Add Email Icon','nutrition-diet'),
		'transport' => 'refresh',
		'section'	=> 'nutrition_diet_top',
		'setting'	=> 'nutrition_diet_mail_icon',
		'type'		=> 'icon',
	)));

    $wp_customize->add_setting('nutrition_diet_donate_btn_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('nutrition_diet_donate_btn_text',array(
		'label' => esc_html__('Add Button Text','nutrition-diet'),
		'section' => 'nutrition_diet_top',
		'setting' => 'nutrition_diet_donate_btn_text',
		'type'    => 'text',
	));

    $wp_customize->add_setting('nutrition_diet_donate_btn_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('nutrition_diet_donate_btn_link',array(
		'label' => esc_html__('Add Button URL','nutrition-diet'),
		'section' => 'nutrition_diet_top',
		'setting' => 'nutrition_diet_donate_btn_link',
		'type'    => 'url',
	));

    //Slider
	$wp_customize->add_section( 'nutrition_diet_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'nutrition-diet' ),
		'priority'   => 3,
	) );

	$wp_customize->add_setting( 'nutrition_diet_section_slide_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new nutrition_diet_Customizer_Customcontrol_Section_Heading( $wp_customize, 'nutrition_diet_section_slide_heading', array(
			'label'       => esc_html__( 'Slider Settings', 'nutrition-diet' ),
			'description' => __( 'Slider Image Dimension ( 600px x 700px )', 'nutrition-diet' ),		
			'section'     => 'nutrition_diet_slider_section',
			'settings'    => 'nutrition_diet_section_slide_heading',
		) ) );

		$wp_customize->add_setting(
		'nutrition_diet_slider_arrows',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'nutrition_diet_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Nutrition_Diet_Customizer_Customcontrol_Switch(
			$wp_customize,
			'nutrition_diet_slider_arrows',
			array(
				'settings'        => 'nutrition_diet_slider_arrows',
				'section'         => 'nutrition_diet_slider_section',
				'label'           => __( 'Check To Show Slider', 'nutrition-diet' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'nutrition-diet' ),
					'off'    => __( 'Off', 'nutrition-diet' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('nutrition_diet_extra_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nutrition_diet_extra_text',array(
		'label'	=> esc_html__('Section Extra Text ','nutrition-diet'),
		'section'	=> 'nutrition_diet_slider_section',
		'type'		=> 'text',
		'active_callback' => 'nutrition_diet_slider_dropdown'
	));

	$nutrition_diet_args = array('numberposts' => -1);
	$post_list = get_posts($nutrition_diet_args);
	$i = 0;
	$pst_sls[]= __('Select','nutrition-diet');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting('nutrition_diet_post_setting'.$i,array(
			'sanitize_callback' => 'nutrition_diet_sanitize_select',
		));
		$wp_customize->add_control('nutrition_diet_post_setting'.$i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','nutrition-diet'),
			'section' => 'nutrition_diet_slider_section',
			'active_callback' => 'nutrition_diet_slider_dropdown'
		));

		$wp_customize->selective_refresh->add_partial( 'nutrition_diet_post_setting'.$i, array(
			'selector' => '.carousel-control-prev',
			'render_callback' => 'nutrition_diet_customize_partial_nutrition_diet_post_setting'.$i,
		) );
	}
	wp_reset_postdata();

	$wp_customize->add_setting('nutrition_diet_slider_content_alignment',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'nutrition_diet_sanitize_choices'
	));
	$wp_customize->add_control('nutrition_diet_slider_content_alignment',array(
        'type' => 'select',
        'label' => __('Slider Content Alignment','nutrition-diet'),
        'section' => 'nutrition_diet_slider_section',
        'choices' => array(
            'LEFT-ALIGN' => __('LEFT-ALIGN','nutrition-diet'),
            'CENTER-ALIGN' => __('CENTER-ALIGN','nutrition-diet'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','nutrition-diet'),),
        	'active_callback' => 'nutrition_diet_slider_dropdown'
	) );

	// About us
	$wp_customize->add_section( 'nutrition_diet_middle_section' , array(
		'title'      => __( 'About us Settings', 'nutrition-diet' ),
		'priority'   => 6,
	) );

	$wp_customize->add_setting(
		'nutrition_diet_about_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'nutrition_diet_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Nutrition_Diet_Customizer_Customcontrol_Switch(
			$wp_customize,
			'nutrition_diet_about_enable',
			array(
				'settings'        => 'nutrition_diet_about_enable',
				'section'         => 'nutrition_diet_middle_section',
				'label'           => __( 'Check To Show Product Settings', 'nutrition-diet' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'nutrition-diet' ),
					'off'    => __( 'Off', 'nutrition-diet' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('nutrition_diet_about_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('nutrition_diet_about_title',array(
		'label' => esc_html__('Title','nutrition-diet'),
		'section' => 'nutrition_diet_middle_section',
		'setting' => 'nutrition_diet_about_title',
		'type'    => 'text',
		'active_callback' => 'nutrition_diet_about_dropdown'
	));

	$wp_customize->selective_refresh->add_partial( 'nutrition_diet_about_title', array(
		'selector' => '.middle-sec-box h6',
		'render_callback' => 'nutrition_diet_customize_partial_nutrition_diet_about_title',
	) );

	$wp_customize->add_setting('nutrition_diet_middle_sec_page_settigs',array(
		'sanitize_callback' => 'nutrition_diet_sanitize_dropdown_pages',
	));
	$wp_customize->add_control('nutrition_diet_middle_sec_page_settigs',array(
		'type'    => 'dropdown-pages',
		'label' => __('Select Page','nutrition-diet'),
		'section' => 'nutrition_diet_middle_section',
		'active_callback' => 'nutrition_diet_about_dropdown'
	));

	$wp_customize->add_setting('nutrition_diet_calling_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('nutrition_diet_calling_text',array(
		'label' => esc_html__('Text','nutrition-diet'),
		'section' => 'nutrition_diet_middle_section',
		'setting' => 'nutrition_diet_calling_text',
		'type'    => 'text',
		'active_callback' => 'nutrition_diet_about_dropdown'
	));

	$wp_customize->add_setting('nutrition_diet_calling_number',array(
		'default' => '',
		'sanitize_callback' => 'nutrition_diet_sanitize_phone_number'
	));
	$wp_customize->add_control('nutrition_diet_calling_number',array(
		'label' => esc_html__('Phone Number','nutrition-diet'),
		'section' => 'nutrition_diet_middle_section',
		'setting' => 'nutrition_diet_calling_number',
		'type'    => 'text',
		'active_callback' => 'nutrition_diet_about_dropdown'
	));

	$wp_customize->selective_refresh->add_partial( 'nutrition_diet_calling_number', array(
		'selector' => '.top_bar i',
		'render_callback' => 'nutrition_diet_customize_partial_nutrition_diet_calling_number',
	) );

	$wp_customize->add_setting('nutrition_diet_about_button_2_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('nutrition_diet_about_button_2_text',array(
		'label' => esc_html__('Button 2 Text','nutrition-diet'),
		'section' => 'nutrition_diet_middle_section',
		'setting' => 'nutrition_diet_about_button_2_text',
		'type'    => 'text',
		'active_callback' => 'nutrition_diet_about_dropdown'
	));

	$wp_customize->add_setting('nutrition_diet_about_button_2_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('nutrition_diet_about_button_2_link',array(
		'label' => esc_html__('Button 2 Link','nutrition-diet'),
		'section' => 'nutrition_diet_middle_section',
		'setting' => 'nutrition_diet_about_button_2_link',
		'type'    => 'text',
		'active_callback' => 'nutrition_diet_about_dropdown'
	));

	//Footer
    $wp_customize->add_section( 'nutrition_diet_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'nutrition-diet' ),
    	'priority' => 6
	) );

	$wp_customize->add_setting( 'nutrition_diet_section_footer_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new nutrition_diet_Customizer_Customcontrol_Section_Heading( $wp_customize, 'nutrition_diet_section_footer_heading', array(
			'label'       => esc_html__( 'Footer Settings', 'nutrition-diet' ),		
			'section'     => 'nutrition_diet_footer_copyright',
			'settings'    => 'nutrition_diet_section_footer_heading',
		) ) );

    $wp_customize->add_setting('nutrition_diet_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nutrition_diet_footer_text',array(
		'label'	=> esc_html__('Copyright Text','nutrition-diet'),
		'section'	=> 'nutrition_diet_footer_copyright',
		'type'		=> 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'nutrition_diet_footer_text', array(
		'selector' => '.site-info a',
		'render_callback' => 'nutrition_diet_customize_partial_nutrition_diet_footer_text',
	) );

	$wp_customize->add_setting('nutrition_diet_footer_widget',array(
'default' => '4',
'sanitize_callback' => 'nutrition_diet_sanitize_select'
));
$wp_customize->add_control('nutrition_diet_footer_widget',array(
	'label' => esc_html__('Footer Per Column','nutrition-diet'),
	'section' => 'nutrition_diet_footer_copyright',
	'setting' => 'nutrition_diet_footer_widget',
	'type' => 'radio',
			'choices' => array(
					'1'   => __('1 Column', 'nutrition-diet'),
					'2'  => __('2 Column', 'nutrition-diet'),
					'3' => __('3 Column', 'nutrition-diet'),
					'4' => __('4 Column', 'nutrition-diet')
			),
));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'nutrition_diet_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'nutrition_diet_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'nutrition_diet_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'nutrition_diet_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'nutrition-diet' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'nutrition-diet' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'nutrition_diet_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'nutrition_diet_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'nutrition_diet_customize_register' );

function nutrition_diet_customize_partial_blogname() {
	bloginfo( 'name' );
}
function nutrition_diet_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function nutrition_diet_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function nutrition_diet_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('NUTRITION_DIET_PRO_LINK',__('https://www.ovationthemes.com/wordpress/nutrition-diet-wordpress-theme/','nutrition-diet'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Nutrition_Diet_Pro_Control')):
    class Nutrition_Diet_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( NUTRITION_DIET_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE NUTRITION DIET PREMIUM','nutrition-diet');?> </a>
	        </div>
            <div class="col-md">
                <img class="nutrition_diet_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('NUTRITION DIET PREMIUM - Features', 'nutrition-diet'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'nutrition-diet');?> </li>
                    <li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'nutrition-diet');?> </li>
                   	<li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'nutrition-diet');?> </li>
                   	<li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'nutrition-diet');?> </li>
                   	<li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'nutrition-diet');?> </li>
                   	<li class="upsell-nutrition_diet"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'nutrition-diet');?> </li>
                </ul>
        	</div>
		    <div class="col-md upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( NUTRITION_DIET_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE NUTRITION DIET PREMIUM','nutrition-diet');?> </a>
		    </div>
        </label>
    <?php } }
endif;
