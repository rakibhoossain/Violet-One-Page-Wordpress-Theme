<!-- Finished task -->
    <div class="finished section-padding" style="<?php violet_bg('counter');?>">
        <div class="overlay" style="<?php violet_overlay('counter');?>"></div>
    	<div class="container">
    		<div class="row">
                <?php if(is_active_sidebar( 'counter-sidebar' )): dynamic_sidebar( 'counter-sidebar' ); endif;?>
			</div>
		</div>
    </div>