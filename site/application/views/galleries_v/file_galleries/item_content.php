<?php $settings = get_settings(); ?>
<section class="main-container">
    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-12">

                <!-- page-title start -->
                <!-- ================ -->
                <h1 class="page-title"><?php echo $gallery->title;?></h1>
                <div class="separator-2"></div>
                <div class="row grid-space-20">

                <?php if(!empty($files)){ ?>


                        <div class="col-md-12 mb-20">
                            <table class="table table-striped table-hover table-colored table-bordered">
                                <thead>
                                    <th>Dosya Adı</th>
                                    <th style="width:100px;">İndir</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($files as $file) { ?>
                                        <tr>
                                            <td><?php echo $file->url; ?></td>
                                            <td><a target="_blank" href="<?php echo base_url("panel/uploads/galleries_v/files/$gallery->folder_name/$file->url"); ?>" download="<?php echo $settings->company_name.'-'. $file->url; ?>" class="btn btn-animated btn-default"><i class="pl-10 fa fa-download"></i> İndir</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    <?php } else { ?>
                        <div class="col-md-12">
                            <div class="alert alert-warning text-center">
                                Malesef burada bir veri bulunamadı!
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-md-12">
                        <a href="<?php echo base_url("video-galerisi"); ?>" class="btn btn-default">
                            <i class="fa fa-arrow-left"></i> Geri Dön</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>