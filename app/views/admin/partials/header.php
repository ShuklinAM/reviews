<header>
    <ul>
        <li>
            <a href="<?php echo App::getUrl();?>">Home</a>
        </li>
        <li>
            <a href="<?php echo App::getUrl('admin');?>">Admin</a>
        </li>
        <li>
            <a href="<?php echo App::getUrl('admin/login/logout');?>">Logout</a>
        </li>
        <li>
            <label>Hello <?php echo Login::getLogin();?></label>
        </li>
    </ul>
</header>