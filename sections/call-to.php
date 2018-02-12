<?php 
    $violet_call_to_message = get_theme_mod('violet_call_to_message',__('You think we are cool? lets work together','violet')); 

    $violet_call_to_btn = esc_attr( get_theme_mod('violet_call_to_btn',__('Lets Start','violet')) );
    $violet_call_to_link = esc_url( get_theme_mod('violet_call_to_link',__('#contact','violet')) );
?>

<!-- Call to action -->
    <div class="call-to-action section-padding" id="call-to-action" style="<?php violet_bg('call-to-action');?>">
        <div class="overlay" style="<?php violet_overlay('call-to-action');?>"></div>
        
        <div class="tbl">
            <div class="tbl-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="call-to-action-message wow fadeInUp"><?php echo $violet_call_to_message; ?></div>
                        </div>
                        <?php if ('' !== $violet_call_to_btn): ?>
                        <div class="col-md-4 text-center">
                            <a href="<?php echo $violet_call_to_link; ?>" class="wow fadeInUp violet-btn call-to-btn"><?php echo $violet_call_to_btn; ?></a>
                        </div>
                        <?php endif; ?>
                    </div>     
                </div>
            </div>
        </div>
    </div>