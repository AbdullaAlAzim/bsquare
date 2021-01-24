<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}
Kirki::add_config( 'bsquare', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );
Kirki::add_panel( 'customizer_panel_id', array(
	'priority'    => 10,
	'title'       => esc_attr__( 'Theme Option', 'bsquare' ),
	'description' => esc_attr__( 'My panel description', 'bsquare' ),
) );
// Banner section start
Kirki::add_section( 'customizer_section_one', array(
	'title'          => esc_attr__( 'Banner section', 'bsquare' ),
	'description'    => esc_attr__( 'My section description.', 'bsquare' ),
	'priority'       => 160,
	'panel'=>'customizer_panel_id'
) );


Kirki::add_field( 'customizer_section_one', array(
	'type'     => 'link',
	'settings' => 'my_vd',
	'label'    => __( 'Banner vedio link', 'bsquare' ),
	'description'    => __( 'only past vemio vedio link', 'bsquare' ),
	'section'  => 'customizer_section_one',
	'default'  => esc_attr__( 'https://vimeo.com/211465620', 'bsquare' ),
	'priority' => 10,
	'partial_refresh' => array(
		'my_vd' => array(
			'selector'        => '.video',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'my_vd' ));
			},
		),
	),
) );
Kirki::add_field( 'customizer_section_one', array(
	'type'     => 'text',
	'settings' => 'msy_setting',
	'label'    => __( 'Banner title', 'bsquare' ),
	'section'  => 'customizer_section_one',
	'default'  => esc_html__( 'Write your banner title', 'bsquare' ),
	'priority' => 10,
	'partial_refresh' => array(
		'msy_setting' => array(
			'selector'        => '.support',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'msy_setting' ));
			},
		),
	),
) );
Kirki::add_field( 'customizer_section_one', array(
	'type'     => 'text',
	'settings' => 'my_subtitle',
	'label'    => __( 'Banner Subtitle', 'bsquare' ),
	'section'  => 'customizer_section_one',
	'default'  => esc_attr__( 'write your banner Subtitle', 'bsquare' ),
	'priority' => 10,
	'partial_refresh' => array(
		'my_subtitle' => array(
			'selector'        => '.subtitle',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'my_subtitle' ));
			},
		),
	),
) );
// Banner section End

//Service section start
Kirki::add_section( 'customizer_section_two', array(
	'title'          => esc_attr__( 'Service section', 'bsquare' ),
	'description'    => esc_attr__( 'Service section', 'bsquare' ),
	'priority'       => 160,
	'panel'=>'customizer_panel_id'
) );
// Repeater Setting
Kirki::add_field( 'customizer_section_two', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Services', 'bsquare' ),
    'section'     => 'customizer_section_two',
    'priority'    => 10,
      'partial_refresh' => array(
		'customizer_section_two' => array(
			'selector'        => '.card-one',
			'render_callback' => function() {
				return get_theme_mod('customizer_section_two');
			},
		),
	),
    'choices' => array(
    'limit' => 5
    ),
    'row_label' => array(
        'type'  => 'field',
        'value' => esc_attr__('service', 'bsquare' ),
        'field' => 'service_title',
    ),
    'settings'    => 'customizer_section_two',
    // Defining Pre-Made Repeater Fields
    'fields' => array(
    	   'service_title' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Service Title', 'bsquare' ),
            'default'     => '',
        ),
        'service_image' => array(
            'type'        => 'upload',
            'label'       => esc_attr__( 'Service image', 'bsquare' ),
            'default'     =>  '',
        ),
     
        'service_subtile' => array(
            'type'        => 'textarea',
            'label'       => esc_attr__( 'Service Subtitle', 'bsquare' ),
            'default'     => '',
        ),
       'service_btn' => array(
        'type'        => 'text',
        'label'       => esc_attr__( 'Service Button Text', 'bsquare' ),
        'default'     => '',
        ),
        'service_btn_lnk' => array(
        'type'        => 'text',
        'label'       => esc_attr__( 'Service Button Link', 'bsquare' ),
        'default'     => '',
    ),
    )
) );

//Service section end

