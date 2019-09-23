<?php
$settings = $this->get_settings_for_display();
$this->add_inline_editing_attributes( 'title', 'none' );
$this->add_render_attribute( 'title', 'class', 'card__header-title awe-card-title' );
$this->add_inline_editing_attributes( 'subtitle', 'none' );
$this->add_render_attribute( 'subtitle', 'class', 'card__header-meta awe-card-subtitle' );


$this->add_inline_editing_attributes( 'title2', 'none' );
$this->add_render_attribute( 'title2', 'class', 'card2__title awe-card-title' );
$this->add_inline_editing_attributes( 'content', 'none' );
$this->add_render_attribute( 'content', 'class', 'awe-card-content' );
?>
    <?php if($settings['style'] === 'style1'):?>
     <div class="awe-text-ani">
       <p><?php echo esc_html($settings['title']);?></p>
    </div>
   <?php endif;?>


<?php if($settings['style'] === 'style2'):?>
       

<?php endif;?>