<div role="tabpanel" class="tab-pane fade" id="tab-2">
    <div class="row">
        <div class="col-md-12">
            <label>Hakkımızda</label>
            <textarea name="about_us" class="m-0" data-plugin="summernote" data-options="{height: 250}">
                                        <?php echo isset($form_error) ? set_value("about_us") : $item->about_us; ?>
                                    </textarea>
        </div>
       <?php if($galleries) { ?>
        <div class="form-group col-md-12">
            <label>Anasayfa Slider Seçimi</label>
            <select name="gallery_id" class="form-control">
                <?php foreach ($galleries as $gallery) { ?>
                    <option value="<?php echo $gallery->id; ?>"><?php echo $gallery->title; ?></option>
                <?php } ?>
            </select>
        </div>
        <?php } else { ?>
        <div class="form-group col-md-12">
           <div class="alert alert-warning">Lütfen <strong><a href="<?php echo base_url("galleries"); ?>" class="href">Galeriler Modülünden</a>, Galeri Türü "resim"</strong> olan bir galeri ekleyiniz.</div>
        </div>
       <?php } ?>
    </div>
</div><!-- .tab-pane  -->