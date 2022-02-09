<?php

function convertToSEO($text){

    $turkce  = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "/", "\"", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");

    return strtolower(str_replace($turkce, $convert, $text));

}

function get_readable_date($date){
	//İngilizce Tarh Formatı: 24 Agust 2020
	return strftime('%e %B %Y', strtotime($date));

}

function turkcetarih_formati($format, $datetime = 'now'){
	$z = date("$format", strtotime($datetime));
	$gun_dizi = array(
		'Monday'    => 'Pazartesi',
		'Tuesday'   => 'Salı',
		'Wednesday' => 'Çarşamba',
		'Thursday'  => 'Perşembe',
		'Friday'    => 'Cuma',
		'Saturday'  => 'Cumartesi',
		'Sunday'    => 'Pazar',
		'January'   => 'Ocak',
		'February'  => 'Şubat',
		'March'     => 'Mart',
		'April'     => 'Nisan',
		'May'       => 'Mayıs',
		'June'      => 'Haziran',
		'July'      => 'Temmuz',
		'August'    => 'Ağustos',
		'September' => 'Eylül',
		'October'   => 'Ekim',
		'November'  => 'Kasım',
		'December'  => 'Aralık',
		'Mon'       => 'Pts',
		'Tue'       => 'Sal',
		'Wed'       => 'Çar',
		'Thu'       => 'Per',
		'Fri'       => 'Cum',
		'Sat'       => 'Cts',
		'Sun'       => 'Paz',
		'Jan'       => 'Oca',
		'Feb'       => 'Şub',
		'Mar'       => 'Mar',
		'Apr'       => 'Nis',
		'Jun'       => 'Haz',
		'Jul'       => 'Tem',
		'Aug'       => 'Ağu',
		'Sep'       => 'Eyl',
		'Oct'       => 'Eki',
		'Nov'       => 'Kas',
		'Dec'       => 'Ara',
	);
	foreach($gun_dizi as $en => $tr){
		$z = str_replace($en, $tr, $z);
	}
	if(strpos($z, 'Mayıs') !== false && strpos($format, 'F') === false) $z = str_replace('Mayıs', 'May', $z);
	return $z;
}

function getYouTubeVideoId($pageVideUrl) {
	$link = $pageVideUrl;
	$video_id = explode("?v=", $link);
	if (!isset($video_id[1])) {
		$video_id = explode("youtube.com/",$link);
	}
	$youtubeID = $video_id[1];
	if (empty($video_id[1])) $video_id = explode("/v/", $link);
	$video_id = explode("&", $video_id[1]);
	$youtubeVideoID = $video_id[0];
	if ($youtubeVideoID) {
		return $youtubeVideoID;
	} else {
		return false;
	}
}

function tr_tarih($tarih){

	$tarih = new DateTime($tarih);

	$gunler = array(
		'Pazartesi',
		'Salı',
		'Çarşamba',
		'Perşembe',
		'Cuma',
		'Cumartesi',
		'Pazar'
	);

	$aylar = array(
		'Ocak',
		'Şubat',
		'Mart',
		'Nisan',
		'Mayıs',
		'Haziran',
		'Temmuz',
		'Ağustos',
		'Eylül',
		'Ekim',
		'Kasım',
		'Aralık'
	);

	$ay = $aylar[date('m') - 1];
	$gun = $gunler[date('N') - 1];

	//9 Nisan 2020 Cuma 02:2
	return $tarih->format('j ') . $ay . $tarih->format(' Y ') . $gun . $tarih->format(' H:i');
}

function time_ago_in_cms($timestamp){
	//date_default_timezone_set("Europe/Istanbul");
	$date = new DateTime($timestamp);
	$time_ago        = strtotime($timestamp);
	$current_time    = time();
	$time_difference = $current_time - $time_ago;
	$seconds         = $time_difference;

	$minutes = round($seconds / 60); // value 60 is seconds
	$hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
	$days    = round($seconds / 86400); //86400 = 24 * 60 * 60;
	$weeks   = round($seconds / 604800); // 7*24*60*60;
	$months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
	$years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

	if ($seconds <= 60){

		return "az önce";

	} else if ($minutes <= 60){

		if ($minutes == 1){

			return "1 dakika önce";

		} else {

			return "$minutes dakika önce";

		}

	} else if ($hours <= 24){

		if ($hours == 1){

			return "1 saat önce";

		} else {

			return "$hours saat önce";

		}

	} else {

		if ($days == 1){
			return "1 gün önce";
		}

		else {

			return tr_tarih($timestamp);

			}
	}

}

