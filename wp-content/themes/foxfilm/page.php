<?php get_header(); ?>
	 <!-- fixed -->
	 <div class="fixed">
 	 <!-- page body -->
 	<div class="page_body">
 	<!-- side right -->
 	<main class="side_right">
 	<?php
if ( have_posts() ) {
while ( have_posts() ) {
the_post(); ?>
 		<!-- breadcrumbs -->
			<div class="breadcrumbs"><div class="con">
<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			</div></div>
	<!-- single-content -->
			<div class="posts">
			<div class="pagecontent">
	<!-- title -->
			<div class="title"><h2><?php the_title(); ?></h2>
			</div>
			<!-- text -->
			<div class="pagetext">
            <?php the_content(); ?>
			</div>
			</div>
			</div>

<?php } // end while
} // end if
?>
				</main>
    <?php get_sidebar( 'left' ); ?>
 	</div>
 	<?php get_sidebar( 'right' ); ?>
</div>
<?php get_footer(); ?>