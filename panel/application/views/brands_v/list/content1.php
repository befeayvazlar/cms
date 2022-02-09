<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Markalar1
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("brands/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>
                <?php if(isAllowedWriteModule()){ ?>
                    <div class="m-b-xl">
                        <a href="<?php echo base_url("brands/new_form"); ?>" class="btn btn-outline btn-primary btn-sm"> <i class="fa fa-plus"></i> Yeni Ekle</a>
                    </div>
                <?php } ?>

                    <table width="100%" id="SS_dataTable" class="def-dt table table-hover table-striped table-bordered content_container">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th class="w50 text-center">Durum</th>
                        <th>Tarih</th>
                        <th class="w150 text-center">İşlem</th>
                    </tr>
                    </thead>
                        <tbody class="sortable" data-url="<?php echo base_url("courses/rankSetter"); ?>">

                        </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>