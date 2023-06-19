<?php
class wp_widget_post_views_footer extends WP_Widget {

function __construct() {
parent::__construct(
// آی دی ابزارک
'wp_widget_post_views_footer', 
 
// نام ابزارک
__('نوشته های تازه - فوتر', ''), 
 
// توضیحات ابزارک
array( 'description' => __( 'سفارش سازی', '' ), )
);
}
 
// مجموعه دستورات ابزارک
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
$show_number = apply_filters( 'widget_show_number', $instance['show_number'] );
if (!$cats = $instance["cats"]){$cats = '';}
	?>
	 	<!-- trailer -->
	 	<div class="box trailer"><div class="title"><h4><?php echo $title ?></h4></div>
	 	<ol>
                  <?php
                  $args = array(
				      "cat" => $cats,
                      "posts_per_page"  => $show_number,
                      "orderby" =>  "rand",
                      "order"   =>  "Desc",
                  );
                  $my_query = new WP_Query($args);
                  if($my_query->have_posts()) {
                      while($my_query->have_posts()) {
                          $my_query->the_post();
                          ?>
<li>
<a alt="<?php the_title(); ?>" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
<?php the_title(); ?>
</a>
</li>
                          <?php
                      } // end while(have_posts)
                  } // end if(have_posts)
                  wp_reset_postdata();
                  ?>
	 	</ol>
	 	</div>
 <?php
}
 
// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'نوشته های تازه', 'wp_widget_domain_post' );
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
<label for="<?php echo $this->get_field_id( 'show_number' ); ?>"><?php _e( 'تعداد نوشته ها' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'show_number' ); ?>" name="<?php echo $this->get_field_name( 'show_number' ); ?>" type="text" value="<?php echo esc_attr( $show_number ); ?>" />
</p>
         <p>
            <label for="<?php echo esc_attr($this->get_field_id('cats')); ?>"><?php esc_attr_e('دسته بندی مورد نظر را انتخاب کنید:', 'jelly_text_main');?> 
            
                <?php
                   $categories =  get_categories('hide_empty=0');
                     echo "<br/>";
                     foreach ($categories as $cat) {
                    $option = '<input type="checkbox" id="' . $this->get_field_id('cats') . '[]" name="' . $this->get_field_name('cats') . '[]"';
              
			        if (isset($instance['cats'])) {
                        foreach ($instance['cats'] as $cats) {
                            if ($cats == $cat->term_id) {
                                $option = $option . ' checked="checked"';
                            }
                        }
                    }
			  
                    $option .= ' value="' . $cat->term_id . '" />';
                    $option .= '&nbsp;';
                    $option .= $cat->cat_name;
                    $option .= '<br />';
                    echo $option;
                }
                    
                    ?>
            </label>
        </p>
<?php
}
 
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['show_number'] = ( ! empty( $new_instance['show_number'] ) ) ? strip_tags( $new_instance['show_number'] ) : '';
$instance['cats'] = $new_instance['cats'];
return $instance;
}
} // Class wps_widget ends here
 
// ثبت ابزارک
function wp_load_wp_widget_post_views_footer() {
    register_widget( 'wp_widget_post_views_footer' );
}
add_action( 'widgets_init', 'wp_load_wp_widget_post_views_footer' );
?>