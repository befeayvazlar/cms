<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Kullanıcı Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("users/save"); ?>" method="post">
                    <div class="form-group">
                        <label>Kullanıcı Adı</label>
                        <input class="form-control" placeholder="Kullanıcı adı giriniz" name="user_name" value="<?php echo isset($form_error) ? set_value("user_name") : ""; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("user_name"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Ad Soyad</label>
                        <input class="form-control" placeholder="Ad Soyad giriniz" name="full_name" value="<?php echo isset($form_error) ? set_value("full_name") : ""; ?>">
		                <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("full_name"); ?></small>
		                <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>E-posta</label>
                        <input type="email" class="form-control" placeholder="E-posta adresi giriniz" name="email" value="<?php echo isset($form_error) ? set_value("email") : ""; ?>">
		                <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("email"); ?></small>
		                <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Kullanıcı Rolü</label>
                        <select name="user_role_id" class="form-control">
                            <?php foreach($user_roles as $user_role) { ?>
                                <option value="<?php echo $user_role->id; ?>"><?php echo $user_role->title; ?></option>
                            <?php } ?>
                        </select>
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("user_role_id"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Şifre</label>
                        <input type="password" class="form-control" placeholder="Şifre" name="password">
		                <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("password"); ?></small>
		                <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Şifre Tekrar</label>
                        <input type="password" class="form-control" placeholder="Şifre Tekrar" name="re_password">
		                <?php if(isset($form_error)){ ?>
                            <small class="input-form-error"> <?php echo form_error("re_password"); ?></small>
		                <?php } ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("users"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>