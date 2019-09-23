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
        <article class="card awe-cards">
            <a href="<?php echo esc_url($settings['link']['url'])?>" class="card__link" target="_blank">
                <!-- Icon -->
                <div class="card__icon awe-card-icon">
                    <svg viewbox="0 0 1129 994">
                        <g fill="none" fill-rule="nonzero" stroke="#999" stroke-width="41">
                        <path d="M564.5 212.437L95.67 873.5h937.66L564.5 212.437z"/>
                        <path d="M564.5 407.47L163.638 973.5h801.724L564.5 407.47z"/>
                        <path d="M564.5 35.409L39.699 774.5H1089.3L564.5 35.409z"/>
                        </g>
                    </svg>
                </div>
                <!-- Media -->
                <div class="card__media">
                    <svg viewbox="0 0 1129 994">
                        <g fill="none" fill-rule="nonzero" stroke="#F5F5F5" stroke-width="41">
                        <path d="M564.5 212.437L95.67 873.5h937.66L564.5 212.437z"/>
                        <path d="M564.5 407.47L163.638 973.5h801.724L564.5 407.47z"/>
                        <path d="M564.5 35.409L39.699 774.5H1089.3L564.5 35.409z"/>
                        </g>
                    </svg>
                </div>
                <!-- Header -->
                <div class="card__header">
                    <?php if ( $settings['title'] ) :
                        printf( '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape( $settings['title_tag'] ),
                            $this->get_render_attribute_string( 'title' ),
                            esc_html( $settings['title'] )
                        );
                    endif;?>
                    <p <?php echo $this->get_render_attribute_string( 'subtitle' ); ?>><?php echo esc_html($settings['sub_title']);?></p>
                    <div class="card__header-icon">
                        <svg viewbox="0 0 28 25">
                        <path fill="#fff" d="M13.145 2.13l1.94-1.867 12.178 12-12.178 12-1.94-1.867 8.931-8.8H.737V10.93h21.339z"/>
                        </svg>
                    </div>
                </div>
            </a>
    </article>
   <?php endif;?>


<?php if($settings['style'] === 'style2'):?>
       
<div class="card2">
      <div class="card2__image-container">
         <img class="card2__image" src="<?php echo esc_url($settings['image']['url']);?>" alt="<?php echo esc_html($settings['title']);?>">
      </div>
      <svg class="card2__svg" viewBox="0 0 800 500">
         <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
         <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
      </svg>
      <div class="card2__content">
            <?php if ( $settings['title'] ) :
                        printf( '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape( $settings['title_tag'] ),
                            $this->get_render_attribute_string( 'title2' ),
                            esc_html( $settings['title'] )
                        );
                    endif;?>
         <p <?php echo $this->get_render_attribute_string( 'content' ); ?>><?php echo esc_html($settings['content']);?></p>
      </div>
   </div>
<?php endif;?>