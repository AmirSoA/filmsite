				<!-- sidebar 2 -->
				<aside class="side_left">
				<?php dynamic_sidebar( 'sidebar_left' ); ?>
				<!-- ads text -->
				<div class="adstext">
                 <ul>
<?php 
if ( function_exists( 'ot_get_option' ) ) {

  /* get the slider array */
  $slides = ot_get_option( 'ads_text', array() );
  if ( ! empty( $slides ) ) {
    foreach( $slides as $slide ) {
      echo '
	  <li><a href="'.$slide['at_url'].'">'.$slide['at_name'].'</a></li>
      ';
    }
  }

 }
?>
				 </ul>
				</div>
				</aside>