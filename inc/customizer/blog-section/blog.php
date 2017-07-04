<?php
global $onlinemag_panels;
global $onlinemag_sections;
global $onlinemag_settings_controls;
global $onlinemag_repeated_settings_controls;
global $onlinemag_customizer_defaults;

/*defaults values*/
$onlinemag_customizer_defaults['onlinemag-blog-enable'] = 1;
$onlinemag_customizer_defaults['onlinemag-blog-number'] = 4;
$onlinemag_customizer_defaults['onlinemag-blog-category'] = 1;

/*aboutoptions*/
$onlinemag_sections['onlinemag-blog-options'] =
    array(
        'priority'       => 230,
        'title'          => __( 'Home Blog Options', 'onlinemag' ),
    );

$onlinemag_settings_controls['onlinemag-blog-enable'] =
    array(
        'setting' =>     array(
            'default'              => $onlinemag_customizer_defaults['onlinemag-blog-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Blog', 'onlinemag' ),
            'section'               => 'onlinemag-blog-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

$onlinemag_settings_controls['onlinemag-blog-number'] =
    array(
        'setting' =>     array(
            'default'              => $onlinemag_customizer_defaults['onlinemag-blog-number']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of Blog/s', 'onlinemag' ),
            'description'           =>  __( 'Remember that featured post will not be counted', 'onlinemag' ),
            'section'               => 'onlinemag-blog-options',
            'type'                  => 'select',
            'choices'               => array(
                1 => __( '1', 'onlinemag' ),
                2 => __( '2', 'onlinemag' ),
                3 => __( '3', 'onlinemag' ),
                4 => __( '4', 'onlinemag' )
            ),
            'priority'              => 40,
            'active_callback'       => ''
        )
    );

/*creating setting control for onlinemag-fs-Category start*/
$onlinemag_settings_controls['onlinemag-blog-category'] =
    array(
        'setting' =>     array(
            'default'              => $onlinemag_customizer_defaults['onlinemag-blog-category']
        ),
        'control' => array(
            'label'                 =>  __( 'Select Category For Blog', 'onlinemag' ),
            'description'           =>  __( 'Blog will only displayed from this category', 'onlinemag' ),
            'section'               => 'onlinemag-blog-options',
            'type'                  => 'category_dropdown',
            'priority'              => 70,
            'active_callback'       => ''
        )
    );
