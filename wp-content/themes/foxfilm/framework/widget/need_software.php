<?php
class wp_widget_ads extends WP_Widget {

function __construct() {
parent::__construct(
// آی دی ابزارک
'wp_widget_ads', 
 
// نام ابزارک
__('تبلیغات تصویری 240- سایدبار', ''), 
 
// توضیحات ابزارک
array( 'description' => __( 'سفارش سازی', '' ), )
);
}
 
// مجموعه دستورات ابزارک
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
$url = apply_filters( 'widget_url', $instance['url'] );
$img_src = apply_filters( 'widget_img_src', $instance['img_src'] );
	?>
				<!-- ads240 -->
				
					<div class="box ads240">
						<div class="title"><h4><?php echo $title ?></h4></div>
						<a href="<?php echo $url ?>" title="تبلیغات">
						<img src="<?php echo $img_src; ?>" alt="تبلیغات">
						</a>
					</div>
 <?php
}
 
// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'تبلیغات', 'wp_widget_domain_post' );
}
if ( isset( $instance[ 'url' ] ) ) {
$url = $instance[ 'url' ];
}
if ( isset( $instance[ 'img_src' ] ) ) {
$img_src = $instance[ 'img_src' ];
}
// فرم ابزارک
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'عنوان:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'آدرس مقصد:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'img_src' ); ?>"><?php _e( 'آدرس تصویر:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'img_src' ); ?>" name="<?php echo $this->get_field_name( 'img_src' ); ?>" type="text" value="<?php echo esc_attr( $img_src ); ?>" />
</p>
<?php
}
 
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
$instance['img_src'] = ( ! empty( $new_instance['img_src'] ) ) ? strip_tags( $new_instance['img_src'] ) : '';
return $instance;
}
} // Class wps_widget ends here
 
// ثبت ابزارک
function wp_load_wp_widget_ads() {
    register_widget( 'wp_widget_ads' );
}
add_action( 'widgets_init', 'wp_load_wp_widget_ads' );
?>