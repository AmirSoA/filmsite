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
         <!--404-->
         <div class="ops404">
         	<div class="title">
         		<h2>مطلب مورد نظر شما یافت نشد</h2><span class="abcd">404</span>
         	</div>
         	<div class="box">
         		<h3>فیلم مورد نظر شما</h3>
         		<h5>یا</h5>
         		<h3>وجود ندارد</h3>
         		<h5>یا</h5>
         		<h3>حذف شده است</h3>
         		<h4 class="inf">نگاهی هم به اینجا بیندازید</h4>
         		<!-- related -->
			<div class="related" style="box-shadow: 0 0 0 rgba(0,0,0,0)">
				<ul>
					<?php $recent = new WP_Query("orderby=rand&showposts=6"); while($recent->have_posts()) : $recent->the_post();?>
					<li>
					<figure class="thumbnail"><?php the_post_thumbnail('related'); ?></figure>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<span><?php the_time('j F  Y'); ?></span>
						<span><?php echo getPostViews(get_the_ID()); ?></span>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
         	</div>
         </div>
				</main>
		<?php get_sidebar( 'left' ); ?>
			</div>
		<?php get_sidebar( 'right' ); ?>
	 	</div>
<?php get_footer(); ?>