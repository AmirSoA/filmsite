<?php
class wp_widget_comment_footer extends WP_Widget {

function __construct() {
parent::__construct(
// آی دی ابزارک
'wp_widget_comment_footerr', 
 
// نام ابزارک
__('دیدگاه ها - فوتر', ''), 
 
// توضیحات ابزارک
array( 'description' => __( 'سفارش سازی', '' ), )
);
}
 
// مجموعه دستورات ابزارک
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
$show_number = apply_filters( 'widget_show_number', $instance['show_number'] );
	?>
	 	<!-- comments -->
	 	<div class="box comment"><div class="title"><h4><?php echo $title ?></h4></div>
	 		<ul>
		<?php
$comments = get_comments(array('number'=>$show_number));
foreach ($comments as $comment) {

?>
<li>
<a href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo $comment->comment_ID; ?>">
<span><?php echo strip_tags($comment->comment_author); ?></span>: <?php echo strip_tags($comment->comment_content); ?>
</a>
<div class="clear"></div>
</li>
<?php
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
$title = __( 'دیدگاه ها', 'wp_widget_domain_post' );
}
if ( isset( $instance[ 'show_number' ] ) ) {
$show_number = $instance[ 'show_number' ];
}
else {
$show_number = __( '5', 'wp_widget_domain_pots' );
}
// فرم ابزارک
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'عنوان:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'show_number' ); ?>"><?php _e( 'تعداد نظرات' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'show_number' ); ?>" name="<?php echo $this->get_field_name( 'show_number' ); ?>" type="text" value="<?php echo esc_attr( $show_number ); ?>" />
</p>
<?php
}
 
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['show_number'] = ( ! empty( $new_instance['show_number'] ) ) ? strip_tags( $new_instance['show_number'] ) : '';
return $instance;
}
} // Class wps_widget ends here
 
// ثبت ابزارک
function wp_load_wp_widget_comment_footer() {
    register_widget( 'wp_widget_comment_footer' );
}
add_action( 'widgets_init', 'wp_load_wp_widget_comment_footer' );
?>