 	<!-- sidebar -->
 	<aside class="sidebar">
	<?php if ( ot_get_option('atminan') != "off" ) { ?>
 	 <!-- iran -->
	<a class="iran" title="<?php echo ot_get_option('atminan_text1'); ?>" href="<?php echo ot_get_option('atminan_url'); ?>" target="_blank"><h4><?php echo ot_get_option('atminan_text1'); ?></h4><p><?php echo ot_get_option('atminan_text2'); ?></p> </a>	
	<?php } ?>
	<?php if ( ot_get_option('teleg') != "off" ) { ?>
 	<!-- telegram -->
	<a class="telegram" title="<?php echo ot_get_option('teleg_text1'); ?>" href="<?php echo ot_get_option('teleg_url'); ?>" target="_blank"><h4><?php echo ot_get_option('teleg_text1'); ?></h4><p><?php echo ot_get_option('teleg_text2'); ?></p> </a>	
	<?php } ?>	
	<?php dynamic_sidebar( 'sidebar_right' ); ?>
 	</aside>