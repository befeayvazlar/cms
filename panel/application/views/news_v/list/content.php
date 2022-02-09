<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Haberler
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("news/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <div class="m-b-xl">
                    <a href="<?php echo base_url("news/new_form"); ?>" class="btn btn-outline btn-primary btn-sm"> <i class="fa fa-plus"></i> Yeni Ekle</a>
                </div>

                    <table style="font-size:13px" id="dataTable" class="table table-hover table-striped table-bordered content_container" data-page-length="10">
                    <thead>
                    <tr>
                        <th data-orderable="false" class="order"><i class="fa fa-reorder"></i></th>
                        <th>Sıra</th>
                        <th>#Id</th>
                        <th>Başlık</th>
<!--                        <th data-orderable="false">url</th>-->
<!--                        <th>Açıklama</th>-->
                        <th>Haber Türü</th>
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
                        <th>Başlık</th>
<!--                        <th>url</th>-->
                        <!--                        <th>Açıklama</th>-->
                        <th>Haber Türü</th>
                        <th>Görsel</th>
                        <th>Durumu</th>
                        <th>Tarih</th>
                        <th>İşlem</th>
                    </tr>
                    </tfoot>

                    <tbody class="sortable" data-url="<?php echo base_url("news/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->id; ?>">
                                <td class="order"><i class="fa fa-reorder"></i></td>
                                <td width="25" class="text-center"></td>
                                <td width="25" data-order="<?php echo $item->id; ?>" class="text-center">#<?php echo $item->id; ?></td>
                                <td style="font-size:14px; text-transform:capitalize;"><a href="<?php echo base_url("news/update_form/$item->id"); ?>"><?php echo $item->title; ?></a></td>
<!--                                <td>--><?php //echo strtotime($item->createdAt); ?><!--</td>-->
<!--                                <td>--><?php //echo $item->url; ?><!--</td>-->
<!--                                <td>--><?php //echo $item->description; ?><!--</td>-->
                                <td class="w100 text-center"><?php echo ($item->news_type == "image") ? "resim" : "video"; ?></td>
                                <td width="75">
                                    <?php if($item->news_type == "image") { ?>

                                        <a href="<?php echo get_picture($viewFolder,$item->img_url, "513x289"); ?>" data-lightbox="<?php echo ($item->news_type == "image") ? "resim" : "video"; ?>" data-title="<?php echo $item->title; ?>">
                                            <img width="200" src="<?php echo get_picture($viewFolder,$item->img_url, "513x289"); ?>"
                                             alt=""
                                             class="img-rounded">
                                        </a>

                                    <?php } else if($item->news_type == "video") { ?>
	                                    <?php
	                                    $youtubeID = getYouTubeVideoId($item->video_url);
	                                    $thumbURL = "https://img.youtube.com/vi/" . $youtubeID . "/mqdefault.jpg";
	                                    ?>

                                    <a href="<?php echo $thumbURL; ?>" data-lightbox="<?php echo ($item->news_type == "image") ? "resim" : "video"; ?>" data-title="<?php echo $item->title; ?>">
                                        <img src="<?php echo $thumbURL; ?>" alt="" class="img-rounded img-responsive" width="150" />
                                    </a>

<!--                                        <div class="embed-responsive embed-responsive-16by9">-->
<!--                                            <iframe width="560" height="315" class="embed-responsive-item"-->
<!--                                                    src="https://www.youtube.com/embed/--><?php //echo $youtubeID; ?><!--"-->
<!--                                                    frameborder="0"-->
<!--                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"-->
<!--                                                    allowfullscreen>-->
<!---->
<!--                                            </iframe>-->
<!--                                        </div>-->
                                    <?php } ?>
                                </td>
                                <td data-order="<?php echo $item->isActive; ?>" class="w100 text-center">
                                    <input
                                        data-url="<?php echo base_url("news/isActiveSetter/$item->id"); ?>"
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
                                        data-url="<?php echo base_url("news/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("news/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>