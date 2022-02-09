<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->title</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("slides/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
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

                    <div class=" form-group image_upload_container">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?php echo get_picture($viewFolder,$item->img_url, "1920x650");?>" alt="" class="img-responsive">
                            </div>
                            <div class="col-sm-4">
                                <label>Görsel Seçiniz</label>
                                <input type="file" name="img_url" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Buton Kullanımı</label>
                        <div>
                            <input
                                    class="isActive button_usage_btn"
                                    type="checkbox"
                                    name="allowButton"
                                    data-switchery
                                    <?php echo ($item->allowButton == 1) ? "checked" : "" ?>
                                    data-color="#10c469"
                            />
                        </div>
                    </div>

                    <div class="col-md-12 button-information-container" style="display: <?php echo ($item->allowButton == 1) ? "block" : "none"; ?>">
                        <div class="form-group">
                            <label>Buton Başlığı</label>
                            <input class="form-control" placeholder="Butonun üzerindeki yazı" name="button_caption" value="<?= $item->button_caption; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="input-form-error"> <?php echo form_error("button_caption"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label>URL Bilgisi</label>
                            <input class="form-control" placeholder="Butona basıldığında gidilecek URL bilgisi" name="button_url" value="<?= $item->button_url; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="input-form-error"> <?php echo form_error("button_url"); ?></small>
                            <?php } ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("slides"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>