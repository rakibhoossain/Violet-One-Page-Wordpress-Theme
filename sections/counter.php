<!-- Finished task -->
    <div class="finished section-padding" style="<?php violet_bg('counter');?>">
        <div class="overlay" style="<?php violet_overlay('counter');?>"></div>
    	<div class="container">
    		<div class="row">
                <?php if(is_active_sidebar( 'counter-area-widget' )): dynamic_sidebar( 'counter-area-widget' ); endif;?>
			</div>
		</div>
    </div>