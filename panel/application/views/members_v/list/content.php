<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Aboneler
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır.</p>
                </div>

            <?php } else { ?>

                    <table style="font-size:13px;width:100%;" id="def-dataTable" class="def-dt table table-hover table-striped table-bordered content_container" data-page-length="10">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>E-Posta</th>
                        <th>IP</th>
                        <th>Tarih</th>
                        <th data-orderable="false" class="w50">İşlem</th>
                    </tr>
                    </thead>

                    <tbody>

                        <?php foreach($items as $item) { ?>

                            <tr>
                                <td data-order="<?php echo $item->id; ?>"><?php echo $item->id; ?></td>
                                <td><?php echo $item->email; ?></td>
                                <td><?php echo $item->ip_address; ?></td>
                                <td data-order="<?php echo strtotime($item->createdAt); ?>"><?php echo tr_tarih($item->createdAt); ?></td>
                                <td class="text-center">
                                    <?php if(isAllowedDeleteModule()){ ?>
                                        <button
                                            data-url="<?php echo base_url("members/delete/$item->id"); ?>"
                                            class="btn btn-sm btn-danger btn-outline remove-btn">
                                            <i class="fa fa-trash"></i> Sil
                                        </button>
                                    <?php } ?>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>