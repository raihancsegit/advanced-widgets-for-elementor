<?php
$settings = $this->get_settings_for_display();
$this->add_inline_editing_attributes( 'title', 'none' );
$this->add_render_attribute( 'title', 'class', 'card__header-title awe-card-title' );

?>
    <?php if($settings['style'] === 'style1'):?>
        <a href="#" class="badge">
            <svg viewBox="0 0 210 210">
                <g stroke="none" fill="none">
                    <path d="M22,104.5 C22,58.9365081 58.9365081,22 104.5,22 C150.063492,22 187,58.9365081 187,104.5" id="top"></path>
                    <path d="M22,104.5 C22,150.063492 58.9365081,187 104.5,187 C150.063492,187 187,150.063492 187,104.5" id="bottom"></path>
                </g>
                <circle cx="105" cy="105" r="62" stroke="currentColor" stroke-width="1" fill="none" />
                <text width="200" font-size="20" fill="currentColor">
                    <textPath startOffset="50%" text-anchor="middle" alignment-baseline="middle" xlink:href="#top">
                        <?php echo esc_html($settings['badge_text1']);?>
                    </textPath>
                </text>
                <text width="200" font-size="20" fill="currentColor">
                    <textPath startOffset="50%" text-anchor="middle" alignment-baseline="middle" xlink:href="#bottom">
                        <?php echo esc_html($settings['badge_text2']);?>
                    </textPath>
                </text>
            </svg>
            <span><?php echo esc_html($settings['badge_text3']);?></span>
        </a>
   <?php endif;?>


<?php if($settings['style'] === 'style2'):?>
 
<?php endif;?>