<div role="tabpanel" class="tab-pane fade" id="tab-7">

    <div class="row">

        <div class="col-md-2 text-center">

            <img src="<?php echo get_picture($viewFolder,$item->logo, "150x35"); ?>" alt="<?php echo $item->company_name; ?>" class="img-responsive img-thumbnail p-sm">

        </div>

        <div class="form-group col-md-6">
            <label>Masaüstü Logo Seçimi</label>
            <input type="file" name="logo" class="form-control">
        </div>

    </div>
    <div class="row">

        <div class="col-md-2 text-center">

            <img src="<?php echo get_picture($viewFolder,$item->mobile_logo, "300x70"); ?>" alt="<?php echo $item->company_name; ?>" class="img-responsive img-thumbnail p-sm">

        </div>

        <div class="form-group col-md-6">
            <label>Mobil Logo Seçimi</label>
            <input type="file" name="mobile_logo" class="form-control">
        </div>

    </div>
    <div class="row">

        <div class="col-md-2 text-center">

            <img src="<?php echo get_picture($viewFolder,$item->favicon, "32x32"); ?>" alt="<?php echo $item->company_name; ?>" class="img-responsive img-thumbnail p-sm">

        </div>

        <div class="form-group col-md-6">
            <label>Favicon Logo Seçimi</label>
            <input type="file" name="favicon" class="form-control">
        </div>

    </div>

</div><!-- .tab-pane  -->