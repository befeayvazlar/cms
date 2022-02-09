<div class="simple-page-wrap">
    <div class="simple-page-logo animated swing">
        <a href="<?php echo base_url(); ?>">
            <span><i class="fa fa-gg"></i></span>
            <span>Deal Creative CMS</span>
        </a>
    </div><!-- logo -->
    <div class="simple-page-form animated flipInY" id="login-form">
        <form action="<?php echo base_url("userop/do_login"); ?>" method="post">
            <div class="form-group">
                <input id="sign-in-email" type="email" class="form-control" placeholder="Email" name="user_email">
	            <?php if(isset($form_error)){ ?>
                    <small class="input-form-error"> <?php echo form_error("user_email"); ?></small>
	            <?php } ?>
            </div>

            <div class="form-group">
                <input id="sign-in-password" type="password" class="form-control" placeholder="Şifre" name="user_password">
	            <?php if(isset($form_error)){ ?>
                    <small class="input-form-error"> <?php echo form_error("user_password"); ?></small>
	            <?php } ?>
            </div>

            <div class="form-group m-b-xl">
                <div class="checkbox checkbox-primary">
                    <input type="checkbox" id="keep_me_logged_in"/>
                    <label for="keep_me_logged_in">Keep me signed in</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">GİRİŞ YAP</button>
        </form>
    </div><!-- #login-form -->

    <div class="simple-page-footer">
        <p><a href="<?php echo base_url("forget-password") ;?>"><i class="fa fa-lock m-r-5"></i> Şifremi Unuttum?</a></p>
    </div><!-- .simple-page-footer -->


</div><!-- .simple-page-wrap -->