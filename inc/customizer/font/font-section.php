<?php
global $onlinemag_panels;
global $onlinemag_sections;
global $onlinemag_settings_controls;
global $onlinemag_repeated_settings_controls;
global $onlinemag_customizer_defaults;

/*font array*/
global $onlinemag_google_fonts;
$onlinemag_google_fonts = array(
    'Archivo+Narrow:400,400italic,700' => 'Archivo Narrow',
    'Bitter:400,400italic,700' => 'Bitter',
    'Cookie' => 'Cookie',
    'Exo:400,300,400italic,600,800' => 'Exo',
    'Kreon:400,300,700' => 'Kreon',
    'Lato:400,300,400italic,900,700' => 'Lato',
    'Merriweather:400,400italic,300,900,700' => 'Merriweather',
    'News+Cycle:400,700' => 'News Cycle',
    'Oxygen:400,300,700' => 'Oxygen',
    'Playball' => 'Playball',
    'Ropa+Sans:400,400italic' => 'Ropa Sans',
    'Squada+One' => 'Squada One',
    'Tangerine:400,700' => 'Tangerine',
    'Ubuntu:400,400italic,500,700' => 'Ubuntu',
    'Varela+Round' => 'Varela Round',
    'Yanone+Kaffeesatz:400,300,700' => 'Yanone Kaffeesatz',
    'Raleway:100,100italic,400,700' => 'Raleway',
);

/*defaults values*/
$onlinemag_customizer_defaults['onlinemag-font-family-Primary'] = 'Lato:400,300,400italic,900,700';
$onlinemag_customizer_defaults['onlinemag-font-family-site-identity'] = 'Raleway:100,100italic,400,700';
$onlinemag_customizer_defaults['onlinemag-font-family-title'] = 'Raleway:100,100italic,400,700';


/*section*/
$onlinemag_sections['onlinemag-family'] =
    array(
        'priority'       => 20,
        'title'          => __( 'Font Family', 'onlinemag' ),
    );

$onlinemag_settings_controls['onlinemag-font-family-site-identity'] =
    array(
        'setting' =>     array(
            'default'              => $onlinemag_customizer_defaults['onlinemag-font-family-site-identity'],
            
        ),
        'control' => array(
            'label'                 => __( 'Site Identity/Logo', 'onlinemag' ),
            'description'           => __( 'Site Identity font family', 'onlinemag' ),
            'section'               => 'onlinemag-family',
            'type'                  => 'select',
            'choices'               => $onlinemag_google_fonts,
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

/*setting - controls*/
$onlinemag_settings_controls['onlinemag-font-family-Primary'] =
    array(
        'setting' =>     array(
            'default'              => $onlinemag_customizer_defaults['onlinemag-font-family-Primary'],
            
        ),
        'control' => array(
            'label'                 => __( 'Body ( paragraph ) Primary', 'onlinemag' ),
            'description'           => __( 'change primary font family', 'onlinemag' ),
            'section'               => 'onlinemag-family',
            'type'                  => 'select',
            'choices'               => $onlinemag_google_fonts,
            'priority'              => 15,
            'active_callback'       => ''
        )
    );


$onlinemag_settings_controls['onlinemag-font-family-title'] =
    array(
        'setting' =>     array(
            'default'              => $onlinemag_customizer_defaults['onlinemag-font-family-title'],
            
        ),
        'control' => array(
            'label'                 => __( 'Section Title', 'onlinemag' ),
            'description'           => __('section title font will be changed', 'onlinemag'),
            'section'               => 'onlinemag-family',
            'type'                  => 'select',
            'choices'               => $onlinemag_google_fonts,
            'priority'              => 20,
            'active_callback'       => ''
        )
    );