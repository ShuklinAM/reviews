<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                <span class="sr-only">Show menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" style="height: 1px;">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo App::getUrl();?>">Home</a>
                </li>
                <li class="active">
                    <a href="<?php echo App::getUrl('admin');?>">Admin</a>
                </li>
                <li>
                    <a href="<?php echo App::getUrl('admin/login/logout');?>">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>