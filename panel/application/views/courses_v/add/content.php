<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Eğitim Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("courses/save"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Başlık</label>
                        <input class="form-control" placeholder="Başlık" name="title">
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="datetimepicker2">Başlangıç Tarihi</label>
                                <div class='input-group date' data-plugin="datetimepicker" data-options="{defaultDate: 'moment', locale:'tr'}">
                                    <input type='text' name="event_start_date" class="form-control" />
                                    <span class="input-group-addon bg-info text-white">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="datetimepicker2">Bitiş Tarihi</label>
                                <div class='input-group date' data-plugin="datetimepicker" data-options="{locale:'tr'}">
                                    <input type='text' name="event_end_date" class="form-control" />
                                    <span class="input-group-addon bg-info text-white">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
                                </div>
                            </div>

                        </div>

                    </div>

                        <div class="form-group image_upload_container">
                            <label>Görsel Seçiniz</label>
                            <input type="file" name="img_url" class="form-control">
                        </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("courses"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>