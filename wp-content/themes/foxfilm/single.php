<?php get_header(); ?>
	 <!-- fixed -->
	 <div class="fixed">
 	 <!-- page body -->
 	<div class="page_body">
 	<!-- side right -->
 	<main class="side_right">
    <?php
    if(have_posts()) {
        while(have_posts()){
            the_post();
    ?>
<?php setPostViews(get_the_ID()); ?>
 		<!-- breadcrumbs -->
			<div class="breadcrumbs"><div class="con">
<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			</div></div>
	<!-- single-content -->
			<div class="posts">
			<div class="content">
	<!-- title -->
			<div class="title"><h2><?php the_title(); ?></h2>
              	<!--sabk-->
		<div class="style">
			<?php $stylee = get_post_meta($post->ID, 'style', true);

	switch ($stylee) {
	
	case 'style_1':
        echo ('<span>فیلم سینمایی</span>');
		
        break;
		
	case 'style_2':
        echo ('<span>سریال</span>');
		
        break;
	case 'style_3':
        echo ('<span>بزودی...</span>');
		
        break;
	case 'style_4':
        echo ('<span>مستند</span>');
		
        break;
	case 'style_5':
        echo ('<span>انیمیشن</span>');
		
        break;
	case 'style_6':
        echo ('<span>فیلم کوتاه</span>');
		
        break;
	case 'style_7':
        echo ('<span>اخبار سینمایی</span>');
		
        break;
	case 'style_8':
        echo ('<span>فیلم ایرانی</span>');
		
        break;
	case 'style_9':
        echo ('<span>سینمای ایران</span>');
		
        break;
		
	default:
         
}
?>
<?php if(get_post_meta($post->ID,'special_post',true) == 'on') { ?>
			<i class="special">
			<div class="content">فیلم ویژه</div>
			</i>
<?php } ?>
		</div>
     <!-- info icon -->
			<div class="info">
				<span class="views"><?php echo getPostViews(get_the_ID()); ?></span>
				<span class="date"><?php the_time('j F  Y'); ?></span>
				<span class="author"><?php the_author(); ?></span>
				<span class="comment"><?php comments_number(); ?></span>
				<span class="category"><?php the_category(', '); ?></span>
			</div>
			</div>
			<!-- text -->
			<div class="text">
            <?php the_content(); ?>
			<?php
				$trailer = get_post_meta($post->ID, 'trailer_video', true);
			if( !empty($trailer) ) { ?>
  <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="100%" height="400"
      poster="<?php echo get_post_meta($post->ID, 'trailer_video_img', true); ?>"
      data-setup="{}">
    <source src="<?php echo get_post_meta($post->ID, 'trailer_video', true); ?>" type='video/mp4' />
    <p class="vjs-no-js">فکر کنم مرورگر شما دیگه فسیل شده لطفا از مرورگر دیگری استفاده کنید<a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
  </video>
			<?php } ?>
			</div>
<!-- downloads -->
<div class="downloads">

<?php $variable = get_post_meta($post->ID, 'links_single', true); ?>
<?php
if ( !empty( $variable ) ) {
echo '<ul>';
foreach( $variable as $any_name ) {
echo '<li><a href="'.$any_name['links_single_url'].'">دانلود فایل</a><span>'.$any_name['links_single_name'].'</span></li>';
}
echo '</ul>';
}
?>

				
			</div>
			<!-- shortlink -->
			<div class="shortlink">
			<span>لینک کوتاه :</span>
				<textarea onclick="javascript:this.select();" readonly><?php echo wp_get_shortlink(); ?></textarea>
			</div>
			<!-- rating -->
			<div class="rating">
				<span class="textt">امتیاز خود را ثبت کنید :</span>
                <?php if(function_exists("kk_star_ratings")) : echo kk_star_ratings(); endif; ?>
			</div>
			</div>
			</div>
			<!-- share -->
			<div class="share">
				<span>اشتراک گذاری کنید :</span>
			<div class="icons">
				<div class="iconshare">
					<a class="twitter" rel="nofollow" href="http://twitter.com/home?status=<?php the_permalink(); ?>">توییتر</a>
					<a class="facebook" rel="nofollow" href="http://www.facebook.com/share.php?v=4&src=bm&u=<?php the_permalink(); ?>">فیس بوک</a>
					<a class="googleplus" rel="nofollow" href="http://plus.google.com/share?url=<?php the_permalink(); ?>">گوگل پلاس</a>
					<a class="teleg" rel="nofollow" href="http://telegram.me/share/?url=<?php the_permalink(); ?>">تلگرام</a>
				</div>
			</div>
			</div>
			<!-- related -->
			<div class="related">
				<div class="title">مطالب بیشتر :</div>
				<ul>
				<?php
                $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 6, 'post__not_in' => array($post->ID) ) );
                if( $related ) foreach( $related as $post ) {
                    setup_postdata($post); ?>
					<li>
					<figure class="thumbnail"><?php the_post_thumbnail('related'); ?></figure>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<span><?php the_time('j F  Y'); ?></span>
						<span><?php echo getPostViews(get_the_ID()); ?></span>
					</li>
                <?php }
                wp_reset_postdata(); ?>
				</ul>
			</div>
			<!-- tag -->
			<div class="tag">
				<div class="title">برچسب ها</div>
<?php the_tags( '' ); ?>
			</div>
			<!-- comments -->
			<div class="comments">
				<?php comments_template(); ?>
			</div>
      <?php
        } // end while
      } // end if
      ?>
				</main>
    <?php get_sidebar( 'left' ); ?>
 	</div>
 	<?php get_sidebar( 'right' ); ?>
</div>
<?php get_footer(); ?>