<?php $settings = get_settings(); ?>
<meta charset="utf-8">
<title><?php echo $settings->company_name . " | " . $settings->slogan; ?></title>
<meta name="description" content="">
<meta name="author" content="B.E. Ayvazlar">

<!-- Mobile Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php if(isset($opengraph)){ ?>

    <!--    OPENGRAPH-->
    <meta property="og:site_name" content="<?php echo $settings->company_name; ?>">
    <meta property="og:url" content="<?php echo base_url("haber/$news->url"); ?>">
    <meta property="og:title" content="<?php echo $news->title; ?>" />
    <meta property="og:description" content="<?php echo character_limiter(strip_tags($news->description), 200); ?>" />
	<?php if($news->news_type == "image") { ?>
        <meta property="og:image" content="<?php echo base_url("panel/uploads/news_v/$news->img_url"); ?>" />
        <meta property="og:image:width" content="1280">
        <meta property="og:image:height" content="720">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@<?php echo get_twitter_id_from_url($settings->twitter); ?>">
        <meta name="twitter:url" content="<?php echo base_url("haber/$news->url"); ?>">
        <meta name="twitter:title" content="<?php echo $news->title; ?>">
        <meta name="twitter:description" content="<?php echo character_limiter(strip_tags($news->description), 200); ?>">

	<?php } else { ?>

        <?php $youtubeID = getYouTubeVideoId($news->video_url); ?>
        <meta property="og:type" content="video.other">
        <meta property="og:video" content="<?php echo "https://www.youtube.com/embed/$youtubeID"; ?>" />
        <meta property="og:video:type" content="text/html">
        <meta property="og:video:width" content="1280">
        <meta property="og:video:height" content="720">

        <meta name="twitter:card" content="player">
        <meta name="twitter:site" content="@<?php echo get_twitter_id_from_url($settings->twitter); ?>">
        <meta name="twitter:url" content="<?php echo base_url("haber/$news->url"); ?>">
        <meta name="twitter:title" content="<?php echo $news->title; ?>">
        <meta name="twitter:description" content="<?php echo character_limiter(strip_tags($news->description), 200); ?>">
        <meta name="twitter:player" content="<?php echo "https://www.youtube.com/embed/$youtubeID"; ?>">
        <meta name="twitter:player:width" content="1280">
        <meta name="twitter:player:height" content="720">
	<?php } ?>

<?php } ?>


<?php $this->load->view("includes/include_style"); ?>