<!--special_video-->
<div class="special_video">
	<!--title-->
	<div class="title">
		<h3><?php echo ot_get_option('title_sl_two');?></h3>
	</div>
<div class="special_slider owl-carousel">
<?php
$number = ot_get_option('number_sl_two');
// WP_Query arguments
$args = array(
	'cat'	=> 0,
	'posts_per_page'	=>$number,
	'meta_key'   => 'special_post',
	'meta_value' => 'on',
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
?>
	<div class="item">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<img src="<?php the_post_thumbnail_url('slider');?>">
			<span><?php the_title(); ?></span>
			<i class="icon_hd"></i>
			<i class="icon_play"></i>
		</a>
	</div>
<?php
	}
} else {

$number = ot_get_option('number_sl_two');
// WP_Query arguments
$args = array(
	'post_type'	=> 'post',
	'posts_per_page'	=>$number,
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
?>
	<div class="item">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<img src="<?php the_post_thumbnail_url('slider');?>">
			<span><?php the_title(); ?></span>
			<i class="icon_hd"></i>
			<i class="icon_play"></i>
		</a>
	</div>
<?php
	}
    
}
}
// Restore original Post Data
wp_reset_postdata();
?>
</div>
</div>