function time_ago_in_php($timestamp){

	$time_ago        = strtotime($timestamp);
	$current_time    = time();
	$time_difference = $current_time - $time_ago;
	$seconds         = $time_difference;

	$minutes = round($seconds / 60); // value 60 is seconds
	$hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
	$days    = round($seconds / 86400); //86400 = 24 * 60 * 60;
	$weeks   = round($seconds / 604800); // 7*24*60*60;
	$months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
	$years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

	if ($seconds <= 60){

		return "az önce";

	} else if ($minutes <= 60){

		if ($minutes == 1){

			return "1 dakika önce";

		} else {

			return "$minutes dakika önce";

		}

	} else if ($hours <= 24){

		if ($hours == 1){

			return "1 saat önce";

		} else {

			return "$hours saat önce";

		}

	} else if ($days <= 7){

		if ($days == 1){

			return "1 gün önce";

		} else {

			return "$days gün önce";

		}

	} else if ($weeks <= 4.3){

		if ($weeks == 1){

			return "1 hafta önce";

		} else {

			return "$weeks hafta önce";

		}

	} else if ($months <= 12){

		if ($months == 1){

			return "1 ay önce";

		} else {

			return "$months ay önce";

		}

	} else {

		if ($years == 1){

			return "1 yıl önce";

		} else {

			return "$years yıl önce";

		}
	}
}

function get_active_user(){

	$t = &get_instance();
	$user = $t->session->userdata("user");

	if($user)
		return $user;
	else
		return false;

}

function send_email($toEmail = "", $subject = "", $message = ""){

	$t = &get_instance();

	$t->load->model("emailsettings_model");

	$email_settings = $t->emailsettings_model->get(
		array(
			"isActive" => 1
		)
	);

	$config = array(

		"protocol"  => $email_settings->protocol,
		"smtp_host" => $email_settings->host,
		"smtp_port" => $email_settings->port,
		"smtp_user" => $email_settings->user,
		"smtp_pass" => $email_settings->password,
		"starttls"  => true,
		"charset"   => "utf-8",
		"mailtype"  => "html",
		"wordwrap"  => true,
		"newline"   => "\r\n"
	);

	$t->load->library("email", $config);

	$t->email->from($email_settings->from, $email_settings->user_name);
	$t->email->to($toEmail);
	$t->email->subject($subject);
	$t->email->message($message);

	return $t->email->send();

}

function get_settings() {

	$t = &get_instance();
	$t->load->model("settings_model");

	if($t->session->userdata("settings")){
		$settings = $t->session->userdata("settings");
	}
	else
	{
		$settings = $t->settings_model->get();

		if(!$settings){

			$settings = new stdClass();
			$settings->company_name = "Deal Creative";
			$settings->logo = "default";

		}

		$t->session->set_userdata("settings", $settings);
	}

	return $settings;
}

function get_category_title($category_id = 0){

	$t = &get_instance();

	$t->load->model("portfolio_category_model");

	$category = $t->portfolio_category_model->get(
		array(
			"id"    => $category_id
		)
	);

	if($category)
		return $category->title;
	else
		return "<b class='text-danger'>Tanımlı Değil</b>";

}

function upload_picture($file, $uploadPath, $width, $height, $name){

    $t = &get_instance();
    $t->load->library("simpleimagelib");

    if(!is_dir("{$uploadPath}/{$width}x{$height}")){
        mkdir("{$uploadPath}/{$width}x{$height}");

    }

    $upload_error = false;
    try {

        $simpleImage = $t->simpleimagelib->get_simple_image_instance();

        $simpleImage
            ->fromFile($file)
            ->thumbnail($width,$height,'center')
            ->toFile("{$uploadPath}/{$width}x{$height}/$name", null, 75);

    } catch(Exception $err) {
        echo $err->getMessage();
        $upload_error = true;
    }

    if ($upload_error) {
        echo $upload_error;
    }
    else{
        return true;
    }
}

function get_picture($path="", $picture="", $resolution = "150x150"){

    if($picture  != "") {

        if(file_exists(FCPATH. "uploads/$path/$resolution/$picture")){
            $picture = base_url("uploads/$path/$resolution/$picture");
        }
        else {
            $picture = base_url("assets/assets/images/default_image.png");
        }

    } else{
        $picture = base_url("assets/assets/images/default_image.png");

    }

    return $picture;

}

function get_page_list($page=""){

    $page_list = array(
        "home_v"            => "Anasayfa",
        "about_v"           => "Hakkımızda Sayfası",
        "news_list_v"       => "Haberler Sayfası",
        "galleries"         => "Galeri Sayfası",
        "portfolio_list_v"  => "Portfolyo Sayfası",
        "reference_list_v"  => "Referanslar Sayfası",
        "service_list_v"    => "Hizmetler Sayfası",
        "course_list_v"     => "Eğitimler Sayfası",
        "brand_list_v"      => "Markalar Sayfası",
        "contact_v"         => "İletişim Sayfası"
    );

    return (empty($page)) ? $page_list : $page_list[$page];
}