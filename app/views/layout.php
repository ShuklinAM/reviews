<!DOCTYPE html>
<html lang="en">
<?php loadPartial('head');?>

<body>
    <?php loadPartial('header');?>

    <div class="container">
        <?php loadPartial('messages');?>
        <?php if(!$template) {
            $params = App::getPageParams();
            $template = $params['template'];
            $form = $params['form'];
        }?>
        <?php loadView($template);?>
        <?php if($form):?>
            <?php loadView($form);?>
        <?php endif;?>
    </div>

    <?php loadPartial('footer');?>
</body>
</html>