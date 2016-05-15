<form action="<?php echo App::getUrl('admin/login/login');?>" method="post">
    <div>
        <label>Login</label>
        <input type="text" name="login"/>
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="password"/>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>