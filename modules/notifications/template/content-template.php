
        <# if (settings.style === 'style1') { #>
         <div class="advanced_addons_alert advanced_addons_{{ settings.alert_type }} advanced_addons_alert_bordered mb-2">
				<span class="alert-icon">
					 <# if (settings.icon && settings.icon !== '') { #>
			         <i class="{{ settings.icon }}" aria-hidden="true"></i>
			         <# } else { #>
			         <i class="fa fa-address-book" aria-hidden="true"></i>
			         <# } #>
				</span>
				<p>
					<strong>{{ settings.pre_title }}</strong>
					{{ settings.alert_title }}
				</p>
		</div> 
         <# } #>
         <# if (settings.style === 'style2') { #>
         <div class="advanced_addons_alert_area">
         	<div class="advanced_addons_alert advanced_addons_{{ settings.alert_type }} advanced_addons_alert_grad mb-2">
         		<span class="alert-icon">
					<# if (settings.icon && settings.icon !== '') { #>
			         <i class="{{ settings.icon }}" aria-hidden="true"></i>
			         <# } else { #>
			         <i class="fa fa-address-book" aria-hidden="true"></i>
			         <# } #>
				</span>
					<p>
					<strong>{{ settings.pre_title }}</strong>
					{{ settings.alert_title }}
				</p>
         	</div>
        	</div>
         <# } #>
         <# if (settings.style === 'style3') { #>
         <div class="advanced_addons_alert advanced_addons_{{ settings.alert_type }}  advanced_addons_alert_grad capsul mb-2">
         		<span class="alert-icon">
							<# if (settings.icon && settings.icon !== '') { #>
					         <i class="{{ settings.icon }}" aria-hidden="true"></i>
					         <# } else { #>
					         <i class="fa fa-address-book" aria-hidden="true"></i>
					         <# } #>
							<strong>{{ settings.pre_title }}</strong>
						</span>
					<p>
						{{ settings.alert_title }}
					</p>
         	</div>
         <# } #>
          <# if (settings.style === 'style4') { #>
         <div class="advanced_addons_alert_area" data-color="faffff">
         	<div class="advanced_addons_alert advanced_addons_{{ settings.alert_type }} advanced_addons_alert_underlined  mb-2">
         		<span class="alert-icon">
							<# if (settings.icon && settings.icon !== '') { #>
				         <i class="{{ settings.icon }}" aria-hidden="true"></i>
				         <# } else { #>
				         <i class="fa fa-address-book" aria-hidden="true"></i>
				         <# } #>
							
						</span>
					<p>
						<strong>{{ settings.pre_title }}</strong>
						{{ settings.alert_title }}
					</p>
         	</div>
         </div>
         <# } #>