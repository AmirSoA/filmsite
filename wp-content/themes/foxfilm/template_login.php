<?php /* Template Name: صفحه ورود */?>
<?php get_header(); ?>
<div class="login_form">
<div class="form-style form">
<form name="loginform" id="loginform" action="<?php bloginfo('url'); ?>/wp-login.php" method="post">
<?php if ( is_user_logged_in()  ) { ?>
درود به تو <?php global $current_user;get_currentuserinfo();echo '' . $current_user->user_login . "\n";?>
<?php
} else { ?>
<?php } ?>
<?php
if ( is_user_logged_in()  ) {
?>
<div class="console">
<a rel="nofollow" class="user_url" href="<?php the_author_meta('user_url'); ?>" target="_blank" title="<?php the_author_meta('nickname'); ?>"><?php echo get_avatar( get_the_author_email(), '60' ); ?></a>
<li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php">وقت انتشار یه مطلب خوبه!!!</a></li>
<li><a href="<?php bloginfo('url') ?>/wp-admin">ناحیه ی کاربری</a></li>
<li><a href="<?php bloginfo('url') ?>/wp-admin/profile.php">پروفایل شما</a></li>
<li><a href="<?php echo wp_logout_url( home_url() ); ?>" title="خروج">خروج</a></li>
</div>
<?php
} else {
?>
<h2>ورود به پنل کاربری</h2>
<input type="text" name="log" id="user_login" tabindex="1" placeholder="نام کاربری">
<input type="password" name="pwd" id="user_pass" tabindex="2" placeholder="رمز عبور">
<button type="submit" name="wp-submit" tabindex="3">ورود به سایت</button>
</form>
<div class="bottom">
<a href="<?php bloginfo('url'); ?>/wp-login.php?action=lostpassword">بازیابی کلمه عبور</a>
<a class="reg" href="<?php bloginfo('url'); ?>/wp-login.php?action=register">ثبت نام</a>
</div>
<?php } ?>
</div>
</div>
<?php get_footer(); ?>