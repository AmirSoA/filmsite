<?php
/**
 * Register a custom menu page.
 */
function getInfoImdb(){
    add_menu_page( 
        __( 'انتشار فیلم', 'textdomain' ),
        'انتشار فیلم',
        'manage_options',
        'getInfoImdb',
        'getInfoImdbPage',
        '',
        6
    ); 
}
add_action( 'admin_menu', 'getInfoImdb' );
 
/**
 * Display a custom menu page
 */
function getInfoImdbPage(){
?>
  <script>
jQuery(document).ready(function($) {
	$(document).on('click', '.btn_include', function(){
		var imdbid = $("#check-url").val();
		$('#infoback').html("صبر کنید <div class='loader'></div>").show().animate({left: '15px'});
		jQuery.ajax({
			url: '<?php echo home_url(''); ?>/wp-admin/admin-ajax.php',
			type: 'POST',
            data: {
                'action': 'my_ajax',
				'data':imdbid,
            },
            success: function( results ){
				if( results.error === true ){
					alert('ای دی فیلم مشکل دارد یا فیلم از قبل وجود دارد');
					$('#infoback').hide().html('').animate({left: '-100%'});
				}else{
					alert('success');
				}
				if(results.msg != undefined){
				    alert(results.msg);
				}
			},
			error: function(){
				alert('error');
			}
        });
	});
});
    </script>
<div class="include_data_imdb">
<label for="check-url">آی دی فیلم در imdb را برای استخراج وارد کنید</label>
<input type="text" id="check-url" value="" dir="ltr" placeholder="مثال : tt3371366" style="padding: 6px;border-radius: 3px;">
    <input type="button" class="btn_include" value="استخراج اطلاعات" style="background: #FFC107;border: 0;cursor: pointer;border-radius: 3px;font-size: 12px;padding: 8px;color: #fff;"/>
	
    <div id="loading-bar" style="display: none">
        درحال دریافت اطلاعات ، لطفا صبر کنید ...
    </div>
</div>
<style>
.sk-circle{margin:10px auto;width:40px;height:40px;position:relative}
.sk-circle .sk-child{width:100%;height:100%;position:absolute;left:0;top:0}
.sk-circle .sk-child:before{content:'';display:block;margin:0 auto;width:15%;height:15%;background-color:#333;border-radius:100%;-webkit-animation:sk-circleBounceDelay 1.2s infinite ease-in-out both;animation:sk-circleBounceDelay 1.2s infinite ease-in-out both}
.sk-circle .sk-circle2{-webkit-transform:rotate(30deg);-ms-transform:rotate(30deg);transform:rotate(30deg)}
.sk-circle .sk-circle3{-webkit-transform:rotate(60deg);-ms-transform:rotate(60deg);transform:rotate(60deg)}
.sk-circle .sk-circle4{-webkit-transform:rotate(90deg);-ms-transform:rotate(90deg);transform:rotate(90deg)}
.sk-circle .sk-circle5{-webkit-transform:rotate(120deg);-ms-transform:rotate(120deg);transform:rotate(120deg)}
.sk-circle .sk-circle6{-webkit-transform:rotate(150deg);-ms-transform:rotate(150deg);transform:rotate(150deg)}
.sk-circle .sk-circle7{-webkit-transform:rotate(180deg);-ms-transform:rotate(180deg);transform:rotate(180deg)}
.sk-circle .sk-circle8{-webkit-transform:rotate(210deg);-ms-transform:rotate(210deg);transform:rotate(210deg)}
.sk-circle .sk-circle9{-webkit-transform:rotate(240deg);-ms-transform:rotate(240deg);transform:rotate(240deg)}
.sk-circle .sk-circle10{-webkit-transform:rotate(270deg);-ms-transform:rotate(270deg);transform:rotate(270deg)}
.sk-circle .sk-circle11{-webkit-transform:rotate(300deg);-ms-transform:rotate(300deg);transform:rotate(300deg)}
.sk-circle .sk-circle12{-webkit-transform:rotate(330deg);-ms-transform:rotate(330deg);transform:rotate(330deg)}
.sk-circle .sk-circle2:before{-webkit-animation-delay:-1.1s;animation-delay:-1.1s}
.sk-circle .sk-circle3:before{-webkit-animation-delay:-1s;animation-delay:-1s}
.sk-circle .sk-circle4:before{-webkit-animation-delay:-.9s;animation-delay:-.9s}
.sk-circle .sk-circle5:before{-webkit-animation-delay:-.8s;animation-delay:-.8s}
.sk-circle .sk-circle6:before{-webkit-animation-delay:-.7s;animation-delay:-.7s}
.sk-circle .sk-circle7:before{-webkit-animation-delay:-.6s;animation-delay:-.6s}
.sk-circle .sk-circle8:before{-webkit-animation-delay:-.5s;animation-delay:-.5s}
.sk-circle .sk-circle9:before{-webkit-animation-delay:-.4s;animation-delay:-.4s}
.sk-circle .sk-circle10:before{-webkit-animation-delay:-.3s;animation-delay:-.3s}
.sk-circle .sk-circle11:before{-webkit-animation-delay:-.2s;animation-delay:-.2s}
.sk-circle .sk-circle12:before{-webkit-animation-delay:-.1s;animation-delay:-.1s}
@-webkit-keyframes sk-circleBounceDelay {
0%,80%,100%{-webkit-transform:scale(0);transform:scale(0)}
40%{-webkit-transform:scale(1);transform:scale(1)}
}
@keyframes sk-circleBounceDelay {
0%,80%,100%{-webkit-transform:scale(0);transform:scale(0)}
40%{-webkit-transform:scale(1);transform:scale(1)}
}
</style>	
<?php
}


add_action( 'wp_ajax_my_ajax', 'my_ajax' );
function my_ajax() {

	$id = isset($_POST['data']) ? $_POST['data'] : die;
	$id_imdb = $id;
	$cSession = curl_init();
	curl_setopt($cSession,CURLOPT_URL,"http://www.omdbapi.com/?apikey=ba9e1d33&i=$id_imdb");
	curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($cSession,CURLOPT_HEADER, false);
	$result=curl_exec($cSession);
	curl_close($cSession);
	$info_imdb = json_decode( $result ,true);
	
	$text = $info_imdb['Plot'];
	$translation_plot = GoogleTranslate::translate('en', 'fa', $text);
	// translate gener
	$text_2 = $info_imdb['Genre'];
	$translation_gener = GoogleTranslate::translate('en', 'fa', $text_2);
	// translate language
	$text_3 = $info_imdb['Language'];
	$translation_lang = GoogleTranslate::translate('en', 'fa', $text_3);
	// translate award
	$text_4 = $info_imdb['Awards'];
	$translation_awards = GoogleTranslate::translate('en', 'fa', $text_4);
	
	$time = rtrim($info_imdb['Runtime'],"min");
    $meta = array(
		"imdb_Poster" => $info_imdb['Poster'],
		"imdb_Title"=> $info_imdb['Title'],
		"imdb_Type"=> $info_imdb['Type'],
		"imdb_Year"=> $info_imdb['Year'],
		"imdb_Actors"=> $info_imdb['Actors'],
		"imdb_Awards"=> $translation_awards,
		"imdb_Country"=> $info_imdb['Country'],
		"imdb_Director"=> $info_imdb['Director'],
		"imdb_Writer"=> $info_imdb['Writer'],
		"imdb_Genre"=> $translation_gener,
		"imdb_Language"=> $translation_lang,
		"imdb_Plot"=> $info_imdb['Plot'],
		"imdb_PlotFA"=> $translation_plot,
		"imdb_Metascore"=> $info_imdb['Metascore'],
		"imdb_Rated"=> $info_imdb['Rated'],
		"imdb_Released"=> $info_imdb['Released'],
		"imdb_Runtime"=> $time.'دقیقه ',
		"imdb_imdbRating"=> $info_imdb['imdbRating'],
		"imdb_imdbVotes"=> $info_imdb['imdbVotes'],
		"imdb_imdbID"=> $info_imdb['imdbID'],
		"new_info"=>$new_info
    );
	// Create post object
	$Type = $info_imdb['Type'] == 'movie' ? 'دانلود فیلم' : 'دانلود سریال';
	$my_post = array(
	'post_title'    => wp_strip_all_tags( $Type . ' ' . $info_imdb['Title']),
	'post_content'  => $_POST['post_content'],
	'post_type' => 'post',
	'post_status'   => 'draft',
	'post_author'   => 1,
	'meta_input'=>$meta
	);

	// Insert the post into the database
	$post_id = wp_insert_post( $my_post );
	echo $post_id;
	echo $Type;
	echo $info_imdb['Title'];
    die;
}
?>
<?php
class GoogleTranslate
{

    public static function translate($source, $target, $text) {
		
        $response 		= self::requestTranslation($source, $target, $text);
        $translation 	= self::getSentencesFromJSON($response);
        return $translation;
    }

    protected static function requestTranslation($source, $target, $text) {
        $url = "https://translate.google.com/translate_a/single?client=at&dt=t&dt=ld&dt=qca&dt=rm&dt=bd&dj=1&hl=es-ES&ie=UTF-8&oe=UTF-8&inputm=2&otf=2&iid=1dd3b944-fa62-4b55-b330-74909a99969e";
        $fields = array(
            'sl' => urlencode($source),
            'tl' => urlencode($target),
            'q' => urlencode($text)
        );

        $fields_string = "";
        foreach($fields as $key=>$value) {
            $fields_string .= $key.'='.$value.'&';
        }
        
        rtrim($fields_string, '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_USERAGENT, 'AndroidTranslate/5.3.0.RC02.130475354-53000263 5.1 phone TRANSLATE_OPM5_TEST_1');

        $result = curl_exec($ch);

        curl_close($ch);
        return $result;
    }

    protected static function getSentencesFromJSON($json) {
        $sentencesArray = json_decode($json, true);
        $sentences = "";
        foreach ($sentencesArray["sentences"] as $s) {
            $sentences .= $s["trans"];
        }
        return $sentences;
    }
}
?>