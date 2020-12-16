<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:69:"E:\waibao\xgrx\public/../application/admin\view\information\edit.html";i:1607482286;s:57:"E:\waibao\xgrx\application\admin\view\layout\default.html";i:1602168705;s:54:"E:\waibao\xgrx\application\admin\view\common\meta.html";i:1602168705;s:56:"E:\waibao\xgrx\application\admin\view\common\script.html";i:1602168705;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">
<meta name="referrer" content="never">

<link rel="shortcut icon" href="/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<?php if(\think\Config::get('fastadmin.adminskin')): ?>
<link href="/assets/css/skins/<?php echo \think\Config::get('fastadmin.adminskin'); ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">
<?php endif; ?>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>

    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG && !\think\Config::get('fastadmin.multiplenav') && \think\Config::get('fastadmin.breadcrumb')): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <?php if($auth->check('dashboard')): ?>
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                    <?php endif; ?>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <form id="edit-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Province_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-province_id" data-rule="required" data-source="region/index" class="form-control selectpage" name="row[province_id]" type="text" value="<?php echo htmlentities($row['province_id']); ?>" data-params='{"custom[level]":"1"}'    onchange="set_next_input(this);">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('City_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-city_id" data-rule="required" data-source="region/index" class="form-control selectpage" name="row[city_id]" type="text" value="<?php echo htmlentities($row['city_id']); ?>" data-params='{"custom[level]":"2","custom[pid]":"<?php echo htmlentities($row['province_id']); ?>"}'>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Category_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-category_id" data-rule="required" data-source="category/selectpage" data-params='{"custom[type]":"information","custom[pid]":"0"}' class="form-control selectpage" name="row[category_id]" type="text" value="<?php echo htmlentities($row['category_id']); ?>" onchange="set_next_input_category(this);"  >
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Subcategory_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-subcategory_id" data-rule="required" data-source="category/selectpage"  class="form-control selectpage" name="row[subcategory_id]" type="text" value="<?php echo htmlentities($row['subcategory_id']); ?>" data-params='{"custom[type]":"information", "custom[pid]":"<?php echo htmlentities($row['category_id']); ?>"}'>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Title'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-title" class="form-control" name="row[title]" type="text" value="<?php echo htmlentities($row['title']); ?>"  >
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Maincontent'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea id="c-maincontent" class="form-control editor" rows="5" name="row[maincontent]" cols="50"><?php echo htmlentities($row['maincontent']); ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Images'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-images" class="form-control" size="50" name="row[images]" type="text" value="<?php echo htmlentities($row['images']); ?>">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="faupload-images" class="btn btn-danger faupload" data-input-id="c-images" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="true" data-preview-id="p-images"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-images" class="btn btn-primary fachoose" data-input-id="c-images" data-mimetype="image/*" data-multiple="true"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-images"></span>
            </div>
            <ul class="row list-inline faupload-preview" id="p-images"></ul>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Prescription'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-prescription" class="form-control" name="row[prescription]" type="number" value="<?php echo htmlentities($row['prescription']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Contacts_name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-contacts_name" data-rule="required" class="form-control" name="row[contacts_name]" type="text" value="<?php echo htmlentities($row['contacts_name']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Contacts_phone'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-contacts_phone" data-rule="required;mobile" class="form-control" name="row[contacts_phone]" type="text" value="<?php echo htmlentities($row['contacts_phone']); ?>" >
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Contacts_qq'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-contacts_qq" class="form-control" name="row[contacts_qq]" type="text" value="<?php echo htmlentities($row['contacts_qq']); ?>"  data-rule="qq">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Detailed_address'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-detailed_address" data-rule="required" class="form-control" name="row[detailed_address]" type="text" value="<?php echo htmlentities($row['detailed_address']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Read_number'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-read_number" data-rule="required" class="form-control" name="row[read_number]" type="number" value="<?php echo htmlentities($row['read_number']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Weigh'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-weigh" data-rule="required" class="form-control" name="row[weigh]" type="number" value="<?php echo htmlentities($row['weigh']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Update_password'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-update_password" class="form-control" name="row[update_password]" type="text" value="<?php echo htmlentities($row['update_password']); ?>">
        </div>
    </div>
    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version']); ?>"></script>
    </body>
</html>