// counter section start
Kirki::add_section( 'customizer_section_three', array(
	'title'          => esc_attr__( 'counter section', 'bsquare' ),
	'description'    => esc_attr__( 'My counter section.', 'bsquare' ),
	'priority'       => 160,
	'panel'=>'customizer_panel_id'
) );
Kirki::add_field( 'customizer_section_three', array(
	'type'     => 'image',
	'settings' => 'quote_bg',
	'label'    => __( 'Upload your Background Image', 'bsquare' ),
	'section'  => 'customizer_section_three',
	'priority' => 10,
   'default'  => '' ,

) );
Kirki::add_field( 'customizer_section_three', array(
	'type'     => 'text',
	'settings' => 'Quote_title',
	'label'    => __( 'Quote Title', 'bsquare' ),
	'section'  => 'customizer_section_three',
	'priority' => 10,

) );
Kirki::add_field( 'customizer_section_three', array(
	'type'     => 'text',
	'settings' => 'Quote_subtitle',
	'label'    => __( 'Quote subtitle', 'bsquare' ),
	'section'  => 'customizer_section_three',
	'priority' => 10,

) );
Kirki::add_field( 'customizer_section_three', array(
	'type'     => 'textarea',
	'settings' => 'counter_form',
	'label'    => __( 'counter section form', 'bsquare' ),
	'section'  => 'customizer_section_three',
	'default'  => esc_attr__( 'Contact form Shortcode', 'bsquare' ),
	'priority' => 10,

) );
Kirki::add_field( 'customizer_section_three', array(
	'type'     => 'text',
	'settings' => 'counter_tilte',
	'label'    => __( 'counter title', 'bsquare' ),
	'section'  => 'customizer_section_three',
	'default'  => esc_attr__( 'write your counter title', 'bsquare' ),
	'priority' => 10,
	'partial_refresh' => array(
		'counter_tilte' => array(
			'selector'        => '.rasub',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'counter_tilte' ));
			},
		),
	),
) );
Kirki::add_field( 'customizer_section_three', array(
	'type'     => 'text',
	'settings' => 'counter_subtitle',
	'label'    => __( 'counter Subtitle', 'bsquare' ),
	'section'  => 'customizer_section_three',
	'default'  => esc_attr__( 'write your counter Subtitle', 'bsquare' ),
	'priority' => 10,
	'partial_refresh' => array(
		'counter_subtitle' => array(
			'selector'        => '.ami',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'counter_subtitle' ));
			},
		),
	),
) );
Kirki::add_field( 'customizer_section_three', array(
	'type'     => 'editor',
	'settings' => 'counter_des',
	'label'    => __( 'counter Description', 'bsquare' ),
	'section'  => 'customizer_section_three',
	'default'  => esc_attr__( 'write your counter Description', 'bsquare' ),
	'priority' => 10,
	'partial_refresh' => array(
		'counter_des' => array(
			'selector'        => '.counter-sub',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'counter_des' ));
			},
		),
	),
) );
// Repeater Setting
Kirki::add_field( 'customizer_section_three', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'counter', 'bsquare' ),
    'section'     => 'customizer_section_three',
    'priority'    => 10,
	'partial_refresh' => array(
	'customizer_section_three' => array(
		'selector'        => '.racount',
		'render_callback' => function() {
			return apply_filters( 'the_content',get_theme_mod( 'customizer_section_three' ));
		},
	  ),
	),
    'choices' => array(
    'limit' => 4
    ),
    'row_label' => array(
        'type'  => 'field',
        'value' => esc_attr__('counter', 'bsquare' ),
        'field' => 'counter_title',
    ),
    'settings'    => 'customizer_section_three',
    // Defining Pre-Made Repeater Fields
    'fields' => array(
        'counter_title' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'counter Value input', 'bsquare' ),
            'description' => esc_attr__( 'This will be the title of your counter', 'bsquare' ),
            'default'     => '',
        ),
        'counter_sub' => array(
            'type'        => 'textarea',
            'label'       => esc_attr__( 'counter Text', 'bsquare' ),
            'description' => esc_attr__( 'This will be the text displayed below the service title', 'bsquare' ),
            'default'     => '',
        ),

    )
) );
// counter section end

