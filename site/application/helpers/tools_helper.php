<?php

function buildTree($menus, $menu_parent_id = null){

    $branch = array();

    foreach ($menus as $menu){
        if($menu->menu_parent_id == $menu_parent_id){
            $children = buildTree($menus, $menu->menu_id);

            if($children){
                $menu->children = $children;
            }
            else{
                $menu->children = array();
            }

            $branch[] = $menu;
        }
    }
    return $branch;
}

function drawMenus($menus){

    //echo "<ul>";

    foreach ($menus as $menu){

        $li_class  = ($menu->menu_parent_id == NULL) ? 'nav-item dropdown' : '';
        $a_attr  = ($menu->menu_parent_id == NULL) ? 'class="nav-link dropdown-toggle" id="third-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : '';

        echo "<li class='{$li_class}'><a href='".base_url($menu->menu_url)."' {$a_attr}>{$menu->menu_name}</a>";

        if(sizeof($menu->children) > 0){
            echo "<ul class='dropdown-menu' aria-labelledby='third-dropdown'>";
            drawMenus($menu->children);
            echo "</ul>";
        }
        echo "</li>";
    }

    //echo "</ul>";

}

function drawMenus2($menus){

    foreach ($menus as $menu){

        $li_class  = (sizeof($menu->children) > 0) ? 'nav-item dropdown' : 'nav-item';
        $a_attr  = (sizeof($menu->children) > 0) ? 'class="nav-link dropdown-toggle" id="third-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : 'class="nav-link"';

        echo "<li class='{$li_class}'><a href='".base_url($menu->menu_url)."' {$a_attr}>{$menu->menu_name}</a>";

        if(sizeof($menu->children) > 0){
            echo "<ul class='dropdown-menu' aria-labelledby='third-dropdown'>";

            foreach ($menu->children as $menu){
                echo "<li><a href='".base_url($menu->menu_url)."'>{$menu->menu_name}</a></li>";
            }

            echo "</ul>";
        }
        echo "</li>";
    }

}

function get_product_cover_image($product_id){

    $t = &get_instance();

    $t->load->model("product_image_model");

    $cover_image = $t->product_image_model->get(
        array(
            "isCover"       => 1,
            "product_id"    => $product_id
        )
    );

    if(empty($cover_image)){

        $cover_image = $t->product_image_model->get(
            array(
                "product_id"    => $product_id
            )
        );

    }

    return !empty($cover_image) ? $cover_image->img_url : "";

}


function get_readable_date($date){

    setlocale(LC_ALL, 'tr_TR.UTF-8');
    return strftime('%e %B %Y', strtotime($date));
}

function get_portfolio_category_title($id){

    $t = &get_instance();

    $t->load->model("portfolio_category_model");

    $portfolio = $t->portfolio_category_model->get(
        array(
            "id"    => $id

        )
    );

    return (empty($portfolio)) ? false : $portfolio->title;


}

function get_portfolio_cover_image($id){

    $t = &get_instance();

    $t->load->model("portfolio_image_model");

    $cover_image = $t->portfolio_image_model->get(
        array(
            "isCover"       => 1,
            "portfolio_id"    => $id
        )
    );

    if(empty($cover_image)){

        $cover_image = $t->portfolio_image_model->get(
            array(
                "portfolio_id"    => $id
            )
        );

    }

    return !empty($cover_image) ? $cover_image->img_url : "";

}

function get_settings(){

	$t = &get_instance();

//    $settings = $t->session->userdata("settings");

//    if(empty($settings)){

	$t->load->model("settings_model");

	$settings = $t->settings_model->get();

	$t->session->set_userdata("settings", $settings);
//    }

	return $settings;
}

function send_email($toEmail = "", $subject = "", $message = ""){

	$t = &get_instance();

	$t->load->model("emailsettings_model");

	$email_settings = $t->emailsettings_model->get(
		array(
			"isActive"  => 1
		)
	);

	if(empty($toEmail))
		$toEmail = $email_settings->to;

	$config = array(

		"protocol"   => $email_settings->protocol,
		"smtp_host"  => $email_settings->host,
		"smtp_port"  => $email_settings->port,
		"smtp_user"  => $email_settings->user,
		"smtp_pass"  => $email_settings->password,
		"starttls"   => true,
		"charset"    => "utf-8",
		"mailtype"   => "html",
		"wordwrap"   => true,
		"newline"    => "\r\n"
	);

	$t->load->library("email", $config);

	$t->email->from($email_settings->from, $email_settings->user_name);
	$t->email->to($toEmail);
	$t->email->subject($subject);
	$t->email->message($message);

	return $t->email->send();

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

function get_twitter_id_from_url($url) {

	if ( preg_match( "/^https?:\/\/(www\.)?twitter\.com\/(#!\/)?(?<name>[^\/]+)(\/\w+)*$/", $url, $regs ) ) {
		return $regs['name'];
	}

	return false;
}

function get_picture($path="", $picture="", $resolution = "50x50"){

    if($picture  != "") {

        if(file_exists(FCPATH. "panel/uploads/$path/$resolution/$picture")){
            $picture = base_url("panel/uploads/$path/$resolution/$picture");
        }
        else {
            $picture = base_url("assets/images/default_image_$resolution.png");
        }

    } else{
        $picture = base_url("assets/images/default_image_$resolution.png");

    }

    return $picture;

}

function get_gallery_cover_image($folder_name){

    $path = "panel/uploads/galleries_v/images/$folder_name/350x216";
    if(is_dir($path)) {
        if ($handle = opendir($path)) {

            while (($file = readdir($handle)) !== false) {

                if ($file != "." & $file != "..") {
                    return $file;
                }

            }

        }
    }else{
        return false;
    }

}

function get_popup_service($page=""){
    $t = &get_instance();

    $t->load->model("popup_model");
    $popup = $t->popup_model->get(
        array(
            "isActive"  => 1,
            "page"      => $page
        )
    );

    return (!empty($popup)) ? $popup : false;
}

function get_gallery_by_url($url=""){
    $t = &get_instance();
    $t->load->model("gallery_model");
    $gallery = $t->gallery_model->get(
        array(
            "isActive" => 1,
            "url"      => $url
        )
    );

    return ($gallery) ? $gallery : false;

}

function get_gallery_by_id($id){
    $t = &get_instance();
    $t->load->model("gallery_model");

    $gallery = $t->gallery_model->get(
        array(
            "id"      => $id
        )
    );

    return ($gallery) ? $gallery : false;

}

function get_gallery_images_by_gallery_id($gallery_id){

    $t = &get_instance();

    $t->load->model("image_model");

    $gallery_images = $t->image_model->get_all(
        array(
            "isActive" => 1,
            "gallery_id"    => $gallery_id
        ), "rank ASC"
    );

    return (empty($gallery_images)) ? false : $gallery_images;

}