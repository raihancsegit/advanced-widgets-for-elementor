<?php
$settings = $this->get_settings_for_display();
$this->add_inline_editing_attributes( 'title', 'none' );
$this->add_render_attribute( 'title', 'class', 'noti__type awe-alert-title' );
$this->add_inline_editing_attributes( 'subtitle', 'none' );
$this->add_render_attribute( 'subtitle', 'class', 'noti__message awe-alert-subtitle' );
?>
<?php if($settings['style'] === 'style1'):?>
       
<div class="noti__container">
    <div class="noti__cell">

        <div class="noti noti--green awe-main">
            <div class="noti__icon">
                <svg version="1.1" class="noti__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
            <g><g><path d="M504.502,75.496c-9.997-9.998-26.205-9.998-36.204,0L161.594,382.203L43.702,264.311c-9.997-9.998-26.205-9.997-36.204,0    c-9.998,9.997-9.998,26.205,0,36.203l135.994,135.992c9.994,9.997,26.214,9.99,36.204,0L504.502,111.7    C514.5,101.703,514.499,85.494,504.502,75.496z"></path>
                </g></g>
                </svg>
            </div>
            <div class="noti__content">
                <p <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo esc_html($settings['title']);?></p>
                <p <?php echo $this->get_render_attribute_string( 'subtitle' ); ?>><?php echo esc_html($settings['sub_title']);?></p>
            </div>
            <div class="noti__close">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.642 15.642" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 15.642 15.642">
                    <path fill-rule="evenodd" d="M8.882,7.821l6.541-6.541c0.293-0.293,0.293-0.768,0-1.061  c-0.293-0.293-0.768-0.293-1.061,0L7.821,6.76L1.28,0.22c-0.293-0.293-0.768-0.293-1.061,0c-0.293,0.293-0.293,0.768,0,1.061  l6.541,6.541L0.22,14.362c-0.293,0.293-0.293,0.768,0,1.061c0.147,0.146,0.338,0.22,0.53,0.22s0.384-0.073,0.53-0.22l6.541-6.541  l6.541,6.541c0.147,0.146,0.338,0.22,0.53,0.22c0.192,0,0.384-0.073,0.53-0.22c0.293-0.293,0.293-0.768,0-1.061L8.882,7.821z"></path>
                </svg>
            </div>
        </div>

    </div>
</div>
   <?php endif;?>