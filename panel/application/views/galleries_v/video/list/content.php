<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$gallery->title</b> galerisine ait videolar"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("galleries/new_gallery_video_form/$gallery->id"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <div class="m-b-xl">
                    <a href="<?php echo base_url("galleries/new_gallery_video_form/$gallery->id"); ?>" class="btn btn-outline btn-primary btn-sm"> <i class="fa fa-plus"></i> Yeni Ekle</a>
                </div>

                    <table style="font-size:13px" id="dataTable" class="table table-hover table-striped table-bordered content_container" data-page-length="10">
                    <thead>
                    <tr>
                        <th data-orderable="false" class="order"><i class="fa fa-reorder"></i></th>
                        <th>Sıra</th>
                        <th>#Id</th>
                        <th>Url</th>
                        <th data-orderable="false">Görsel</th>
                        <th data-orderable="true">Durumu</th>
                        <th class="w100">Tarih</th>
                        <th data-orderable="false">İşlem</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th class="order"><i class="fa fa-reorder"></i></th>
                        <th>Sıra</th>
                        <th>#Id</th>
                        <th>Url</th>
                        <th>Görsel</th>
                        <th>Durumu</th>
                        <th>Tarih</th>
                        <th>İşlem</th>
                    </tr>
                    </tfoot>

                    <tbody class="sortable" data-url="<?php echo base_url("galleries/galleryVideoRankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->id; ?>">
                                <td class="order"><i class="fa fa-reorder"></i></td>
                                <td width="25" class="text-center"></td>
                                <td width="25" data-order="<?php echo $item->id; ?>" class="text-center">#<?php echo $item->id; ?></td>
                                <td class="text-center"><?php echo $item->url; ?></td>
                                <td width="250">

                                    <?php
                                        $youtubeID = getYouTubeVideoId($item->url);
                                        $thumbURL = "https://img.youtube.com/vi/" . $youtubeID . "/mqdefault.jpg";
                                    ?>

                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe width="560" height="315" class="embed-responsive-item"
                                                    src="https://www.youtube.com/embed/<?php echo $youtubeID; ?>"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen>
                                            </iframe>
                                        </div>
                                </td>
                                <td data-order="<?php echo $item->isActive; ?>" class="w100 text-center">
                                    <input
                                        data-url="<?php echo base_url("galleries/galleryVideoIsActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td class="text-center" data-order="<?php echo strtotime($item->createdAt); ?>"><?php echo time_ago_in_cms($item->createdAt); ?></td>
                                <td class="text-center" width="175">
                                    <button
                                        data-url="<?php echo base_url("galleries/galleryVideoDelete/$item->id/$item->gallery_id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("galleries/update_gallery_video_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>