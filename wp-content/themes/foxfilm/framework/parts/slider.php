<!--main slider-->
<div class="main_slider owl-carousel">
<?php
	$list_item = ot_get_option('slider_one_home_list');

	foreach ( $list_item as $val ) {
		?>
			<div class="images" style="background-image:url(<?php echo $val['img']; ?>)">
				<div class="title">
					<h2><a href="<?php echo $val['link']; ?>" title="<?php echo $val['title']; ?>"><?php echo $val['title']; ?></a></h2>
					<div class="info">
						<a href="<?php echo $val['link']; ?>" title="<?php echo $val['title']; ?>" class="more">ادامه ...</a>
					</div>
				</div>
			</div>
		<?php
	}
?>
</div>