// project section start
Kirki::add_section( 'customizer_section_four', array(
	'title'          => esc_attr__( 'project section', 'bsquare' ),
	'description'    => esc_attr__( 'My project section.', 'bsquare' ),
	'priority'       => 160,
	'panel'=>'customizer_panel_id'
) );
Kirki::add_field( 'customizer_section_four', array(
	'type'     => 'text',
	'settings' => 'project_subheading',
	'label'    => __( 'project subheading', 'bsquare' ),
	'section'  => 'customizer_section_four',
	'default'  => esc_attr__( 'project Subheading', 'bsquare' ),
	'priority' => 10,
	'partial_refresh' => array(
		'my_project' => array(
			'selector'        => '.projecsub',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'my_project' ));
			},
		),
	),
) );
Kirki::add_field( 'customizer_section_four', array(
	'type'     => 'text',
	'settings' => 'project_title',
	'label'    => __( 'project title', 'bsquare' ),
	'section'  => 'customizer_section_four',
	'default'  => esc_attr__( 'write your project title', 'bsquare' ),
	'priority' => 10,
	'partial_refresh' => array(
		'project_tit' => array(
			'selector'        => '.Projecttit',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'project_tit' ));
			},
		),
	),
) );
Kirki::add_field( 'customizer_section_four', array(
	'type'     => 'text',
	'settings' => 'project_subtitle',
	'label'    => __( 'project Subtitle', 'bsquare' ),
	'section'  => 'customizer_section_four',
	'default'  => esc_attr__( 'write your project Subtitle', 'bsquare' ),
	'priority' => 10,
	'partial_refresh' => array(
		'project_subti' => array(
			'selector'        => '.subti',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'project_subti' ));
			},
		),
	),
) );
// Repeater Setting
Kirki::add_field( 'customizer_section_four', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'project', 'bsquare' ),
    'section'     => 'customizer_section_four',
    'priority'    => 10,
    'partial_refresh' => array(
		'customizer_section_four' => array(
			'selector'        => '.ok',
			'render_callback' => function() {
				return get_theme_mod('customizer_section_four');
			},
		),
	),
    'choices' => array(
    'limit' => 5
    ),
    'row_label' => array(
        'type'  => 'field',
        'value' => esc_attr__('project', 'bsquare' ),
        'field' => 'pro_title',
    ),
    'settings'    => 'customizer_section_four',
    // Defining Pre-Made Repeater Fields
    'fields' => array(
        'project_img' => array(
            'type'        => 'image',
            'label'       => esc_attr__( 'input your project image', 'bsquare' ),
            'default'     => '',
        ),

         'pro_title' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Input your project name', 'bsquare' ),
            'default'     => '',
        ),
        'pro_sub' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Input your project Area', 'bsquare' ),
            'default'     => '',
        ),

    )
) );
// project section end

//Team section start
Kirki::add_section( 'customizer_section_five', array(
	'title'          => esc_attr__( 'Team section', 'bsquare' ),
	'description'    => esc_attr__( 'My Team section.', 'bsquare' ),
	'priority'       => 160,
	'panel'=>'customizer_panel_id'
) );
Kirki::add_field( 'customizer_section_five', array(
	'type'     => 'text',
	'settings' => 'Team_subheading',
	'label'    => __( 'Team subheading', 'bsquare' ),
	'section'  => 'customizer_section_five',
	'default'  => esc_attr__( 'Team Subheading', 'bsquare' ),
	'priority' => 10,
	'partial_refresh' => array(
		'Team_sub' => array(
			'selector'        => '.tmsub',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'Team_sub' ));
			},
		),
	),
) );
Kirki::add_field( 'customizer_section_five', array(
	'type'     => 'text',
	'settings' => 'Team_title',
	'label'    => __( 'Team title', 'bsquare' ),
	'section'  => 'customizer_section_five',
	'default'  => esc_attr__( 'write your Team title', 'bsquare' ),
	'priority' => 10,
	'partial_refresh' => array(
		'Team_tit' => array(
			'selector'        => '.tmtile',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'Team_tit' ));
			},
		),
	),
) );
Kirki::add_field( 'customizer_section_five', array(
	'type'     => 'text',
	'settings' => 'Team_subtitle',
	'label'    => __( 'Team Subtitle', 'bsquare' ),
	'section'  => 'customizer_section_five',
	'default'  => esc_attr__( 'write your Team Subtitle', 'bsquare' ),
	'priority' => 10,
	'partial_refresh' => array(
		'Team_subtit' => array(
			'selector'        => '.tmsubtitle',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'Team_subtit' ));
			},
		),
	),
) );
// Repeater Setting
Kirki::add_field( 'bsquare', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Team', 'bsquare' ),
    'section'     => 'customizer_section_five',
    'priority'    => 10,
	'partial_refresh' => array(
	'customizer_section_five' => array(
		'selector'        => '.nananana',
		'render_callback' => function() {
			return apply_filters( 'the_content',get_theme_mod( 'customizer_section_five' ));
		},
	),
 ),
    'row_label' => array(
        'type'  => 'field',
        'value' => esc_attr__('Team', 'bsquare' ),
        'field' => 'mem_name',
    ),
    'settings'    => 'customizer_section_five',
    // Defining Pre-Made Repeater Fields
    'fields' => array(
        'mem_img' => array(
            'type'        => 'image',
            'label'       => esc_attr__( 'input your Team Member image', 'bsquare' ),
            'default'     => '',
        ),

         'mem_desgi' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Input your Team Member Designation', 'bsquare' ),
            'default'     => '',
        ),
        'mem_name' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Input your Team Member name', 'bsquare' ),
            'default'     => '',
        ),

           'mem_details' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Input your Team Member Details', 'bsquare' ),
            'default'     => '',
        ),

            'mem_social_one' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Team Member Social Links', 'bsquare' ),
            'default'     => '',
        ),

            'mem_social_two' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Team Member Social Links', 'bsquare' ),
            'default'     => '',
        ),

            'mem_social_three' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Team Member Social Links', 'bsquare' ),
            'default'     => '',
        ),

            'mem_social_four' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Team Member Social Links', 'bsquare' ),
            'default'     => '',
        ),

    )
) );
//Team section End

