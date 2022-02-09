<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Galeriler
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("galleries/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <div class="m-b-xl">
                    <a href="<?php echo base_url("galleries/new_form"); ?>" class="btn btn-outline btn-primary btn-sm"> <i class="fa fa-plus"></i> Yeni Ekle</a>
                </div>

                    <table style="font-size:13px" id="dataTable" class="table table-hover table-striped table-bordered content_container" data-page-length="10">
                    <thead>
                    <tr>
                        <th data-orderable="false" class="order"><i class="fa fa-reorder"></i></th>
                        <th>Sıra</th>
                        <th>#Id</th>
                        <th>Galeri Adı</th>
                        <th>Galeri Türü</th>
                        <th>Klasör Adı</th>
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
                        <th>Galeri Adı</th>
                        <th>Galeri Türü</th>
                        <th>Klasör Adı</th>
                        <th>Durumu</th>
                        <th>Tarih</th>
                        <th>İşlem</th>
                    </tr>
                    </tfoot>

                    <tbody class="sortable" data-url="<?php echo base_url("galleries/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->id; ?>">
                                <td class="order"><i class="fa fa-reorder"></i></td>
                                <td width="25" class="text-center"></td>
                                <td width="25" data-order="<?php echo $item->id; ?>" class="text-center">#<?php echo $item->id; ?></td>
                                <td style="font-size:14px; text-transform:capitalize;"><a href="<?php echo base_url("galleries/update_form/$item->id"); ?>"><?php echo $item->title; ?></a></td>
                                <td class="w100 text-center">
                                    <?php
                                    if ($item->gallery_type == "image"){
                                        echo "resim";
                                    }
                                    else if ($item->gallery_type == "file") {
                                        echo "dosya";
                                    }
                                    else {
                                        echo "video";
                                    } ?>
                                </td>
                                <td class="w175 text-center" data-orderable="false"><?php echo $item->folder_name; ?></td>
                                <td data-order="<?php echo $item->isActive; ?>" class="w100 text-center">
                                    <input
                                        data-url="<?php echo base_url("galleries/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td class="text-center" data-order="<?php echo strtotime($item->createdAt); ?>"><?php echo time_ago_in_cms($item->createdAt); ?></td>
                                <td class="text-center" width="270">
                                    <button
                                        data-url="<?php echo base_url("galleries/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>

	                                <?php
	                                if ($item->gallery_type == "image"){
		                                $button_icon =  "fa-image";
		                                $button_url = "galleries/upload_form/$item->id";
	                                }
	                                else if ($item->gallery_type == "file") {
		                                $button_icon = "fa-folder";
		                                $button_url = "galleries/upload_form/$item->id";
	                                }
	                                else {
		                                $button_icon = "fa-play-circle-o";
		                                $button_url = "galleries/gallery_video_list/$item->id";
	                                }
	                                ?>

                                    <a href="<?php echo base_url("galleries/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                    <a href="<?php echo base_url($button_url); ?>" class="btn btn-sm btn-dark btn-outline"><i class="fa <?php echo $button_icon; ?>"></i> Galeriye Gözat</a>

                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>