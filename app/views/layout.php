<!DOCTYPE html>
<?php loadPartial('head');?>

<body>
    <?php loadPartial('header');?>

    <div class="content">
        <?php loadPartial('messages');?>
        <?php if(!$template) {
            $params = App::getPageParams();
            $template = $params['template'];
        }?>
        <?php loadView($template);?>
    </div>

    <?php loadPartial('footer');?>
</body>