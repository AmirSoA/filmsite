<?php
/**
 * Initialize the custom Theme Options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function custom_theme_options() {

  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;

  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'content'       => array( 
        array(
          'id'        => 'option_types_help',
          'title'     => __( 'راهنما', 'theme-text-domain' ),
          'content'   => '<p>' . __( 'اگر کمک یا سوالی داشتید از طریق ایمیل با ما تماس بر قرار کنید :MohammadRahmati.0098@gmail.com', 'theme-text-domain' ) . '</p>'
        )
      ),
      'sidebar'       => '<p>' . __( 'شماره مخصوص تلگرامی ها :09339247533', 'theme-text-domain' ) . '</p>'
    ),
    'sections'        => array(
        array(
        'id'          => 'general',
        'title'       => __( 'تنظیمات کلی', 'theme-text-domain' )
        ),
        array(
        'id'          => 'header',
        'title'       => __( 'سربرگ', 'theme-text-domain' )
        ),
		array(
        'id'          => 'sliders',
        'title'       => __( 'اسلایدر ها', 'theme-text-domain' )
        ),
		array(
        'id'          => 'sidebars',
        'title'       => __( 'سایدبار ها', 'theme-text-domain' )
        ),
		array(
        'id'          => 'footer',
        'title'       => __( 'پانوشت', 'theme-text-domain' )
        ),
    ),
    'settings'        => array(
        array(
        'id'          => 'favicon',
        'label'       => __( 'فاوآیکون', 'theme-text-domain' ),
        'desc'        => sprintf( __( '', 'theme-text-domain' ), apply_filters( 'ot_upload_text', __( 'گزینش', 'theme-text-domain' ) ), 'FTP' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	        array(
        'id'          => 'custom_css',
        'label'       => __( 'سی اس اس سفارشی', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'css',
        'section'     => 'general',
        'rows'        => '20',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	        array(
        'id'          => 'custom_js',
        'label'       => __( 'جاوا اسکریپت سفارشی', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'javascript',
        'section'     => 'general',
        'rows'        => '20',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'logo',
        'label'       => __( 'لوگو', 'theme-text-domain' ),
        'desc'        => sprintf( __( '', 'theme-text-domain' ), apply_filters( 'ot_upload_text', __( 'گزینش', 'theme-text-domain' ) ), 'FTP' ),
        'std'         => get_template_directory_uri(). '/images/logo.png',
        'type'        => 'upload',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'l_width',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( 'عرض', 'theme-text-domain' ),
        'std'         => '105',
        'type'        => 'text',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'l_height',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( 'ارتفاع', 'theme-text-domain' ),
        'std'         => '121',
        'type'        => 'text',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'day_time',
        'label'       => __( 'منوبار بالا', 'theme-text-domain' ),
        'desc'        => __( 'نمایش تاریخ و ساعت روز', 'theme-text-domain' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'newsletter',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( 'اطلاعیه ها', 'theme-text-domain' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'newsletter_item',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'newsletter:is(on)',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'newsletter_item_content',
            'label'       => __( 'متن', 'theme-text-domain' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'textarea-simple',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
	  array(
        'id'          => 'social_top',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( 'شبکه های اجتماعی', 'theme-text-domain' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'social_top_item',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'social_top:is(on)',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'so_url',
            'label'       => __( 'لینک', 'theme-text-domain' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
         array(
            'id'          => 'so_name',
            'label'       => __( 'نام شبکه اجتماعی', 'theme-text-domain' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
	  array(
        'id'          => 'search_top',
        'label'       => __( 'منوبار اصلی', 'theme-text-domain' ),
        'desc'        => __( 'آیکون جست و جو', 'theme-text-domain' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'slider_one_home',
        'label'       => __( 'اسلایدر اول صفحه اصلی', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'sliders',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'slider_one_home_list',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'sliders',
        'condition'   => 'slider_one_home:is(on)',
        'operator'    => 'and',
        'settings'    => array( 
         array(
            'id'          => 'img',
            'label'       => __( 'لینک تصویر', 'theme-text-domain' ),
            'desc'        => 'ارتفاع : 400 - عرض : 1200 پیکسل',
            'std'         => '',
            'type'        => 'text',
            'operator'    => 'and'
          ),
		  array(
            'id'          => 'link',
            'label'       => __( 'لینک نوشته', 'theme-text-domain' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'operator'    => 'and'
          )
        )
      ),
	  array(
        'id'          => 'slider_two_home',
        'label'       => __( 'اسلایدر مطالب ویژه', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'sliders',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'number_sl_two',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( 'تعداد نوشته ها', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'sliders',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'slider_two_home:is(on)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'title_sl_two',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( 'عنوان جعبه', 'theme-text-domain' ),
        'std'         => 'فیلم و سریال های ویژه',
        'type'        => 'text',
        'section'     => 'sliders',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'slider_two_home:is(on)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'atminan',
        'label'       => __( 'تنظیمات سایدبار سمت راست', 'theme-text-domain' ),
        'desc'        => __( 'جعبه اطمینان', 'theme-text-domain' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'atminan_text1',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( 'عنوان', 'theme-text-domain' ),
        'std'         => 'اطمینان',
        'type'        => 'text',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'atminan:is(on)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'atminan_text2',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( 'متن', 'theme-text-domain' ),
        'std'         => 'محتویات این سایت مطابق قوانین جمهوری اسلامی ایران می باشد.',
        'type'        => 'text',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'atminan:is(on)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'atminan_url',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( 'لینک مقصد', 'theme-text-domain' ),
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'atminan:is(on)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'teleg',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( 'جعبه تلگرام', 'theme-text-domain' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'teleg_text1',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( 'عنوان', 'theme-text-domain' ),
        'std'         => 'کانال تلگرام',
        'type'        => 'text',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'teleg:is(on)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'teleg_text2',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( 'متن', 'theme-text-domain' ),
        'std'         => 'آخرین اخبار سایت را در کانال تلگرامی ما بررسی کنید.',
        'type'        => 'text',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'teleg:is(on)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'teleg_url',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( 'لینک مقصد', 'theme-text-domain' ),
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'teleg:is(on)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'widget_feed',
        'label'       => __( 'ابزارک خبرنامه', 'theme-text-domain' ),
        'desc'        => __( 'عنوان', 'theme-text-domain' ),
        'std'         => 'خبرنامه',
        'type'        => 'text',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'widget_feed_text',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( 'توضیح', 'theme-text-domain' ),
        'std'         => 'جدید ترین فیلم های سایت در ایمیل شما',
        'type'        => 'text',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'widget_feed_url',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( 'لینک شما', 'theme-text-domain' ),
        'std'         => 'مثال: mamad/dxcs',
        'type'        => 'text',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'need_softwar_title',
        'label'       => __( 'ابزارک نرم افزار های مورد نیاز', 'theme-text-domain' ),
        'desc'        => __( 'عنوان', 'theme-text-domain' ),
        'std'         => 'عنوان جدید',
        'type'        => 'text',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'need_softwar',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'ns_url',
            'label'       => __( 'لینک', 'theme-text-domain' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
         array(
            'id'          => 'ns_name',
            'label'       => __( 'نام نرم افزار', 'theme-text-domain' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
	  array(
        'id'          => 'ads_text',
        'label'       => __( 'تبلیغات متنی', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'at_url',
            'label'       => __( 'لینک', 'theme-text-domain' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
         array(
            'id'          => 'at_name',
            'label'       => __( 'متن', 'theme-text-domain' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
	  array(
        'id'          => 'tags_footer',
        'label'       => __( 'ابر بر چسب در فوتر', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'tags_number',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( 'تعداد', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'tags_footer:is(on)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'menu_footer',
        'label'       => __( 'ابزارک لینک های مفید', 'theme-text-domain' ),
        'desc'        => __( 'عنوان خود را وارد کنید - برای ویرایش لینک ها به بخش فهرست بروید', 'theme-text-domain' ),
        'std'         => 'عنوان جدید',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'copyright',
        'label'       => __( 'متن کپی رایت', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'std'         => 'تمام حقوق از قبیل محتوا و قالب متعلق به این وب سایت بوده و هر گونه کپی برداری از آن پیگرد قانونی دارد.',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
  ) 
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}