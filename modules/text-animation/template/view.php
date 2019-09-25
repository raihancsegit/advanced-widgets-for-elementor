<?php
$settings = $this->get_settings_for_display();
$this->add_inline_editing_attributes( 'title', 'none' );
$this->add_render_attribute( 'title', 'class', 'card__header-title awe-card-title' );
?>
   <?php if($settings['style'] === 'style1'):?>
         <div class="awe-text-ani">
            <p><?php echo esc_html($settings['title']);?></p>
         </div>
   <?php endif;?>


<?php if($settings['style'] === 'style2'):?>
   <div class="awe-text-ani2">
      <h1><?php echo esc_html($settings['title']);?></h1>
   </div>
<?php endif;?>