<?php $params = App::getPageParams();?>

<!DOCTYPE html>
<?php loadPartial('head');?>

<body>
    <?php if(!$params['controller']->_hideHeader):?>
        <?php loadPartial('header', true);?>
    <?php endif;?>

    <div class="content">
        <?php loadPartial('messages');?>
        <?php loadView($params['template'], true);?>
    </div>

    <?php loadPartial('footer');?>
</body>