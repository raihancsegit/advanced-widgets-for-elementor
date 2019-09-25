<?php
$this->add_render_attribute( 'contact-form', 'class', [ 'ad-gravity-forms' ] );
?>
<div <?php echo $this->get_render_attribute_string( 'contact-form' ); ?>>
    <?php echo do_shortcode( $this->get_shortcode() ); ?>
</div>
