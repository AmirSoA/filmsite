<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title(''); ?> - <?php bloginfo('name');?></title>
<meta name="description" content="<?php bloginfo('description');?>">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if (!empty(ot_get_option('favicon'))) { ?><link href="<?php echo ot_get_option( 'favicon'); ?>" rel="shortcut icon"> <?php } ?>
<?php wp_head(); ?>
<?php

if ( function_exists( 'ot_get_option' ) && $css_value = ot_get_option( 'custom_css' ) ) // name of field

{ ?>
<style type="text/css">
<?php echo $css_value; ?>
</style>
<?php } ?>
</head>
<body>
<!-- top-bar -->
<div class="top-bar">
<!-- fixed -->
	<div class="fixed">
	<!-- right -->
		<div class="menu_top">
			<?php wp_nav_menu( array( 'theme_location' => 'main_menu','menu_class' => '','container' => '' ) ); ?>
		</div>
	<?php if ( ot_get_option('social_top') != "off" ) { ?>
		<!-- left -->
		<!-- social -->
		<div class="socials"><div class="title">شبکه های اجتماعی</div>
		 <ul class="social">
		 <?php
if ( function_exists( 'ot_get_option' ) ) {

  /* get the slider array */
  $slides = ot_get_option( 'social_top_item', array() );
  if ( ! empty( $slides ) ) {
    foreach( $slides as $slide ) {
      echo '
	  <li><a href="'.$slide['so_url'].'" rel="nofollow" title="'.$slide['so_name'].'">'.$slide['so_name'].'</a></li>
      ';
    }
  }

 }
?>
		 </ul>
		</div>
	<?php } ?>
</div>
 </div>
 			<?php if ( ot_get_option('newsletter') != "off" ) { ?>
			<!-- newsletter -->
			<div class="newsletter">
			<div class="fixed">
			<div class="title">اطلاعیه ها</div>
		<div class="content" id="js-ticker-roll">
		<ul>
<?php
if ( function_exists( 'ot_get_option' ) ) {

  /* get the slider array */
  $slides = ot_get_option( 'newsletter_item', array() );
  if ( ! empty( $slides ) ) {
    foreach( $slides as $slide ) {
      echo '
	  <li>'.$slide['newsletter_item_content'].'</li>
      ';
    }
  }

 }
?>
		</ul>
	</div>
	</div>
			</div>
			<?php } ?>
<div class="menu_wrapper" style="height:80px;float: right;width: 100%;margin-bottom: 15px;">
	 <!-- menu -->
	 <div class="menu" id="menu">
	 <div class="fixed">
	 <!-- menu mobile -->
<div class="menu-hide" id="style-1">
<span class="welcome">به وب سایت ما خوش آمدید</span>
<nav>
<?php wp_nav_menu( array( 'theme_location' => 'cat_menu','menu_class' => '' ) ); ?>
<?php wp_nav_menu( array( 'theme_location' => 'main_menu','menu_class' => '' ) ); ?>
</nav>

</div>
	<!-- icon menu mobile -->
	<div class="menu-tab">
    <div id="one"></div>
    <div id="two"></div>
    <div id="three"></div>
     </div>
	<!--logo-->
 	<div class="logo">
       <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo ot_get_option( 'logo'); ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo ot_get_option( 'l_width'); ?>" height="<?php echo ot_get_option( 'l_height'); ?>" /></a>
	</div>
	 	 <!-- category -->
	 	<div class="category">
			<div class="wp-title">
			<h1><?php if(is_home()){ bloginfo('name');}else{ wp_title(''); } ?></h1>
			</div>
<?php wp_nav_menu( array( 'theme_location' => 'cat_menu','menu_class' => '' ) ); ?>
	 	</div>
		<?php if ( ot_get_option('search_top') != "off" ) { ?>
	 	<!-- search -->
	 	<div class="search">
	 	<a href="#0" class="icon_search"></a>

<div class="cd-popup" role="alert">
<div class="cd-popup-container">

<form role="search" method="get" class="form" action="<?php echo home_url( '/' ); ?>">
        <input type="search" class="text"
            placeholder="<?php echo esc_attr_x( 'نام فیلم یا سریال مورد نظر را وارد کنید', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    <button type="submit" class="submit"
        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>">جستجو</button>
</form>
<a href="#" class="close_search"></a>
</div>
</div>
 	</div>
		<?php } ?>
	 	</div>
	 </div>
</div>
