<?php
namespace Elementor;

function awe_for_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'awe_elementor',
        [
            'title'  => esc_html__('Advanced Widgets', ' aw_elementor'),
            'icon'   => 'eicon-font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\awe_for_elementor_init');


if (!function_exists('awe_for_elementor_array_get')) {
    function awe_for_elementor_array_get($array, $key, $default = null)
    {
        if (!is_array($array)) return $default;
        return array_key_exists($key, $array) ? $array[$key] : $default;
    }
}

add_filter( 'widget_text', 'do_shortcode' );
