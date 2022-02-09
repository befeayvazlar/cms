<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Popup Hizmeti
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("popups/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <div class="m-b-xl">
                    <a href="<?php echo base_url("popups/new_form"); ?>" class="btn btn-outline btn-primary btn-sm"> <i class="fa fa-plus"></i> Yeni Ekle</a>
                </div>

                    <table style="font-size:13px" class="table table-hover table-striped table-bordered content_container">
                    <thead>
                    <tr>
                        <th>#Id</th>
                        <th>Başlık</th>
                        <th data-orderable="false">Hedef Sayfa</th>
                        <th data-orderable="true">Durumu</th>
                        <th class="w100">Tarih</th>
                        <th data-orderable="false">İşlem</th>
                    </tr>
                    </thead>

                    <tbody>

                        <?php foreach($items as $item) { ?>

                            <tr>
                                <td width="25" data-order="<?php echo $item->id; ?>" class="text-center">#<?php echo $item->id; ?></td>
                                <td style="font-size:14px; text-transform:capitalize;"><a href="<?php echo base_url("popups/update_form/$item->id"); ?>"><?php echo $item->title; ?></a></td>
                                <td width="175" class="text-center">
                                    <?php echo get_page_list($item->page); ?>
                                </td>
                                <td data-order="<?php echo $item->isActive; ?>" class="w100 text-center">
                                    <input
                                        data-url="<?php echo base_url("popups/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td class="text-center w150"><?php echo time_ago_in_cms($item->createdAt); ?></td>
                                <td class="text-center" width="175">
                                    <button
                                        data-url="<?php echo base_url("popups/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("popups/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>