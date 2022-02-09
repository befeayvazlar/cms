<?php $user = get_active_user(); ?>
<aside id="menubar" class="menubar light">
    <div class="app-user">
        <div class="media">
            <div class="media-left">
                <div class="avatar avatar-md avatar-circle">
                    <a href="javascript:void(0)"><img class="img-responsive" src="<?php echo base_url("assets"); ?>/assets/images/avatar.jpg" alt="avatar"/></a>
                </div><!-- .avatar -->
            </div>
            <div class="media-body">
                <div class="foldable">
                    <h5><a href="javascript:void(0)" class="username"><?php echo $user->full_name; ?></a></h5>
                    <ul>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <small>İşlemler</small>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li>
                                    <a class="text-color" href="<?php echo base_url(); ?>">
                                        <span class="m-r-xs"><i class="fa fa-home"></i></span>
                                        <span>Anasayfa</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("users/update_form/$user->id"); ?>">
                                        <span class="m-r-xs"><i class="fa fa-user"></i></span>
                                        <span>Profilim</span>
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("logout"); ?>">
                                        <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        <span>Çıkış</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- .media-body -->
        </div><!-- .media -->
    </div><!-- .app-user -->

    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">

                <?php if(isAllowedViewModule("dashboard")) { ?>
                    <li class="<?=($this->uri->segment(1)==='dashboard')?'active':''?>">
                        <a href="<?php echo base_url("dashboard"); ?>">
                            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isAllowedViewModule("settings")) { ?>
                    <li class="<?=($this->uri->segment(1)==='settings')?'active':''?>">
                        <a href="<?php echo base_url("settings"); ?>">
                            <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                            <span class="menu-text">Ayarlar</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isAllowedViewModule("menu")) { ?>
                    <li class="<?=($this->uri->segment(1)==='menu')?'active':''?>">
                        <a href="<?php echo base_url("menu"); ?>">
                            <i class="menu-icon zmdi zmdi-menu zmdi-hc-lg"></i>
                            <span class="menu-text">Menü</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isAllowedViewModule("emailsettings")) { ?>
                    <li class="<?=($this->uri->segment(1)==='emailsettings')?'active':''?>">
                        <a href="<?php echo base_url("emailsettings"); ?>">
                            <i class="menu-icon zmdi zmdi-email zmdi-hc-lg"></i>
                            <span class="menu-text">E-posta Ayarları</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isAllowedViewModule("galleries")) { ?>
                    <li class="<?=($this->uri->segment(1)==='galleries')?'active':''?>">
                        <a href="<?php echo base_url("galleries"); ?>">
                            <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                            <span class="menu-text">Galeriler</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isAllowedViewModule("slides")) { ?>
                    <li class="<?=($this->uri->segment(1)==='slides')?'active':''?>">
                        <a href="<?php echo base_url("slides"); ?>">
                            <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                            <span class="menu-text">Slider</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isAllowedViewModule("product")) { ?>
                    <li class="<?=($this->uri->segment(1)==='product')?'active':''?>">
                        <a href="<?php echo base_url("product"); ?>">
                            <i class="menu-icon fa fa-cubes"></i>
                            <span class="menu-text">Ürünler</span>
                            <?php if((getCountTable("products")) > 0) { ?>
                                <span class="label label-warning menu-label"><?php echo getCountTable("products"); ?></span>
                            <?php } ?>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isAllowedViewModule("services")) { ?>
                    <li class="<?=($this->uri->segment(1)==='services')?'active':''?>">
                        <a href="<?php echo base_url("services"); ?>">
                            <i class="menu-icon zmdi zmdi-assignment-check zmdi-hc-lg"></i>
                            <span class="menu-text">Hizmetler</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isAllowedViewModule("portfolio_categories") && (isAllowedViewModule("portfolio"))) { ?>
                    <li class="has-submenu <?= ($this->uri->segment(1)==='portfolio_categories' || $this->uri->segment(1)==='portfolio') ? 'open' : '' ?>">
                        <a href="javascript:void(0)" class="submenu-toggle">
                            <i class="menu-icon zmdi zmdi-collection-image zmdi-hc-lg"></i>
                            <span class="menu-text">Portfolyo İşlemleri</span>
                            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                        </a>
                        <ul class="submenu" style="<?= ($this->uri->segment(1)==='portfolio_categories' || $this->uri->segment(1)==='portfolio') ? 'display:block;' : '' ?>">
                            <li class="<?=($this->uri->segment(1)==='portfolio_categories')?'active':''?>"><a href="<?php echo base_url("portfolio_categories"); ?>"><span class="menu-text">Portfolyo Kategorileri</span></a></li>
                            <li class="<?=($this->uri->segment(1)==='portfolio')?'active':''?>"><a href="<?php echo base_url("portfolio"); ?>"><span class="menu-text">Portfolyo</span></a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if(isAllowedViewModule("news")) { ?>
                    <li class="<?=($this->uri->segment(1)==='news')?'active':''?>">
                        <a href="<?php echo base_url("news"); ?>">
                            <i class="menu-icon fa fa-newspaper-o"></i>
                            <span class="menu-text">Haberler</span>
                            <?php if((getCountTable("news")) > 0) { ?>
                                <span class="label label-warning menu-label"><?php echo getCountTable("news"); ?></span>
                            <?php } ?>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isAllowedViewModule("courses")) { ?>
                    <li class="<?=($this->uri->segment(1)==='courses')?'active':''?>">
                        <a href="<?php echo base_url("courses"); ?>">
                            <i class="menu-icon fa fa-calendar"></i>
                            <span class="menu-text">Eğitimler</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isAllowedViewModule("references")) { ?>
                    <li class="<?=($this->uri->segment(1)==='references')?'active':''?>">
                        <a href="<?php echo base_url("references"); ?>">
                            <i class="menu-icon zmdi zmdi-check zmdi-hc-lg"></i>
                            <span class="menu-text">Referanslar</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isAllowedViewModule("brands")) { ?>
                    <li class="<?=($this->uri->segment(1)==='brands')?'active':''?>">
                        <a href="<?php echo base_url("brands"); ?>">
                            <i class="menu-icon zmdi zmdi-puzzle-piece zmdi-hc-lg"></i>
                            <span class="menu-text">Markalar</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isAllowedViewModule("user_roles")) { ?>
                    <li class="<?=($this->uri->segment(1)==='user_roles')?'active':''?>">
                        <a href="<?php echo base_url("user_roles"); ?>">
                            <i class="menu-icon fa fa-user-times"></i>
                            <span class="menu-text">Kullanıcı Rolleri</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isAllowedViewModule("users")) { ?>
                    <li class="<?=($this->uri->segment(1)==='users')?'active':''?>">
                        <a href="<?php echo base_url("users"); ?>">
                            <i class="menu-icon fa fa-user-secret"></i>
                            <span class="menu-text">Kullanıcılar</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isAllowedViewModule("members")) { ?>
                    <li class="<?=($this->uri->segment(1)==='members')?'active':''?>">
                        <a href="<?php echo base_url("members"); ?>">
                            <i class="menu-icon fa fa-users"></i>
                            <span class="menu-text">Aboneler</span>
                            <?php if((getCountTable("members")) > 0) { ?>
                                <span class="label label-warning menu-label"><?php echo getCountTable("members"); ?></span>
                            <?php } ?>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isAllowedViewModule("testimonials")) { ?>
                    <li class="<?=($this->uri->segment(1)==='testimonials')?'active':''?>">
                        <a href="<?php echo base_url("testimonials"); ?>">
                            <i class="menu-icon fa fa-commenting"></i>
                            <span class="menu-text">Ziyaretçi Notları</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isAllowedViewModule("popups")) { ?>
                    <li class="<?=($this->uri->segment(1)==='popups')?'active':''?>">
                        <a href="<?php echo base_url("popups");?>">
                            <i class="menu-icon zmdi zmdi-lamp zmdi-hc-lg"></i>
                            <span class="menu-text">Popup Hizmeti</span>
                        </a>
                    </li>
                <?php } ?>

                <?php if(isAllowedViewModule("reports")) { ?>
                    <li class="<?=($this->uri->segment(1)==='reports')?'active':''?>">
                        <a href="<?php echo base_url("reports");?>">
                            <i class="menu-icon zmdi zmdi-chart zmdi-hc-lg"></i>
                            <span class="menu-text">Raporlar</span>
                            <?php if((getCountTable("logs")) > 0) { ?>
                                <span class="label label-info menu-label"><?php echo getCountTable("logs"); ?></span>
                            <?php } ?>
                        </a>
                    </li>
                <?php } ?>

                <li>
                    <a href="documentation.html">
                        <i class="menu-icon zmdi zmdi-view-web zmdi-hc-lg"></i>
                        <span class="menu-text">Ana Sayfa</span>
                    </a>
                </li>

            </ul><!-- .app-menu -->
        </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
</aside>