//Testimonial section start
Kirki::add_section( 'customizer_section_six', array(
	'title'          => esc_attr__( 'Testimonial section', 'bsquare' ),
	'description'    => esc_attr__( 'My Testimonial section.', 'bsquare' ),
	'priority'       => 160,
	'panel'=>'customizer_panel_id'
) );
// Repeater Setting
Kirki::add_field( 'customizer_section_six', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Testimonial', 'bsquare' ),
    'section'     => 'customizer_section_six',
    'priority'    => 10,
    'section_six' => array(
	'selector'        => '.testify',
	'render_callback' => function() {
		return apply_filters( 'the_content',get_theme_mod( 'section_six' ));
	},
	),
    'choices' => array(
    'limit' => 2
    ),
    'row_label' => array(
        'type'  => 'field',
        'value' => esc_attr__('Testimonial', 'bsquare' ),
        'field' => 'test_name',
    ),

    'settings'    => 'customizer_section_six',
    // Defining Pre-Made Repeater Fields
    'fields' => array(
        'test_img' => array(
            'type'        => 'image',
            'label'       => esc_attr__( 'input your Testimonial Member image', 'bsquare' ),
            'default'     => '',
        ),

         'test_desgi' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Input your Testimonial Member Designation', 'bsquare' ),
            'default'     => '',
        ),
        'test_name' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Input your Testimonial Member name', 'bsquare' ),
            'default'     => '',
        ),

         'test_spc' => array(
            'type'        => 'textarea',
            'label'       => esc_attr__( 'Input your Testimonial Member Speach', 'bsquare' ),
            'default'     => '',
        ),
    )
) );
//Testimonial section end

//blog section start
Kirki::add_section( 'customizer_section_seven', array(
	'title'          => esc_attr__( 'Blog section', 'bsquare' ),
	'description'    => esc_attr__( 'My Blog section.', 'bsquare' ),
	'priority'       => 160,
	'panel'=>'customizer_panel_id'
) );
Kirki::add_field( 'customizer_section_seven', array(
	'type'     => 'text',
	'settings' => 'Blog_subheading',
	'label'    => __( 'Blog subheading', 'bsquare' ),
	'section'  => 'customizer_section_seven',
	'default'  => esc_attr__( 'Blog Subheading', 'bsquare' ),
	'priority' => 10,
	'partial_refresh' => array(
		'my_setting' => array(
			'selector'        => '.ssupport-info',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'msy_setting' ));
			},
		),
	),
) );
Kirki::add_field( 'customizer_section_seven', array(
	'type'     => 'text',
	'settings' => 'Blog_title',
	'label'    => __( 'Blog title', 'bsquare' ),
	'section'  => 'customizer_section_seven',
	'default'  => esc_attr__( 'Blog title', 'bsquare' ),
	'priority' => 10,
	'partial_refresh' => array(
		'my_setting' => array(
			'selector'        => '.ssupport-info',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'msy_setting' ));
			},
		),
	),
) );

