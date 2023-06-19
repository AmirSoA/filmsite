<?php get_header(); ?>
	 <!-- fixed -->
	 <div class="fixed">
<?php if ( ot_get_option('slider_one_home') != "off" ) { ?>
<?php get_template_part('framework/parts/slider'); ?>
<?php } ?>
<?php if ( ot_get_option('slider_two_home') != "off" ) { ?>
<?php get_template_part('framework/parts/special_vidoe'); ?>
<?php } ?>
 	 <!-- content -->
 	<div class="page_body">
 	<main class="side_right">
         <!--archive-->
         <div class="pagearchive">
         <!--Your search for ....-->
         <div class="pagesearch">
         	<div class="title">
         		<h2>شما برای <?php printf(the_search_query());?> جستجو کردید.
				</h2>
         	</div>
         	<div class="box">
				 <form method="get" action="<?php bloginfo('url');?>"><input type="text" value="" placeholder="یک جستجوی دیگر انجام دهید + اینتر بزنید" name="s"></form>
         	</div>
         </div>
         </div>
          <!--box post-->
          <div class="boxpost">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<!-- item -->
<div class="item">
	<!-- title -->
	<div class="title">
		<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
		<div class="style">
			<?php $stylee = get_post_meta($post->ID, 'style', true);

	switch ($stylee) {
	
	case 'style_1':
        echo ('<span>سینمایی</span>');
		
        break;
		
	case 'style_2':
        echo ('<span>سریال</span>');
		
        break;
	case 'style_3':
        echo ('<span>بزودی</span>');
		
        break;
	case 'style_4':
        echo ('<span>مستند</span>');
		
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
		<div class="info">
			<span class="views"><?php echo getPostViews(get_the_ID()); ?></span>
			<span class="date"><?php the_time('j F  Y'); ?></span>
			<span class="author"><?php the_author(); ?></span>
			<span class="comment"><?php comments_number(); ?></span>
			<span class="category"><?php the_category(', '); ?></span>
		</div>
	</div>
	<!--content-->
	<div class="text">
<?php the_content(""); ?>
	</div>
	<a href="<?php the_permalink(); ?>" title="ادامه ..." class="more">ادامه نوشته</a>
</div>

<?php endwhile; else : get_search_form(); endif; ?>
			          </div>
				<!-- page number -->
		<div class="pagenavi">
<?php wp_pagination(); ?>
				</div>
				</main>
		<?php get_sidebar( 'left' ); ?>
			</div>
		<?php get_sidebar( 'right' ); ?>
	 	</div>
<?php get_footer(); ?>