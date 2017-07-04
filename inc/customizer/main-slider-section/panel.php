<?php
global $onlinemag_panels;
/*creating panel for fonts-setting*/
$onlinemag_panels['onlinemag-feature-slider'] =
    array(
        'title'          => __( 'Home Main Slider', 'onlinemag' ),
        'priority'       => 200
    );

/*slider selection from slider options */
require get_template_directory().'/inc/customizer/main-slider-section/options.php';