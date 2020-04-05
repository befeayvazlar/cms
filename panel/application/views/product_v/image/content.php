<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("product/image_upload/$item->id"); ?>" class="dropzone" data-plugin="dropzone" data-options="{ url: '<?php echo base_url("product/image_upload/$item->id"); ?>'}">
                    <div class="dz-message">
                        <h3 class="m-h-lg">Yüklemek istediğiniz resimleri buraya sürükleyiniz.</h3>
                        <p class="m-b-lg text-muted">(Yüklemek için dosyalarınız sürükleyiniz ya da buraya tıklayız.)</p>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->

    </div><!-- END column -->
</div>
<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->title</b>"; ?> kaydına ait Resimler
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
	            <?php if(empty($item_images)) { ?>
                    <div class="alert alert-info text-center">
                        <p>Burada herhangi bir resim bulunmamaktadır.</p>
                    </div>
	            <?php } else { ?>
                    <table class="table table-hover table-striped pictures_list">
                    <thead>
                    <th>#id</th>
                    <th>Ürün Resmi</th>
                    <th>Ürün Adı</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("product/rankSetter"); ?>">
		            <?php foreach ($item_images as $image) { ?>
                        <tr id="ord-<?php echo $image->id; ?>">
                            <td class="w100 text-center"><?php echo $image->id; ?></td>
                            <td class="w100 text-center">
                                <img src="<?php echo base_url("uploads/{$viewFolder}/$image->img_url"); ?>" class="img-responsive" alt="" width="30" />
                            </td>
                            <td class=""><?php echo $image->img_url; ?></td>
                            <td class="w100 text-center">
                                <input
                                        data-url="<?php echo base_url("product/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
						            <?php echo ($image->isActive) ? 'checked' : ''; ?>
                                />
                            </td>
                            <td class="w100 text-center">
                                <button data-url="<?php echo base_url("product/delete/$item->id");?>" class="btn btn-sm btn-danger btn-outline btn-block remove-btn"><i class="fa fa-trash"></i> Sil</button>
                            </td>
                        </tr>
		            <?php } ?>
                    </tbody>

                </table>
                <?php  } ?>
            </div><!-- .widget-body -->
        </div><!-- .widget -->

    </div><!-- END column -->
</div>