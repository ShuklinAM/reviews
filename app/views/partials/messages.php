<?php $messages = App::getMessages();?>

<?php if($messages):?>
    <?php foreach($messages as $message):?>
        <div class="alert alert-<?php echo $message['type'];?>" role="alert"><?php echo $message['message'];?></div>
    <?php endforeach;?>
<?php endif;?>