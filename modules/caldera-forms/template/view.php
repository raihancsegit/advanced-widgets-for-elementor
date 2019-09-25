<?php
$settings   = $this->get_settings_for_display();
$calderaform_attributes = [
    'id' => $settings['caldera_form_list'],
];
$this->add_render_attribute( 'shortcode', $calderaform_attributes );

if ( !$settings['caldera_form_list'] ) {
    echo '<div class="advanced-addons-notices"><p>'.__('Please select a Caldera Form Setting!', 'aw_elementor').'</p></div>';
}else{
    echo do_shortcode( sprintf( '[caldera_form %s]', $this->get_render_attribute_string( 'shortcode' ) ) );
}