Kirki::add_field( 'customizer_section_seven', array(
	'type'     => 'text',
	'settings' => 'Blog_sub',
	'label'    => __( 'Blog Subtitle', 'bsquare' ),
	'section'  => 'customizer_section_seven',
	'default'  => esc_attr__( 'Blog Subtitle', 'bsquare' ),
	'priority' => 10,
	'partial_refresh' => array(
		'my_setting' => array(
			'selector'        => '.ssupport-info',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'msy_setting' ));
			},
		),
	),
) );

Kirki::add_field( 'customizer_section_seven', array(
	'type'     => 'number',
	'settings' => 'Blog_lt',
	'label'    => __( 'Blog Limit', 'bsquare' ),
	'section'  => 'customizer_section_seven',
	'default'  => esc_attr__( 'Blog Limit', 'bsquare' ),
	'priority' => 10,
	'default'     => 42,
	'choices'     => [
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	],
	'partial_refresh' => array(
		'my_setting' => array(
			'selector'        => '.ssupport-info',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'msy_setting' ));
			},
		),
	),
) );


Kirki::add_field( 'customizer_section_seven', array(
	'type'        => 'switch',
	'settings'    => 'bred_swict',
	'label'       => __( 'on/off', 'bsquare' ),
	'section'     => 'customizer_section_seven',
	'default'     => false,
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_html__( 'Enable', 'bsquare' ),
		'off' => esc_html__( 'Disable', 'bsquare' ),
	),

) );

Kirki::add_field( 'customizer_section_seven', array(
	'type'        => 'color',
	'settings'    => 'bread_color',
	'label'       => __( 'Color Control (with alpha channel)', 'kirki' ),
	'description' => esc_html__( 'This is a color control - with alpha channel.', 'kirki' ),
	'section'     => 'customizer_section_seven',
	'priority' => 10,
	'default'     => '#2e9e5b',
	'active_callback'  => [
		[
			'setting'  => 'bred_swict',
			'operator' => '===',
			'value'    => true,
		],
		
	]

) );
Kirki::add_field( 'customizer_section_seven', array(
	'type'     => 'Image',
	'settings' => 'Blog_bread',
	'label'    => __( 'Blog Single Breadcrumb image', 'bsquare' ),
	'section'  => 'customizer_section_seven',
	'default'  => esc_attr__( 'Breadcrumb image', 'bsquare' ),
	'priority' => 10,

	'active_callback'  => [
		[
			'setting'  => 'bred_swict',
			'operator' => '===',
			'value'    => true,
		],
		
	]
) );



//blog section end

Kirki::add_section( 'customizer_section_eight', array(
	'title'          => esc_attr__( 'contact section', 'bsquare' ),
	'description'    => esc_attr__( 'contact section', 'bsquare' ),
	'priority'       => 160,
	'panel'=>'customizer_panel_id'
) );
Kirki::add_field( 'customizer_section_eight', array(
	'type'     => 'text',
	'settings' => 'contact_Subheading',
	'label'    => __( 'contact Subheading', 'bsquare' ),
	'section'  => 'customizer_section_eight',
	'default'  => '',
	'priority' => 10,
) );

Kirki::add_field( 'customizer_section_eight', array(
	'type'     => 'text',
	'settings' => 'contact_title',
	'label'    => __( 'contact Title', 'bsquare' ),
	'section'  => 'customizer_section_eight',
	'default'  => '',
	'priority' => 10,
) );

Kirki::add_field( 'customizer_section_eight', array(
	'type'     => 'textarea',
	'settings' => 'contact_des',
	'label'    => __( 'contact Description', 'bsquare' ),
	'section'  => 'customizer_section_eight',
	'default'  => '',
	'priority' => 10,
) );

Kirki::add_field( 'customizer_section_eight', array(
	'type'     => 'editor',
	'settings' => 'map_left',
	'label'    => __( 'contact Form shortcode', 'bsquare' ),
	'section'  => 'customizer_section_eight',
	'default'  => esc_attr__( 'Input your shortcode', 'bsquare' ),
	'priority' => 10,
	'partial_refresh' => array(
		'map_left' => array(
			'selector'        => '.mamb',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'map_left' ));
			},
		),
	),
) );

Kirki::add_field( 'customizer_section_eight', array(
	'type'     => 'editor',
	'settings' => 'con_right',
	'label'    => __( 'Map shortcode', 'bsquare' ),
	'section'  => 'customizer_section_eight',
	'default'  => esc_attr__( 'Input your shortcode', 'bsquare' ),
	'priority' => 10,
	 'default'     => '',
	'partial_refresh' => array(
		'con_right' => array(
			'selector'        => '.maamb',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'con_right' ));
			},
		),
	),
) );

