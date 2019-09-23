<?php
$settings = $this->get_settings_for_display();
?>
    <?php if($settings['style'] === 'style1'):?>
        <div class="neon awe-glow">
            <span class="text glow-text" data-text="<?php echo esc_html($settings['title']);?>"><?php echo esc_html($settings['title']);?></span>
            <span class="gradient glow-gra"></span>
            <span class="spotlight glow-sport"></span>
        </div>
   <?php endif;?>


<?php if($settings['style'] === 'style2'):?>
       
    
<?php endif;?>