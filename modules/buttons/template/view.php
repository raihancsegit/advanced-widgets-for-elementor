<?php
$settings = $this->get_settings_for_display();
        $this->add_render_attribute( 'link', 'class', 'button awe-btn' );
        $this->add_render_attribute( 'link', 'href', esc_url( $settings['link']['url'] ) );
        if ( ! empty( $settings['link']['is_external'] ) ) {
            $this->add_render_attribute( 'link', 'target', '_blank' );
        }
        if ( ! empty( $settings['link']['nofollow'] ) ) {
            $this->add_render_attribute( 'link', 'rel', 'nofollow' );
        }
        $this->add_inline_editing_attributes( 'text', 'none' );
?>
    <?php if($settings['style'] === 'style1'):?>
        <div class="btn1">
          <a <?php echo $this->get_render_attribute_string( 'link' ); ?>> 
          
                <?php
                    if ( 'yes' === $settings['show_icon'] ) {?>
                         <i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
                  <?php  }                   
                ?>
                <?php echo esc_html($settings['text']); ?>
        
            </a>
        </div>
   <?php endif;?>


<?php if($settings['style'] === 'style2'):?>
 
<?php endif;?>