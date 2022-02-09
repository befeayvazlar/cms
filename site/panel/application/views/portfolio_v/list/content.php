<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Portfolyo Listesi
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("portfolio/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <div class="m-b-xl">
                    <a href="<?php echo base_url("portfolio/new_form"); ?>" class="btn btn-outline btn-primary btn-sm"> <i class="fa fa-plus"></i> Yeni Ekle</a>
                </div>

                <table style="font-size:13px" id="dataTable" class="table table-hover table-striped table-bordered content_container" data-page-length="10">
                    <thead>
                        <th data-orderable="false" class="order"><i class="fa fa-reorder"></i></th>
                        <th>Sıra</th>
                        <th>#Id</th>
                        <th>Başlık</th>
                        <th>Kategori</th>
                        <th>Müşteri</th>
                        <th data-orderable="true">Bitiş Tarihi</th>
                        <th>Durumu</th>
                        <th data-orderable="false">İşlem</th>
                    </thead>

                    <tfoot>
                    <th data-orderable="false" class="order"><i class="fa fa-reorder"></i></th>
                    <th>Sıra</th>
                    <th>#Id</th>
                    <th>Başlık</th>
                    <th>Kategori</th>
                    <th>Müşteri</th>
                    <th>Bitiş Tarihi</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                    </tfoot>

                    <tbody class="sortable" data-url="<?php echo base_url("portfolio/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->id; ?>">
                                <td class="order"><i class="fa fa-reorder"></i></td>
                                <td width="25" class="text-center"></td>
                                <td width="25" class="text-center" data-order="<?php echo $item->id; ?>">#<?php echo $item->id; ?></td>
                                <td style="font-size:14px; text-transform:capitalize;"><a href="<?php echo base_url("portfolio/update_form/$item->id"); ?>"><?php echo $item->title; ?></a></td>
                                <td class="text-center w150"><?php echo get_category_title($item->category_id); ?></td>
                                <td class="text-center w150"><?php echo $item->client; ?></td>
                                <td class="text-center w150" data-order="<?php echo strtotime($item->finishedAt); ?>"><?php echo turkcetarih_formati('j F Y', $item->finishedAt); ?></td>
                                <td class="text-center w100" data-order="<?php echo $item->isActive; ?>">
                                    <input
                                        data-url="<?php echo base_url("portfolio/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td class="text-center" width="250">
                                    <button
                                        data-url="<?php echo base_url("portfolio/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("portfolio/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                    <a href="<?php echo base_url("portfolio/image_form/$item->id"); ?>" class="btn btn-sm btn-dark btn-outline"><i class="fa fa-image"></i> Resimler</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>