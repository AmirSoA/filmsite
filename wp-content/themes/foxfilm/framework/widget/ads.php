<?php
class wp_widget_need_software extends WP_Widget {

function __construct() {
parent::__construct(
// آی دی ابزارک
'wp_widget_need_software', 
 
// نام ابزارک
__('نرم افزار های مورد نیاز - سایدبار', ''), 
 
// توضیحات ابزارک
array( 'description' => __( 'سفارش سازی', '' ), )
);
}
 
// مجموعه دستورات ابزارک
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
	?>
<!-- need softwar -->
		<div class="box needsoftwar">
						<div class="title"><h4><?php echo ot_get_option('need_softwar_title'); ?></h4></div>
						<ul>
						<?php 
if ( function_exists( 'ot_get_option' ) ) {

  /* get the slider array */
  $slides = ot_get_option( 'need_softwar', array() );
  if ( ! empty( $slides ) ) {
    foreach( $slides as $slide ) {
      echo '
	  <li><a href="'.$slide['ns_url'].'">'.$slide['ns_name'].'<i>دانلود</i></a></li>
      ';
    }
  }

 }
?>
						</ul>
					</div>
 <?php
}
 
// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'نرم افزار های مورد نیاز', 'wp_widget_domain_post' );
}
// فرم ابزارک
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'عنوان:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
ابزارک را در تنظیمات قالب مدیریت کنید
</p>
<?php
}
 
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wps_widget ends here
 
// ثبت ابزارک
function wp_load_wp_widget_need_software() {
    register_widget( 'wp_widget_need_software' );
}
add_action( 'widgets_init', 'wp_load_wp_widget_need_software' );
?>