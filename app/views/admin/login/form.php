<form action="<?php echo App::getUrl('admin/login/login');?>" method="post" class="form-signin">
    <h2 class="form-signin-heading">Please sign in</h2>
    <label class="sr-only" for="inputEmail">Email address</label>
    <input id="inputEmail" name="login" class="form-control" type="text" autofocus="" required="" placeholder="Email address"/>
    <label class="sr-only" for="inputPassword">Password</label>
    <input id="inputPassword" class="form-control" type="password" required="" placeholder="Password" name="password"/>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>