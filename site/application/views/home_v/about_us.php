<?php $settings = get_settings(); ?>
<section class="pv-40">
    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-12">
                <h3 class="title"><strong class="text-default"><?php echo $settings->company_name; ?></strong></h3>
                <div class="separator-2"></div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-12">
                                <p><?php echo character_limiter(strip_tags($settings->about_us),400); ?></p>
                            </div>
                            <div class="col-md-12">
                                <h6 class="title"><strong class="text-default">Misyon</strong></h6>
                                <p><?php echo character_limiter(strip_tags($settings->mission),400); ?></p>
                            </div>
                            <div class="col-md-12">
                                <h6 class="title"><strong class="text-default">Vizyon</strong></h6>
                                <p><?php echo character_limiter(strip_tags($settings->vision),400); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                    <?php
                        $gallery = get_gallery_by_id($settings->about_us_gallery_id);
                        $gallery_pictures = get_gallery_images_by_gallery_id($settings->about_us_gallery_id);
                        if($gallery->isActive == 1) {
                        ?>
                        <div class="owl-carousel content-slider-with-controls">
                            <?php foreach ($gallery_pictures as $gallery_picture) { ?>
                            <div class="overlay-container overlay-visible">
                                    <img src="<?php echo get_picture("galleries_v/images/$gallery->folder_name", $gallery_picture->url, "851x606"); ?>" alt="<?php echo $gallery->title; ?>">
                                    <a href="<?php echo get_picture("galleries_v/images/$gallery->folder_name", $gallery_picture->url, "851x606"); ?>" class="owl-carousel--popup-img overlay-link" title="<?php echo $gallery->title; ?>"><i class="icon-plus-1"></i></a>
                            </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <!-- main end -->

        </div>
    </div>
</section>