<?php /* Template Name: سایت مپ */?>
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
			
								<div id="sitemap">
						<div class="sitemap-col">
							<h2>برگه ها</h2>
							<ul id="sitemap-pages"><?php wp_list_pages('title_li='); ?></ul>
						</div> <!-- end .sitemap-col -->
							
						<div class="sitemap-col">
							<h2>دسته بندی ها</h2>
							<ul id="sitemap-categories"><?php wp_list_categories('title_li='); ?></ul>
						</div> <!-- end .sitemap-col -->
							
						<div class="sitemap-col">
							<h2>برچسب ها</h2>
							<ul id="sitemap-tags">
								<?php $tags = get_tags();
								if ($tags) {
									foreach ($tags as $tag) {
										echo '<li><a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li> ';
									}
								} ?>
							</ul>
						</div> <!-- end .sitemap-col -->
														
						<div class="sitemap-col<?php echo ' last'; ?>">
							<h2>نویسنده ها</h2>
							<ul id="sitemap-authors" ><?php wp_list_authors('optioncount=1&exclude_admin=0'); ?></ul>
						</div> <!-- end .sitemap-col -->
					
					</div> <!-- end #sitemap -->
            
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