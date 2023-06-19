<?php
class wp_widget_feedburner extends WP_Widget {

function __construct() {
parent::__construct(
// آی دی ابزارک
'wp_widget_feedburner', 
 
// نام ابزارک
__('فیدبارنر - سایدبار', ''), 
 
// توضیحات ابزارک
array( 'description' => __( 'سفارش سازی', '' ), )
);
}
 
// مجموعه دستورات ابزارک
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
	?>
 		<!-- box newsletter -->
 		<div class="newswid"><div class="ti"><h5><?php echo ot_get_option('widget_feed'); ?></h5><span><?php echo ot_get_option('widget_feed_text'); ?></span></div>
 		<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo ot_get_option('widget_feed_url'); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
		<input type="text"  value="آدرس ایمیل شما" onblur="if(this.value=='') this.value='آدرس ایمیل شما';" onfocus="if(this.value=='آدرس ایمیل شما') this.value='';" name="email"/>
		<input type="hidden" name="uri" value="<?php echo ot_get_option('widget_feed_url'); ?>">
		<input type="hidden" name="loc" value="en_US"/>
 		<button type="submit">عضویت در خبرنامه</button>
		</form>
 		</div>
 <?php
}
 
// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'فیدبارنر', 'wp_widget_domain_post' );
}
// فرم ابزارک
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'عنوان:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
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
function wp_load_wp_widget_feedburner() {
    register_widget( 'wp_widget_feedburner' );
}
add_action( 'widgets_init', 'wp_load_wp_widget_feedburner' );
?>