<?php $messages = App::getMessages();?>

<?php if($messages):?>
    <div>
        <ul>
            <?php foreach($messages as $message):?>
                <li class="<?php echo $message['type'];?>"><?php echo $message['message'];?></li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif;?>