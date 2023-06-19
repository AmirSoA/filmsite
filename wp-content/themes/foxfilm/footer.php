	 	<!-- footer -->
	 	<footer class="footer">
	 		<div class="fixed">
			<?php if ( ot_get_option('tags_footer') != "off" ) { ?>
	 	<!-- tags -->
	 			<div class="tags">
				<?php $numtags = ot_get_option('tags_number'); ?>
	 			<span>برچسب ها :</span>
					<?php wp_tag_cloud($args = array(
						'smallest' => 8,
						'largest'  => true,
						'number'   => $numtags,
					) )?>
	 			</div>
			<?php } ?>
			<!-- links -->
			<div class="box links"><div class="title"><h4><?php echo ot_get_option('menu_footer'); ?></h4></div>
				<?php wp_nav_menu( array( 'theme_location' => 'footer_menu','menu_class' => 'navbar' ) ); ?>
			</div>
			<?php dynamic_sidebar( 'footer' ); ?>
	 		</div>
	 		<!-- copyright -->
	 		<div class="copyright">
	 		<div class="fixed">
	 		<!-- text -->
	 		<div class="text">
			<a href="http://famo.ir/" title="طراحی قالب" target="_blank" class="famoCopyright" ><span>فامو</span></a>
	 		<span><?php echo ot_get_option('copyright'); ?></span>
			</div>
	 		<!-- go-top -->
	 		<a href="#" class="go-top"></a>
	 		</div>
	 		</div>
	 	</footer>
    <?php wp_footer(); ?>
<script>
    videojs.options.flash.swf = "video-js.swf";
</script>
<script type="text/javascript">
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}
</script>
<script type="text/javascript">
$(document).ready(function() {
$('.main_slider').owlCarousel({
	rtl: true,
	items: 1,
    loop:true,
    margin:10,
    nav:false,
	autoplay: true,
	autoplayTimeout: 4000,
	navText: false,
});
$('.special_slider').owlCarousel({
	items: 6,
	rtl: true,
    loop:false,
    margin:14,
	autoWidth: true,
});
});
</script>
<?php

if ( function_exists( 'ot_get_option' ) && $js_value = ot_get_option( 'custom_js' ) ) // name of field

{ ?>

<script type="text/javascript"><?php echo $js_value; ?></script>

<?php } ?>
	</body>
</html>
