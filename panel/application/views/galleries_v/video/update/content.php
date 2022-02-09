<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->url</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("galleries/gallery_video_update/$item->id/$item->gallery_id"); ?>" method="post">

                        <div class="form-group">

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="embed-responsive embed-responsive-16by9">
				                        <?php
				                        $youtubeID = getYouTubeVideoId($item->url);
				                        $thumbURL = "https://img.youtube.com/vi/" . $youtubeID . "/mqdefault.jpg";
				                        ?>
                                        <iframe width="560" height="315" class="embed-responsive-item"
                                                src="https://www.youtube.com/embed/<?php echo $youtubeID; ?>"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label>Video URL</label>
                                    <input class="form-control" placeholder="Video bağlantısını buraya yapıştırınız" name="url" value="<?php echo $item->url; ?>">
	                                <?php if(isset($form_error)){ ?>
                                        <small class="input-form-error"> <?php echo form_error("url"); ?></small>
	                                <?php } ?>
                                </div>
                            </div>

                        </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("galleries/gallery_video_list/$item->gallery_id"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>