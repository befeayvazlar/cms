<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->title</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("news/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Başlık</label>
                        <input class="form-control" placeholder="Başlık" name="title" value="<?php echo $item->title; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->description; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="control-demo-6" class="">Haberin Türü</label>
                        <div id="control-demo-6" class="">
                           <?php if(isset($form_error)) { ?>
                               <select class="form-control news_type_select" name="news_type">
                                   <option <?php echo ($news_type == "image") ? "selected" : ""; ?> value="image">Resim</option>
                                   <option <?php echo ($news_type == "video") ? "selected" : ""; ?> value="video">Video</option>
                               </select>
                           <?php } else { ?>
                               <select class="form-control news_type_select" name="news_type">
                                   <option <?php echo ($item->news_type == "image") ? "selected" : ""; ?> value="image">Resim</option>
                                   <option <?php echo ($item->news_type == "video") ? "selected" : ""; ?> value="video">Video</option>
                               </select>
                           <?php } ?>
                        </div>
                    </div><!-- .form-group -->

                    <?php if(isset($form_error)){ ?>

                        <div class="form-group image_upload_container" style="display: <?php echo ($news_type == "image") ? "block" : "none"; ?>">

                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?php echo get_picture($viewFolder,$item->img_url, "513x289"); ?>" alt="" class="img-responsive">
                                </div>
                                <div class="col-sm-3">
                                    <label>Görsel Seçiniz</label>
                                    <input type="file" name="img_url" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group video_url_container" style="display: <?php echo ($news_type == "video") ? "block" : "none"; ?>">
                            <label>Video URL</label>
                            <input class="form-control" placeholder="Video bağlantısını buraya yapıştırınız" name="video_url">
                            <?php if(isset($form_error)){ ?>
                                <small class="input-form-error"> <?php echo form_error("video_url"); ?></small>
                            <?php } ?>
                        </div>


                    <?php } else { ?>

                        <div class=" form-group image_upload_container" style="display: <?php echo ($item->news_type == "image") ? "block" : "none"; ?>">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?php echo get_picture($viewFolder,$item->img_url, "513x289"); ?>" alt="" class="img-responsive">
                                </div>
                                <div class="col-sm-4">
                                    <label>Görsel Seçiniz</label>
                                    <input type="file" name="img_url" class="form-control">
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group video_url_container" style="display: <?php echo ($item->news_type == "video") ? "block" : "none"; ?>">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="embed-responsive embed-responsive-16by9">
                                    <?php
                                    $youtubeID = getYouTubeVideoId($item->video_url);
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
                                    <input class="form-control" placeholder="Video bağlantısını buraya yapıştırınız" name="video_url" value="<?php echo $item->video_url; ?>">
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("news"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>