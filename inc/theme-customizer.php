<?php

function manly_customize_register( $wp_customize ) {


  // Customize title and tagline sections and labels

  $wp_customize->get_section('title_tagline')->title = __('Site Name and Description', 'manly-recipes');  
  $wp_customize->get_control('display_header_text')->section = 'title_tagline'; 
  $wp_customize->get_control('blogname')->label = __('Site Name', 'manly-recipes');  
  $wp_customize->get_control('blogdescription')->label = __('Site Description', 'manly-recipes');  
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
  $wp_customize->get_control('header_textcolor')->section = 'header_text_styles'; 
  $wp_customize->get_control('header_textcolor')->label = __('Site Title Color', 'manly-recipes');
  $wp_customize->get_setting('header_textcolor')->transport = 'postMessage'; 

  // Customize the Front Page Settings

  $wp_customize->get_section('static_front_page')->title = __('Homepage Preferences', 'manly-recipes');
  $wp_customize->get_section('static_front_page')->priority = 20;
  $wp_customize->get_control('show_on_front')->label = __('Choose Homepage Preference', 'manly-recipes');  
  $wp_customize->get_control('page_on_front')->label = __('Select Homepage', 'manly-recipes');  
  $wp_customize->get_control('page_for_posts')->label = __('Select Blog Homepage', 'manly-recipes');  

  // Customize Background Settings

  $wp_customize->get_section('background_image')->title = __('Background Styles', 'manly-recipes');  
  $wp_customize->get_control('background_color')->section = 'background_image'; 

  $wp_customize->remove_control('header_image');

// Create custom panels

  $wp_customize->add_panel( 'general_settings', array(
      'priority' => 10,
      'theme_supports' => '',
      'title' => __( 'General Settings', 'manly-recipes' ),
      'description' => __( 'Controls the basic settings for the theme.', 'manly-recipes' ),
  ) );
  $wp_customize->add_panel( 'design_settings', array(
      'priority' => 20,
      'theme_supports' => '',
      'title' => __( 'Design Settings', 'manly-recipes' ),
      'description' => __( 'Controls the basic design settings for the theme.', 'manly-recipes' ),
  ) ); 
  $wp_customize->add_panel( 'carousel_settings', array(
      'priority' => 30,
      'theme_supports' => '',
      'title' => __( 'Carousel Settings', 'manly-recipes' ),
      'description' => __( 'Controls the carousel slide images, text, and buttons.', 'manly-recipes' ),
  ) ); 
  $wp_customize->add_panel( 'color_choices', array(
      'priority' => 40,
      'theme_supports' => '',
      'title' => __( 'Color Choices', 'manly-recipes' ),
      'description' => __( 'Controls the color settings for the theme.', 'manly-recipes' ),
  ) ); 
  $wp_customize->add_panel( 'typography_settings', array(
      'priority' => 50,
      'theme_supports' => '',
      'title' => __( 'Typography', 'manly-recipes' ),
      'description' => __( 'Controls the fonts for the theme.', 'manly-recipes' ),
  ) ); 

  // Assign sections to panels

  $wp_customize->get_section('title_tagline')->panel = 'general_settings';      
  $wp_customize->get_section('static_front_page')->panel = 'general_settings';
  $wp_customize->get_section('background_image')->panel = 'design_settings';
  $wp_customize->get_section('background_image')->priority = 1000;


// GENERAL SETTINGS PANEL ........................................ //


// DESIGN SETTINGS PANEL ........................................ //

// Add Custom Logo Settings

  $wp_customize->add_section( 'custom_logo' , array(
    'title'      => __('Change Your Logo','manly-recipes'), 
    'panel'      => 'design_settings',
    'priority'   => 20    
  ) );  
  $wp_customize->add_setting(
      'manly_logo',
      array(
          'default'         => get_template_directory_uri() . '/images/logo.png',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'custom_logo',
           array(
               'label'      => __( 'Change Logo', 'manly-recipes' ),
               'section'    => 'custom_logo',
               'settings'   => 'manly_logo',
               'context'    => 'manly-custom-logo' 
           )
       )
   ); 

// CAROUSEL SETTINGS PANEL ........................................ //

  // Slide 1 Image

  $wp_customize->add_section( 'slide_1' , array(
    'title'      => __('Slide 1','manly-recipes'), 
    'panel'      => 'carousel_settings',
    'priority'   => 20    
  ) );  

  $wp_customize->add_setting(
      'slide_1_img',
      array(
          'default'         => get_template_directory_uri() . '/images/blueberries.jpg',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'slide_1',
           array(
               'label'      => __( 'Choose Photo', 'manly-recipes' ),
               'section'    => 'slide_1',
               'settings'   => 'slide_1_img',
               'context'    => 'slide-1-img' 
           )
       )
   ); 

  // Slide 1 Headline

  $wp_customize->add_setting(
      'slide_1_headline',
      array(
          'default'           => __( 'Slide 1 Headline', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_1_headline',
            array(
                'label'          => __( 'Headline', 'manly-recipes' ),
                'section'        => 'slide_1',
                'settings'       => 'slide_1_headline',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 1 Text

  $wp_customize->add_setting(
      'slide_1_text',
      array(
          'default'           => __( 'Slide 1 Text', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_1_text',
            array(
                'label'          => __( 'Text', 'manly-recipes' ),
                'section'        => 'slide_1',
                'settings'       => 'slide_1_text',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 1 Button Text

  $wp_customize->add_setting(
      'slide_1_button_text',
      array(
          'default'           => __( 'Button Text', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_1_button_text',
            array(
                'label'          => __( 'Button Text', 'manly-recipes' ),
                'section'        => 'slide_1',
                'settings'       => 'slide_1_button_text',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 1 Button Link

  $wp_customize->add_setting(
      'slide_1_button_link',
      array(
          'default'           => __( 'http://...', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_1_button_link',
            array(
                'label'          => __( 'Enter the URL for the page you want the button to link to', 'manly-recipes' ),
                'section'        => 'slide_1',
                'settings'       => 'slide_1_button_link',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 2 Image

  $wp_customize->add_section( 'slide_2' , array(
    'title'      => __('Slide 2','manly-recipes'), 
    'panel'      => 'carousel_settings',
    'priority'   => 20    
  ) );  
  
  $wp_customize->add_setting(
      'slide_2_img',
      array(
          'default'         => get_template_directory_uri() . '/images/blueberries.jpg',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'slide_2',
           array(
               'label'      => __( 'Choose Photo', 'manly-recipes' ),
               'section'    => 'slide_2',
               'settings'   => 'slide_2_img',
               'context'    => 'slide-2-img' 
           )
       )
   ); 

  // Slide 2 Headline

  $wp_customize->add_setting(
      'slide_2_headline',
      array(
          'default'           => __( 'Slide 2 Headline', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_2_headline',
            array(
                'label'          => __( 'Headline', 'manly-recipes' ),
                'section'        => 'slide_2',
                'settings'       => 'slide_2_headline',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 2 Text

  $wp_customize->add_setting(
      'slide_2_text',
      array(
          'default'           => __( 'Slide 2 Text', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_2_text',
            array(
                'label'          => __( 'Text', 'manly-recipes' ),
                'section'        => 'slide_2',
                'settings'       => 'slide_2_text',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 2 Button Text

  $wp_customize->add_setting(
      'slide_2_button_text',
      array(
          'default'           => __( 'Button Text', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_2_button_text',
            array(
                'label'          => __( 'Button Text', 'manly-recipes' ),
                'section'        => 'slide_2',
                'settings'       => 'slide_2_button_text',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 2 Button Link

  $wp_customize->add_setting(
      'slide_2_button_link',
      array(
          'default'           => __( 'http://...', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_2_button_link',
            array(
                'label'          => __( 'Enter the URL for the page you want the button to link to', 'manly-recipes' ),
                'section'        => 'slide_2',
                'settings'       => 'slide_2_button_link',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 3 Image

  $wp_customize->add_section( 'slide_3' , array(
    'title'      => __('Slide 3','manly-recipes'), 
    'panel'      => 'carousel_settings',
    'priority'   => 30    
  ) );  
  
  $wp_customize->add_setting(
      'slide_3_img',
      array(
          'default'         => get_template_directory_uri() . '/images/blueberries.jpg',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'slide_3',
           array(
               'label'      => __( 'Choose Photo', 'manly-recipes' ),
               'section'    => 'slide_3',
               'settings'   => 'slide_3_img',
               'context'    => 'slide-3-img' 
           )
       )
   ); 

  // Slide 3 Headline

  $wp_customize->add_setting(
      'slide_3_headline',
      array(
          'default'           => __( 'Slide 3 Headline', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_3_headline',
            array(
                'label'          => __( 'Headline', 'manly-recipes' ),
                'section'        => 'slide_3',
                'settings'       => 'slide_3_headline',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 3 Text

  $wp_customize->add_setting(
      'slide_3_text',
      array(
          'default'           => __( 'Slide 3 Text', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_3_text',
            array(
                'label'          => __( 'Text', 'manly-recipes' ),
                'section'        => 'slide_3',
                'settings'       => 'slide_3_text',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 3 Button Text

  $wp_customize->add_setting(
      'slide_3_button_text',
      array(
          'default'           => __( 'Button Text', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_3_button_text',
            array(
                'label'          => __( 'Button Text', 'manly-recipes' ),
                'section'        => 'slide_3',
                'settings'       => 'slide_3_button_text',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 3 Button Link

  $wp_customize->add_setting(
      'slide_3_button_link',
      array(
          'default'           => __( 'http://...', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_3_button_link',
            array(
                'label'          => __( 'Enter the URL for the page you want the button to link to', 'manly-recipes' ),
                'section'        => 'slide_3',
                'settings'       => 'slide_3_button_link',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 4 Image

  $wp_customize->add_section( 'slide_4' , array(
    'title'      => __('Slide 4','manly-recipes'), 
    'panel'      => 'carousel_settings',
    'priority'   => 40    
  ) );  
  
  $wp_customize->add_setting(
      'slide_4_img',
      array(
          'default'         => get_template_directory_uri() . '/images/blueberries.jpg',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'slide_4',
           array(
               'label'      => __( 'Choose Photo', 'manly-recipes' ),
               'section'    => 'slide_4',
               'settings'   => 'slide_4_img',
               'context'    => 'slide-4-img' 
           )
       )
   ); 

  // Slide 4 Headline

  $wp_customize->add_setting(
      'slide_4_headline',
      array(
          'default'           => __( 'Slide 4 Headline', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_4_headline',
            array(
                'label'          => __( 'Headline', 'manly-recipes' ),
                'section'        => 'slide_4',
                'settings'       => 'slide_4_headline',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 4 Text

  $wp_customize->add_setting(
      'slide_4_text',
      array(
          'default'           => __( 'Slide 4 Text', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_4_text',
            array(
                'label'          => __( 'Text', 'manly-recipes' ),
                'section'        => 'slide_4',
                'settings'       => 'slide_4_text',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 4 Button Text

  $wp_customize->add_setting(
      'slide_4_button_text',
      array(
          'default'           => __( 'Button Text', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_4_button_text',
            array(
                'label'          => __( 'Button Text', 'manly-recipes' ),
                'section'        => 'slide_4',
                'settings'       => 'slide_4_button_text',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 4 Button Link

  $wp_customize->add_setting(
      'slide_4_button_link',
      array(
          'default'           => __( 'http://...', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_4_button_link',
            array(
                'label'          => __( 'Enter the URL for the page you want the button to link to', 'manly-recipes' ),
                'section'        => 'slide_4',
                'settings'       => 'slide_4_button_link',
                'type'           => 'text'
            )
        )
   ); 

    // Slide 5 Image

  $wp_customize->add_section( 'slide_5' , array(
    'title'      => __('Slide 5','manly-recipes'), 
    'panel'      => 'carousel_settings',
    'priority'   => 50    
  ) );  
  
  $wp_customize->add_setting(
      'slide_5_img',
      array(
          'default'         => get_template_directory_uri() . '/images/blueberries.jpg',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'slide_5',
           array(
               'label'      => __( 'Choose Photo', 'manly-recipes' ),
               'section'    => 'slide_5',
               'settings'   => 'slide_5_img',
               'context'    => 'slide-5-img' 
           )
       )
   ); 

  // Slide 5 Headline

  $wp_customize->add_setting(
      'slide_5_headline',
      array(
          'default'           => __( 'Slide 5 Headline', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_5_headline',
            array(
                'label'          => __( 'Headline', 'manly-recipes' ),
                'section'        => 'slide_5',
                'settings'       => 'slide_5_headline',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 5 Text

  $wp_customize->add_setting(
      'slide_5_text',
      array(
          'default'           => __( 'Slide 5 Text', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_5_text',
            array(
                'label'          => __( 'Text', 'manly-recipes' ),
                'section'        => 'slide_5',
                'settings'       => 'slide_5_text',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 5 Button Text

  $wp_customize->add_setting(
      'slide_5_button_text',
      array(
          'default'           => __( 'Button Text', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_5_button_text',
            array(
                'label'          => __( 'Button Text', 'manly-recipes' ),
                'section'        => 'slide_5',
                'settings'       => 'slide_5_button_text',
                'type'           => 'text'
            )
        )
   ); 

  // Slide 5 Button Link

  $wp_customize->add_setting(
      'slide_5_button_link',
      array(
          'default'           => __( 'http://...', 'manly-recipes' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'manly_slide_5_button_link',
            array(
                'label'          => __( 'Enter the URL for the page you want the button to link to', 'manly-recipes' ),
                'section'        => 'slide_5',
                'settings'       => 'slide_5_button_link',
                'type'           => 'text'
            )
        )
   ); 

  
// COLOR CHOICES PANEL ........................................ //


// Text Colors

  $wp_customize->add_section( 'text_colors' , array(
    'title'      => __('Text Colors','manly-recipes'), 
    'panel'      => 'color_choices',
    'priority'   => 100    
  ) );

  $wp_customize->add_setting(
      'manly_h1_color',
      array(
          'default'         => '#555555',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_h1_color',
           array(
               'label'      => __( 'Headings Color', 'manly-recipes' ),
               'section'    => 'text_colors',
               'settings'   => 'manly_h1_color' 
           )
       )
   );

  $wp_customize->add_section( 'p_styles' , array(
    'title'      => __('Paragraph Text Styles','manly-recipes'), 
    'panel'      => 'color_choices',
    'priority'   => 130    
  ) );  
  $wp_customize->add_setting(
      'manly_p_color',
      array(
          'default'         => '#555555',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_p_color',
           array(
               'label'      => __( 'Paragraph Color', 'manly-recipes' ),
               'section'    => 'text_colors',
               'settings'   => 'manly_p_color' 
           )
       )
   );



// Accent Color

  $wp_customize->add_section( 'theme_colors' , array(
    'title'      => __('Accent Color','manly-recipes'), 
    'panel'      => 'color_choices',
    'priority'   => 100    
  ) );

  $wp_customize->add_setting(
      'manly_accent_color',
      array(
          'default'         => '#ed1c24',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_accent_color',
           array(
               'label'      => __( '-- WARNING -- <br><br>Some of this will look weird until you save it or reload the page. Just choose your color and save it. Do not worry about what it looks like in the preview.<br><br>Accent color for links, buttons, menu highlights, and hover effects', 'manly-recipes' ),
               'section'    => 'theme_colors',
               'settings'   => 'manly_accent_color' 
           )
       )
   ); 


// TYPOGRAPHY PANEL ........................................ //

// Headings Font

$wp_customize->add_section( 'custom_h_fonts' , array(
    'title'      => __('Headings Font','manly-recipes'), 
    'panel'      => 'typography_settings',
    'priority'   => 100    
  ) ); 

$wp_customize->add_setting(
      'manly_h1_font_type',
      array(
          'default'         => 'Open Sans',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );

   $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_h1_font_type',
            array(
                'label'          => __( 'Font', 'manly-recipes' ),
                'section'        => 'custom_h_fonts',
                'settings'       => 'manly_h1_font_type',
                'type'           => 'select',
                'choices'        => array(
                  'Open Sans' =>  'Open Sans',
                  'Roboto'  =>  'Roboto',
                  'Source Sans Pro' =>  'Source Sans Pro',
                  'Raleway' =>  'Raleway',
                  'Titillium Web' =>  'Titillium Web',
                  'Josefin Sans'  =>  'Josefin Sans',
                  'Josefin Slab'  =>  'Josefin Slab',
                  'Kanit' =>  'Kanit',
                  'Trirong' =>  'Trirong',
                  'Cormorant Garamond'  =>  'Cormorant Garamond',
                  'Taviraj' =>  'Taviraj'
                )
            )
        )       
   );


 // Paragraph Font

   $wp_customize->add_section( 'custom_p_fonts' , array(
    'title'      => __('Paragraph Font','manly-recipes'), 
    'panel'      => 'typography_settings',
    'priority'   => 100    
  ) );  

   $wp_customize->add_setting(
      'manly_p_font_size',
      array(
          'default'         => '14px',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_p_font_size',
            array(
                'label'          => __( 'Font Size', 'manly-recipes' ),
                'section'        => 'custom_p_fonts',
                'settings'       => 'manly_p_font_size',
                'type'           => 'select',
                'choices'        => array(
                  '12'   => '12px',
                  '14'   => '14px',
                  '16'   => '16px',
                  '18'   => '18px',
                  '20'   => '20px',
                  '22'   => '22px'
                )
            )
        )       
   ); 


   $wp_customize->add_setting(
      'manly_p_font_type',
      array(
          'default'         => 'Open Sans',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );

   $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_p_font_type',
            array(
                'label'          => __( 'Font', 'manly-recipes' ),
                'section'        => 'custom_p_fonts',
                'settings'       => 'manly_p_font_type',
                'type'           => 'select',
                'choices'        => array(
                  'Open Sans' =>  'Open Sans',
                  'Roboto'  =>  'Roboto',
                  'Source Sans Pro' =>  'Source Sans Pro',
                  'Raleway' =>  'Raleway',
                  'Titillium Web' =>  'Titillium Web',
                  'Josefin Sans'  =>  'Josefin Sans',
                  'Josefin Slab'  =>  'Josefin Slab',
                  'Kanit' =>  'Kanit',
                  'Trirong' =>  'Trirong',
                  'Cormorant Garamond'  =>  'Cormorant Garamond',
                  'Taviraj' =>  'Taviraj'
                )
            )
        )       
   );

  
  // Add Custom CSS Textfield

  $wp_customize->add_section( 'custom_css_field' , array(
    'title'      => __('Custom CSS','manly-recipes'), 
    'panel'      => 'design_settings',
    'priority'   => 2000    
  ) );  
  $wp_customize->add_setting(
      'manly_custom_css',
      array(          
          'sanitize_callback' => 'sanitize_textarea'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_css',
            array(
                'label'          => __( 'Add custom CSS here', 'manly-recipes' ),
                'section'        => 'custom_css_field',
                'settings'       => 'manly_custom_css',
                'type'           => 'textarea'
            )
        )
   );

}
  
add_action( 'customize_register', 'manly_customize_register' );


// Call the custom css into the header

$defaults = array(
  'wp-head-callback'       => 'manly_style_header'
);
add_theme_support( 'custom-header', $defaults );

// Callback function for updating styles

function manly_style_header() {

   ?>

<style type="text/css">

h1, 
h2, 
h3, 
h4, 
h5, 
h6 {
	font-family: <?php echo get_theme_mod('manly_h1_font_type'); ?>;
}

h1,
h1 a,
h2,
h2 a,
h3,
h3 a,
h4,
h4 a,
h5,
h5 a,
h6,
h6 a {
  color: <?php echo get_theme_mod('manly_h1_color'); ?>;
  font-family: <?php echo get_theme_mod('manly_h1_font_type'); ?>;
}

p {  
  font-size: <?php echo get_theme_mod('manly_p_font_size') . 'px'; ?>;
  color: <?php echo get_theme_mod('manly_p_color'); ?>;
  font-family: <?php echo get_theme_mod('manly_p_font_type'); ?>;
}

li {
  font-size: <?php echo get_theme_mod('manly_p_font_size') . 'px'; ?>;
  color: <?php echo get_theme_mod('manly_p_color'); ?>;
  font-family: <?php echo get_theme_mod('manly_p_font_type'); ?>;
}

a {
	font-family: <?php echo get_theme_mod('manly_p_font_type'); ?>;
}

a,
a:visited,
a:hover,
a:focus,
a:active,
.social-icons a:hover,
.fa,
.footer-social .fa:hover,
.footer-social a:hover {
	color: <?php echo get_theme_mod('manly_accent_color'); ?>;
}

button,
html input[type="button"],
input[type="reset"],
input[type="submit"] {
  background-color: <?php echo get_theme_mod('manly_accent_color'); ?>;
  border-color: <?php echo get_theme_mod('manly_accent_color'); ?>;
}

button:hover,
html input[type="button"]:hover,
input[type="reset"]:hover,
input[type="submit"]:hover,
.manlyCarousel button:hover {
  border-color: <?php echo get_theme_mod('manly_accent_color'); ?>;
  color: <?php echo get_theme_mod('manly_accent_color'); ?>;
}

.manlyCarousel button {
  background-color: <?php echo get_theme_mod('manly_accent_color'); ?>;
}

.carousel-caption button:hover {
  border: 2px solid <?php echo get_theme_mod('manly_accent_color'); ?>;
}

.menu2 {
  border-top: 1px solid <?php echo get_theme_mod('manly_accent_color'); ?>;
}

.recipe-container h3,
.recipe-container .fa,
.recipe-title,
footer a:hover {
  color: <?php echo get_theme_mod('manly_accent_color'); ?>;
}

.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus,
.navbar-default .navbar-nav > .active > a,
.navbar-default .navbar-nav > .active > a:hover,
.navbar-default .navbar-nav > .active > a:focus,
.dropdown-menu > li > a:hover,
.dropdown-menu > li > a:focus,
.navbar-default .navbar-nav > .open > a,
.navbar-default .navbar-nav > .open > a:hover,
.navbar-default .navbar-nav > .open > a:focus,
.dropdown-menu > .active > a,
.dropdown-menu > .active > a:hover,
.dropdown-menu > .active > a:focus {
  background-color: <?php echo get_theme_mod('manly_accent_color'); ?>;
}

@media (max-width: 767px) {

  .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
    color: <?php echo get_theme_mod('manly_accent_color'); ?>;
  }
}

  <?php if( get_theme_mod('manly_custom_css') != '' ) {
    echo get_theme_mod('manly_custom_css');
  } ?>

  </style>

<?php 

}

// Add theme support for Custom Backgrounds

$defaults = array(
  'default-color' => '#ffffff',
);
add_theme_support( 'custom-background', $defaults );


// Sanitize text 

function sanitize_text( $text ) {
    
    return sanitize_text_field( $text );

}

// Sanitize textarea 

function sanitize_textarea( $text ) {
    
    return esc_textarea( $text );

}

// Custom js for theme customizer

function manly_customizer_js() {
  wp_enqueue_script(
    'manly_theme_customizer',
    get_template_directory_uri() . '/js/theme-customizer.js',
    array( 'jquery', 'customize-preview' ),
    '',
    true
);
}
add_action( 'customize_preview_init', 'manly_customizer_js' );

?>