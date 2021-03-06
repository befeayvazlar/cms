<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürün Listesi
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("product/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>
                <div class="m-b-xl">
                    <a href="<?php echo base_url("product/new_form"); ?>" class="btn btn-outline btn-primary btn-sm"> <i class="fa fa-plus"></i> Yeni Ekle</a>
                </div>
                <div class="table-responsive">
                    <table id="dataTable" cellspacing="0" width="100%" class="table table-hover table-striped table-bordered content_container">
                        <thead>
                            <tr>
                                <th data-orderable="false" class="order"><i class="fa fa-reorder"></i></th>
                                <th class="w50">#id</th>
                                <th>Başlık</th>
                                <th data-orderable="false">url</th>
                                <th>Açıklama</th>
                                <th data-orderable="false">Durumu</th>
                                <th data-orderable="false">İşlem</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="order"><i class="fa fa-reorder"></i></th>
                                <th class="w50">#id</th>
                                <th>Başlık</th>
                                <th>url</th>
                                <th>Açıklama</th>
                                <th>Durumu</th>
                                <th>İşlem</th>
                            </tr>
                        </tfoot>
                        <tbody class="sortable" data-url="<?php echo base_url("product/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->id; ?>">
                                <td class="order"><i class="fa fa-reorder"></i></td>
                                <td class="w50 text-center">#<?php echo $item->id; ?></td>
                                <td><?php echo $item->title; ?></td>
                                <td><?php echo $item->url; ?></td>
                                <td><?php echo character_limiter(strip_tags($item->description),200); ?></td>
                                <td>
                                    <input
                                        data-url="<?php echo base_url("product/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td>
                                    <button
                                        data-url="<?php echo base_url("product/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("product/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                    <a href="<?php echo base_url("product/image_form/$item->id"); ?>" class="btn btn-sm btn-dark btn-outline"><i class="fa fa-image"></i> Resimler</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
                </div>
            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>