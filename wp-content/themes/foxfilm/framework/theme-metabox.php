<?php
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $my_meta_box = array(
    'id'          => 'demo_meta_box',
    'title'       => __( 'تنظیمات قالب ژیمیت', 'theme-text-domain' ),
    'desc'        => '',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
	array(
        'label'       => __( 'مشخصات فیلم', 'theme-text-domain' ),
        'id'          => 'moshakhas',
        'type'        => 'tab'
      ),
		array(
        'id'          => 'kifiat',
        'label'       => __( 'کیفیت', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'std'         => 'در دسترس نیست!',
        'type'        => 'text',
        ),
		array(
        'id'          => 'zirnvis',
        'label'       => __( 'زیر نویس', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'std'         => 'در دسترس نیست!',
        'type'        => 'text',
        ),
		array(
        'id'          => 'formatt',
        'label'       => __( 'فرمت', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'std'         => 'در دسترس نیست!',
        'type'        => 'text',
        ),
		array(
        'id'          => 'hajm',
        'label'       => __( 'حجم', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'std'         => 'در دسترس نیست!',
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_Actors',
        'label'       => __( 'بازیگران', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_Awards',
        'label'       => __( 'جوایز', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_BoxOffice',
        'label'       => __( 'باکس آفیس', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_Country',
        'label'       => __( 'کشور', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_DVD',
        'label'       => __( 'DVD', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_Director',
        'label'       => __( 'کارگردان', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_Genre',
        'label'       => __( 'ژانر', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_Language',
        'label'       => __( 'زبان', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_Metascore',
        'label'       => __( 'متاکریتیک', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_Plot',
        'label'       => __( 'خلاصه داستان', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_PlotFA',
        'label'       => __( 'خلاصه داستان فارسی', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_Poster',
        'label'       => __( 'پوستر', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_Released',
        'label'       => __( 'تاریخ اکران', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_Runtime',
        'label'       => __( 'مدت زمان', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_Title',
        'label'       => __( 'نام', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_Type',
        'label'       => __( 'Type', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_Writer',
        'label'       => __( 'نویسنده', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_Year',
        'label'       => __( 'سال ساخت', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_imdbID',
        'label'       => __( 'آی دی ای ام دی بی', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_imdbRating',
        'label'       => __( 'امتیاز', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'id'          => 'imdb_imdbVotes',
        'label'       => __( 'تعداد رای ها', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'type'        => 'text',
        ),
		array(
        'label'       => __( 'لینک های دانلود', 'theme-text-domain' ),
        'id'          => 'links',
        'type'        => 'tab'
      ),
	  array(
        'id'          => 'links_single',
        'label'       => __( 'لینک دانلود', 'theme-text-domain' ),
        'desc'        => __( 'شما می توانید لینک فایل زیر نویس ، تریلر ، انواع فرمت را بسازید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'links_single_url',
            'label'       => __( 'لینک شما', 'theme-text-domain' ),
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
            'id'          => 'links_single_name',
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
		'id'          => 'trailer_video',
		'label'       => __( 'لینک تریلر', 'theme-text-domain' ),
		'desc'        => 'فقط mp4',
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
		'id'          => 'trailer_video_img',
		'label'       => __( 'لینک تصویر پس زمینه ویدئو', 'theme-text-domain' ),
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
        'label'       => __( 'نوع', 'theme-text-domain' ),
        'id'          => 'noea',
        'type'        => 'tab'
      ),
	  array(
        'id'          => 'style',
        'label'       => __( 'نوع فیلم خود را انتخاب کنید', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'radio',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'style_1',
            'label'       => __( 'فیلم سینمایی', 'theme-text-domain' ),
            'src'         => ''
          ),
          array(
            'value'       => 'style_2',
            'label'       => __( 'سریال', 'theme-text-domain' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'style_3',
            'label'       => __( 'بزودی...', 'theme-text-domain' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'style_4',
            'label'       => __( 'مستند', 'theme-text-domain' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'style_5',
            'label'       => __( 'انیمیشن', 'theme-text-domain' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'style_6',
            'label'       => __( 'فیلم کوتاه', 'theme-text-domain' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'style_7',
            'label'       => __( 'اخبار سینمایی', 'theme-text-domain' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'style_8',
            'label'       => __( 'فیلم ایرانی', 'theme-text-domain' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'style_9',
            'label'       => __( 'سینمای ایران', 'theme-text-domain' ),
            'src'         => ''
          ),
        )
      ),
      array(
        'id'          => 'special_post',
        'label'       => __( 'پست ویژه', 'theme-text-domain' ),
        'desc'        => __( '', 'theme-text-domain' ),
        'std'         => 'off',
        'type'        => 'on-off',
      ),
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $my_meta_box );

}