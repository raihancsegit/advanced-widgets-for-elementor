<?php
$settings = $this->get_settings_for_display();
$this->add_inline_editing_attributes( 'title', 'none' );
$this->add_render_attribute( 'title', 'class', 'awe-quote-title' );
$this->add_inline_editing_attributes( 'content', 'none' );
$this->add_render_attribute( 'content', 'class', 'awe-quote-content' );

?>
    <?php if($settings['style'] === 'style1'):?>
       <div class="quote-con">
            <div class="quote1"><i class="fa fa-quote-left fa2"></i>
                <div class="text"><i class="fa fa-quote-right fa1"></i>
                    <div>
                        <?php if ( $settings['title'] ) :
                            printf( '<%1$s %2$s>%3$s</%1$s>',
                                tag_escape( $settings['title_tag'] ),
                                $this->get_render_attribute_string( 'title' ),
                                esc_html( $settings['title'] )
                            );
                        endif;?>
                        <p <?php echo $this->get_render_attribute_string( 'content' ); ?>><?php echo esc_html($settings['content']);?></p>
                    </div>
                </div>
            </div>
        </div>
   <?php endif;?>


<?php if($settings['style'] === 'style2'):?>
    <div class="blockquote-wrapper">
        <div class="blockquote">
            <h1>
                <span class="first"><?php echo esc_html($settings['first_content']);?></span> <span class="changecolor"><?php echo esc_html($settings['second_content']);?> </span><span class="third"><?php echo esc_html($settings['third_content']);?></span>
            </h1>
            <h4 class="author"><?php echo esc_html($settings['author']);?><br><em><?php echo esc_html($settings['position']);?></em></h4>
        </div>
    </div>
<?php endif;?>