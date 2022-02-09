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

function isAdmin(){

    $t = &get_instance();
    $user = $t->session->userdata("user");
    
    //return true;

    if($user->user_role_id == "1")
        return true;
    else
        return false;

}

function get_user_roles(){
    $t = &get_instance();
    return $t->session->userdata("user_roles");
}

function setUserRoles(){
    $t = &get_instance();

    $t->load->model("user_role_model");

    $user_roles = $t->user_role_model->get_all(
        array(
            "isActive" => 1
        )
    );

    $roles = [];
    foreach ($user_roles as $role){
        $roles[$role->id] = $role->permissions;
    }

    $t->session->set_userdata("user_roles", $roles);
}

function getCountTable($tableName=""){
    $t = &get_instance();
    return $t->db->count_all_results($tableName);
}

function getControllerList(){
    $t = &get_instance();
    $controllers = array();

    $t->load->helper("file");

    $files = get_dir_file_info(APPPATH."controllers", FALSE);

    foreach (array_keys($files) as $file){
        if(($file !== "index.html")){
            $controllers[] = strtolower(str_replace(".php", "", $file));
        }
    }

    return($controllers);

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

// delete all files and sub-folders from a folder
function deleteAll($dir) {
    foreach(glob($dir . '/*') as $file) {
        if(is_dir($file))
            deleteAll($file);
        else
            unlink($file);
    }
    rmdir($dir);
}

// delete all files from folder
function deleteFiles($dir)
{
    // loop through the files one by one
    foreach(glob($dir . '/*') as $file){
        // check if is a file and not sub-directory
        if(is_file($file)){
            // delete file
            unlink($file);
        }
    }
}

function getClientIP(){
    $ip = '';
    if (isset($_SERVER)){
        if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            if(strpos($ip,",")){
                $exp_ip = explode(",",$ip);
                $ip = $exp_ip[0];
            }
        }else if(isset($_SERVER["HTTP_CLIENT_IP"])){
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }else{
            $ip = $_SERVER["REMOTE_ADDR"];
        }
    }else{
        if(getenv("HTTP_X_FORWARDED_FOR")){
            $ip = getenv("HTTP_X_FORWARDED_FOR");
            if(strpos($ip,",")){
                $exp_ip=explode(",",$ip);
                $ip = $exp_ip[0];
            }
        }else if(getenv("HTTP_CLIENT_IP")){
            $ip = getenv("HTTP_CLIENT_IP");
        }else {
            $ip = getenv("REMOTE_ADDR");
        }
    }
    return $ip;
}

function getGeoIP($ip=false){
    if($ip){
        $endpoint = "https://freegeoip.app/json/".$ip;
    }else{
        $endpoint = "https://freegeoip.app/json/";
    }
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "content-type: application/json"
        ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if (!$err) {
        return json_decode($response, true);
    }

}

function user_agent_browser($user_agent){
    if(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) {
        return 'Opera';
    }elseif (strpos($user_agent, 'Edge')) {
        return 'Edge';
    }elseif (strpos($user_agent, 'Chrome')) {
        return 'Chrome';
    }elseif (strpos($user_agent, 'Safari')) {
        return 'Safari';
    }elseif (strpos($user_agent, 'Firefox')) {
        return 'Firefox';
    }elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) {
        return 'Internet Explorer';
    }else{
        return '';
    }
}

function user_agent_platform($user_agent){
    if(preg_match('/linux/i', $user_agent)) {
        return 'linux';
    }elseif (preg_match('/macintosh|mac os x/i', $user_agent)) {
        return 'mac';
    }elseif (preg_match('/windows|win32/i', $user_agent)) {
        return 'windows';
    }else{
        return '';
    }
}

function user_agent_string($user_agent){
    $browser = user_agent_browser($user_agent);
    $platform = user_agent_platform($user_agent);
    if($browser && $platform){
        $return_string = $browser.' on '.$platform;
    }elseif($browser){
        $return_string = $browser;
    }elseif($platform){
        $return_string = $platform;
    }else{
        $return_string = "Not Found";
    }
    return $return_string;
}

function get_report_type_id($id){
    if($id == "1"){
        return "Giriş";
    }
    else if ($id=="2"){
        return "Çıkış";
    }
    else if($id =="3"){
        return "Şifremi Sıfırla";
    }
}