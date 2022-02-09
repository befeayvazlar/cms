<?php $permisssions = json_decode($item->permissions); ?>
<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->title</b> rolünün yetkilerini değiştiriyorsunuz"; ?>
            <div class="pull-right">Hepsini Seç <input id="selectAllPermissions" class="pull-right" type="checkbox" data-switchery data-color="#10c469"/></div>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("user_roles/update_permissions/$item->id"); ?>" method="post">
                    <table class="table table-bordered table-striped table-hover m-b-xl">
                        <thead>
                            <th>Modül Adı</th>
                            <th class="w50">Görüntüleme</th>
                            <th class="w50">Ekleme</th>
                            <th class="w50">Düzenleme</th>
                            <th class="w50">Silme</th>
                        </thead>
                        <tbody>
                            <?php foreach (getControllerList() as $controllerName) { ?>
                                <tr>
                                    <td><?php echo $controllerName; ?></td>
                                    <td class="w50 text-center"><input class="isActive"
                                                                       <?php echo (isset($permisssions->$controllerName) && isset($permisssions->$controllerName->read)) ? "checked" : ""; ?>
                                                                       name="permissions[<?php echo $controllerName; ?>][read]" type="checkbox" data-switchery data-color="#10c469"/></td>
                                    <td class="w50 text-center"><input class="isActive"
                                                                       <?php echo (isset($permisssions->$controllerName) && isset($permisssions->$controllerName->write)) ? "checked" : ""; ?>
                                                                       name="permissions[<?php echo $controllerName; ?>][write]" type="checkbox" data-switchery data-color="#10c469"/></td>
                                    <td class="w50 text-center"><input class="isActive"
                                                                       <?php echo (isset($permisssions->$controllerName) && isset($permisssions->$controllerName->update)) ? "checked" : ""; ?>
                                                                       name="permissions[<?php echo $controllerName; ?>][update]" type="checkbox" data-switchery data-color="#10c469"/></td>
                                    <td class="w50 text-center"><input class="isActive"
                                                                       <?php echo (isset($permisssions->$controllerName) && isset($permisssions->$controllerName->delete)) ? "checked" : ""; ?>
                                                                       name="permissions[<?php echo $controllerName; ?>][delete]" type="checkbox" data-switchery data-color="#10c469"/></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("user_roles"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>