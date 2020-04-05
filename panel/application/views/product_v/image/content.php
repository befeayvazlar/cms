<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürün Resimleri
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="../api/dropzone" class="dropzone" data-plugin="dropzone" data-options="{ url: '../api/dropzone'}">
                    <div class="dz-message">
                        <h3 class="m-h-lg">Drop files here or click to upload.</h3>
                        <p class="m-b-lg text-muted">(This is just a demo dropzone. Selected files are not actually uploaded.)</p>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->

    </div><!-- END column -->
</div>
<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürün Resimleri
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <table class="table table-hover table-striped pictures_list">
                    <thead>
                    <th>#id</th>
                    <th>Ürün Resmi</th>
                    <th>Ürün Adı</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("product/rankSetter"); ?>">
		            <?php foreach ($items as $item) { ?>
                        <tr id="ord-<?php echo $item->id; ?>">
                            <td class="w100 text-center"><?php echo $item->id; ?></td>
                            <td class="w100 text-center"><?php echo $item->image; ?></td>
                            <td><?php echo $item->title; ?></td>
                            <td class="w100 text-center">
                                <input
                                        data-url="<?php echo base_url("product/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
						            <?php echo ($item->isActive) ? 'checked' : ''; ?>
                                />
                            </td>
                            <td class="w100 text-center">
                                <button data-url="<?php echo base_url("product/delete/$item->id");?>" class="btn btn-sm btn-danger btn-outline btn-block remove-btn"><i class="fa fa-trash"></i> Sil</button>
                            </td>
                        </tr>
		            <?php } ?>
                    </tbody>

                </table>
            </div><!-- .widget-body -->
        </div><!-- .widget -->

    </div><!-- END column -->
</div>