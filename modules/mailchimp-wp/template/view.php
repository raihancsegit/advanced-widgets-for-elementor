<?php
  $settings   = $this->get_settings_for_display();
  $this->add_render_attribute( 'mailchimp_area_attr', 'class', 'advanced-addons-mailchimp' );
  $this->add_render_attribute( 'mailchimp_area_attr', 'class', 'advanced-addons-mailchimp-style-'.$settings['advanced-addons_mailchimp_form_style'] );
 
  ?>
      <div <?php echo $this->get_render_attribute_string( 'mailchimp_area_attr' ); ?> >
          <div class="advanced-addons-input-box">
              <?php echo do_shortcode( '[mc4wp_form  id="'.$settings['advanced-addons_mailchimp_id'].'"]' ); ?>
          </div>
      </div>
