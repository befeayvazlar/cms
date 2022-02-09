<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Kullanıcılar
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("users/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <div class="m-b-xl">
                    <a href="<?php echo base_url("users/new_form"); ?>" class="btn btn-outline btn-primary btn-sm"> <i class="fa fa-plus"></i> Yeni Ekle</a>
                </div>

                    <table style="font-size:13px" id="dataTable" class="table table-hover table-striped table-bordered content_container" data-page-length="10">
                    <thead>
                    <tr>
                        <th>#Id</th>
                        <th>Sıra</th>
                        <th>Kullanıcı Adı</th>
                        <th>Ad Soyad</th>
                        <th data-orderable="false">E-posta</th>
                        <th data-orderable="true">Durumu</th>
                        <th class="w100">Tarih</th>
                        <th data-orderable="false">İşlem</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#Id</th>
                        <th>Sıra</th>
                        <th>Kullanıcı Adı</th>
                        <th>Ad Soyad</th>
                        <th>E-posta</th>
                        <th>Durumu</th>
                        <th>Tarih</th>
                        <th>İşlem</th>
                    </tr>
                    </tfoot>

                    <tbody data-url="<?php echo base_url("users/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr>
                                <td width="25" data-order="<?php echo $item->id; ?>" class="text-center">#<?php echo $item->id; ?></td>
                                <td width="25" class="text-center"></td>
                                <td style="font-size:14px; text-transform:lowercase;"><a href="<?php echo base_url("users/update_form/$item->id"); ?>"><?php echo $item->user_name; ?></a></td>
                                <td><?php echo $item->full_name; ?></td>
                                <td><?php echo $item->email; ?></td>
                                <td data-order="<?php echo $item->isActive; ?>" class="w100 text-center">
                                    <input
                                        data-url="<?php echo base_url("users/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td class="text-center" data-order="<?php echo strtotime($item->createdAt); ?>"><?php echo time_ago_in_cms($item->createdAt); ?></td>
                                <td class="text-center" width="260">
                                    <button
                                        data-url="<?php echo base_url("users/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("users/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                    <a href="<?php echo base_url("users/update_password_form/$item->id"); ?>" class="btn btn-sm btn-purple btn-outline"><i class="fa fa-key"></i> Şifre Değiştir</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>