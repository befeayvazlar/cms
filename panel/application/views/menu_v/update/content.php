<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Menü
        </h4>
    </div><!-- END column -->
    <div class="col-md-6">
        <div class="widget p-lg">

<!--            --><?php //if(empty($menus)) { ?>

<!--                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır.</p>
                </div>
-->
<!--            --><?php //} else { ?>

            <h4 class="m-b-lg widget-title">Menü Düzenle</h4>
            <form class="form" method="post" action="<?php echo base_url("menu/update/$menu_item->menu_id"); ?>">
                <div class="form-group">
                    <label>Üst Menü Seç</label>
                    <select class="form-control" name="menu_id">
                        <option value="0">Üst Menü Seçiniz</option>
                        <?php foreach ($menus as $menu) {?>

                                <?php
                                if($menu_item->menu_parent_id != NULL){
                                    if($menu_item->menu_parent_id == $menu->menu_id){
                                        $selected = "selected";
                                    }else{
                                        $selected = "";
                                    }
                                }

                                if($menu_item->menu_parent_id == NULL){
                                    $selected = "";
                                }
                                ?>

                            <option value="<?php echo $menu->menu_id; ?>" <?php echo $selected; ?> ><?php echo $menu->menu_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Menü Adı</label>
                    <input type="text" class="form-control" name="menu_name" value="<?php echo $menu_item->menu_name; ?>" placeholder="Menü Adını giriniz">
                    <?php if(isset($form_error)){ ?>
                        <small class="input-form-error"> <?php echo form_error("menu_name"); ?></small>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label>Bağlantı Adresi</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon3"><?php echo base_url(); ?></span>
                        <input type="text" class="form-control" name="menu_url" value="<?php echo $menu_item->menu_url; ?>" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-add">Güncelle</button>
                <a href="<?php echo base_url("menu"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
            </form>

<!--            --><?php //} ?>

        </div><!-- .widget -->
    </div><!-- END column -->
    <div class="col-md-6">
        <div class="widget p-lg">

            <?php if(empty($menus)) { ?>
                <h4 class="m-b-lg widget-title">Aktif Menüler</h4>
                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Lütfen soldaki panelden menü ekleyiniz.</p>
                </div>

            <?php } else { ?>

            <h4 class="m-b-lg widget-title">Aktif Menüler</h4>
                <div class="alert alert-info text-center alert-dismissible small" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <span>Menülerin yerlerini değiştirmek için sola, sağa, aşağı, yukarı haraket ettirebilirsiniz.</span>
                </div>
            <div class="dd content_container" id="nestable">
                Loading...
            </div>
            <button class="btn btn-primary m-t-md btn-save">Kaydet</button>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>