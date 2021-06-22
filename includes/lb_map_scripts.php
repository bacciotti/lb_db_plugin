<?php

add_action('wp_enqueue_scripts', 'lb_map_adiciona_script');

function lb_map_adiciona_script()
{
    wp_enqueue_script(
        'lb_map_js',
        plugins_url() . '/lb_map/js/lb_map.js',
        array('jquery')
    );
}
