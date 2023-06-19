<?php


// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">این مطلب خصوصی است.در صورتی که رمز آن را دارید در قسمت زیر وارد کنید.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<div id="comment">
<?php if ( have_comments() ) : ?>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<ol class="commentlist">
	<?php wp_list_comments("callback=zhimit_comment"); ?>

	</ol>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">نظرات بسته شده است.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond" class="comment-respond">

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>شما باید <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">وارد سایت شوید</a> تا بتوانید نظر دهید.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p class="logcom">وارد شده به نام <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">خروج &raquo;</a></p>

<?php else : ?>
<div class="right">
<input class="author-name" type="text" name="author" id="author" placeholder="نام شما (الزامی)" tabindex="4">
<input class="email-name" type="text" name="email" id="email" placeholder="ایمیل شما (الزامی)" tabindex="5">
<input class="link-name" type="text" name="url" id="url" placeholder="سایت شما" tabindex="6">
</div>
<?php endif; ?>


<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="7" placeholder="نظر خود را بنویسید ..." ></textarea>

<button name="submit" type="submit" id="submit" tabindex="8" value=>ارسال نظر</button>
<?php cancel_comment_reply_link('لغو پاسخ گویی'); ?>


<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
</div>