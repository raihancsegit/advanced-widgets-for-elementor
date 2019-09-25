<# if (settings.style === 'style1') { #>
       <div data-color="ffffff"  class="pt-60 pb-60 content-bg">
            <div class="advanced_addons_inline_notice  type-1 mb-60 notice_{{ settings.alert_type }}">
                <h3>
                    <# if (settings.icon && settings.icon !== '') { #>
                     <i class="inline-block  {{ settings.icon }}" aria-hidden="true"></i>
                     <# } else { #>
                     <i class="fa fa-check"></i>
                     <# } #>
                    {{ settings.title }}
                </h3>
                <div class="advanced_addons_inline_body bg-white">
                    {{ settings.desc }}
                </div>
        </div> 
       </div>
         <# } #>
        <# if (settings.style === 'style2') { #>
        <div data-color="106aea"  class="pt-60 pb-60 content-bg">
            <div class="advanced_addons_inline_notice  type-1 header-gap mb-60 notice_{{ settings.alert_type }}">
                    <h3>
                        <# if (settings.icon && settings.icon !== '') { #>
                     <i class="inline-block {{ settings.icon }}" aria-hidden="true"></i>
                     <# } else { #>
                     <i class="fa fa-check"></i>
                     <# } #>
                        {{ settings.title }}
                    </h3>
                    <div class="advanced_addons_inline_body bg-white">
                        sdsd
                        {{ settings.desc }}
                    </div>
            </div> 
        </div>
       <# } #>
       <# if (settings.style === 'style3') { #>
        <div data-color="ff7293"  class="pt-60 pb-60 content-bg">
            <div class="advanced_addons_inline_notice notice_{{ settings.alert_type }} rounded-0 bg-white type-2 mb-60 ">
                    <h3>
                        <# if (settings.icon && settings.icon !== '') { #>
                     <i class="inline-block  {{ settings.icon }}" aria-hidden="true"></i>
                     <# } else { #>
                     <i class="fa fa-check"></i>
                     <# } #>
                        {{ settings.title }}
                    </h3>
                    <div class="advanced_addons_inline_body  rounded-0">
                        {{ settings.desc }}
                    </div>
            </div> 
        </div>
       <# } #>