//Company section start
Kirki::add_section( 'customizer_section_nine', array(
	'title'          => esc_attr__( 'Company Info section', 'bsquare' ),
	'description'    => esc_attr__( 'Company Info', 'bsquare' ),
	'priority'       => 160,
	'panel'=>'customizer_panel_id'
) );
// Repeater Setting
Kirki::add_field( 'customizer_section_nine', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Company', 'bsquare' ),
    'section'     => 'customizer_section_nine',
    'priority'    => 10,
    'choices' => array(
    'limit' => 4
    ),
    'row_label' => array(
        'type'  => 'field',
        'value' => esc_attr__('Company', 'bsquare' ),
        'field' => 'link_text',
    ),
    'settings'    => 'customizer_section_nine',
// Defining Pre-Made Repeater Fields
    'fields' => array(

         'Com_txt' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Input your text', 'bsquare' ),
            'default'     => '',
        ),
         'Com_ara' => array(
            'type'        => 'textarea',
            'label'       => esc_attr__( 'Input your text', 'bsquare' ),
            'default'     => '',
        ),

         'Com_img' => array(
            'type'        => 'upload',
            'label'       => esc_attr__( 'Input your text', 'bsquare' ),
            'default'     => '',
        ),
    )
) );
//Company section end

//Copyright section start
Kirki::add_section( 'customizer_section_ten', array(
	'title'          => esc_attr__( 'Copyright section', 'bsquare' ),
	'description'    => esc_attr__( 'Copyright text', 'bsquare' ),
	'priority'       => 160,
	'panel'=>'customizer_panel_id'
) );
Kirki::add_field( 'customizer_section_ten', array(
	'type'     => 'editor',
	'settings' => 'Copy_right',
	'label'    => __( 'Blog Copyright', 'bsquare' ),
	'section'  => 'customizer_section_ten',
	'default'  => esc_attr__( 'Input your Copyright', 'bsquare' ),
	'priority' => 10,
	'partial_refresh' => array(
		'Copy_right' => array(
			'selector'        => '.mam',
			'render_callback' => function() {
				return apply_filters( 'the_content',get_theme_mod( 'Copy_right' ));
			},
		),
	),
) );
//Copyright section End


//Copyright section start
Kirki::add_section( 'customizer_section_eleven', array(
	'title'          => esc_attr__( 'section Up/Down', 'bsquare' ),
	'description'    => esc_attr__( 'section Up/Down', 'bsquare' ),
	'priority'       => 160,
	'panel'=>'customizer_panel_id'
) );
Kirki::add_field( 'customizer_section_eleven', array(
	'type'     => 'sortable',
	'settings' => 'My_sorter',
	'label'    => __( 'section Up/Down', 'bsquare' ),
	'section'  => 'customizer_section_eleven',
	'priority' => 10,
	    'default'     => array(
        'banner',
        'service',
        'counter',
        'project',
        'team',
        'testimony',
        'news',
        'contact',
        'address',
    ),
	'choices'       => [
		'banner'    => esc_html__( 'Banner', 'bsquare' ),
		'service'   => esc_html__( 'Service', 'bsquare' ),
		'counter'   => esc_html__( 'Counter', 'bsquare' ),
		'project'   => esc_html__( 'Project', 'bsquare' ),
		'team'      => esc_html__( 'Team', 'bsquare' ),
		'testimony' => esc_html__( 'Testimony', 'bsquare' ),
		'news'      => esc_html__( 'News', 'bsquare' ),
		'contact'   => esc_html__( 'Contact', 'bsquare' ),
		'address'   => esc_html__( 'Address', 'bsquare' ),
	],

) );
//preloader section start
Kirki::add_section( 'customizer_section_twelve', array(
	'title'          => esc_attr__( 'Preloader switch', 'bsquare' ),
	'description'    => esc_attr__( 'Preloader switch', 'bsquare' ),
	'priority'       => 160,
	'panel'=>'customizer_panel_id'
) );
Kirki::add_field( 'customizer_section_twelve', array(
	'type'     => 'switch',
	'settings' => 'preloader_swt',
	'label'    => __( 'Preloader', 'bsquare' ),
	'section'  => 'customizer_section_twelve',
	'priority' => 10,
	'default'     => '1',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'ON', 'kirki' ),
		'off' => esc_html__( 'OFF', 'kirki' ),
	],

) );
//preloader section end
