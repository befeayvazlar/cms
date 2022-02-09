<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Eğitimler
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("courses/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>
            <?php if(isAllowedWriteModule()){ ?>
                    <div class="m-b-xl">
                        <a href="<?php echo base_url("courses/new_form"); ?>" class="btn btn-outline btn-primary btn-sm"> <i class="fa fa-plus"></i> Yeni Ekle</a>
                    </div>
            <?php } ?>
                    <table style="font-size:13px" id="dataTable" class="table table-hover table-striped table-bordered content_container" data-page-length="10">
                    <thead>
                    <tr>
                        <th data-orderable="false" class="order"><i class="fa fa-reorder"></i></th>
                        <th>Sıra</th>
                        <th>#Id</th>
                        <th>Başlık</th>
                        <th>Başlama Tarihi</th>
                        <th>Bitiş Tarihi</th>
                        <th data-orderable="false">Görsel</th>
                        <th data-orderable="true">Durumu</th>
                        <th class="w100">Tarih</th>
                        <?php if(isAllowedDeleteModule() || isAllowedUpdateModule()){ ?>
                        <th data-orderable="false">İşlem</th>
                        <?php } ?>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th class="order"><i class="fa fa-reorder"></i></th>
                        <th>Sıra</th>
                        <th>#Id</th>
                        <th>Başlık</th>
                        <th>Başlama Tarihi</th>
                        <th>Bitiş Tarihi</th>
                        <th>Görsel</th>
                        <th>Durumu</th>
                        <th>Tarih</th>
                        <?php if(isAllowedDeleteModule() || isAllowedUpdateModule()){ ?>
                        <th>İşlem</th>
                        <?php } ?>
                    </tr>
                    </tfoot>

                    <tbody class="sortable" data-url="<?php echo base_url("courses/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->id; ?>">
                                <td class="order"><i class="fa fa-reorder"></i></td>
                                <td width="25" class="text-center"></td>
                                <td width="25" data-order="<?php echo $item->id; ?>" class="text-center">#<?php echo $item->id; ?></td>
                                <td style="font-size:14px; text-transform:capitalize;"><a href="<?php echo base_url("courses/update_form/$item->id"); ?>"><?php echo $item->title; ?></a></td>
                                <td width="225" class="text-center" style="font-size:14px;" data-order="<?php echo strtotime($item->event_start_date); ?>"><?php echo turkcetarih_formati('j F Y l H:i', $item->event_start_date); ?></td>
                                <td width="225" class="text-center" style="font-size:14px;" data-order="<?php echo strtotime($item->event_end_date); ?>"><?php echo turkcetarih_formati('j F Y l H:i', $item->event_end_date); ?></td>
                                <td width="75">

                                        <a href="<?php echo get_picture($viewFolder,$item->img_url, "255x157"); ?>" data-lightbox="resim" data-title="<?php echo $item->title; ?>">
                                            <img width="200" src="<?php echo get_picture($viewFolder,$item->img_url, "255x157"); ?>"
                                             alt="<?php echo $item->title; ?>"
                                             class="img-rounded">
                                        </a>

                                </td>
                                <td data-order="<?php echo $item->isActive; ?>" class="w100 text-center">
                                    <input
                                        data-url="<?php echo base_url("courses/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td class="text-center" data-order="<?php echo strtotime($item->createdAt); ?>"><?php echo time_ago_in_cms($item->createdAt); ?></td>
                                <?php if(isAllowedDeleteModule() || isAllowedUpdateModule()){ ?>
                                    <td class="text-center" width="175">
                                        <?php if(isAllowedDeleteModule()){ ?>
                                            <button
                                                data-url="<?php echo base_url("courses/delete/$item->id"); ?>"
                                                class="btn btn-sm btn-danger btn-outline remove-btn">
                                                <i class="fa fa-trash"></i> Sil
                                            </button>
                                        <?php } ?>

                                        <?php if(isAllowedUpdateModule()){ ?>
                                            <a href="<?php echo base_url("courses/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                        <?php } ?>
                                    </td>
                                <?php } ?>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>