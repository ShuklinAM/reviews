<?php $params = App::getPageParams();?>
<?php $review = $params['controller']->getReview();?>
<div class="col-xs-6">
    <form role="form" data-toggle="validator" action="<?php echo App::getUrl('admin/index/update/?id='.$review['review_id']);?>" method="post">
        <h4 class="form-signin-heading">Edit review</h4>
        <div class="form-group col-xs-12">
            <label for="image">User image</label>
            <?php echo showImage($review['image']);?>
        </div>
        <div class="form-group col-xs-6">
            <label for="name">User name</label>
            <input type="text" required="" id="name" name="name" class="form-control" placeholder="Name" value="<?php echo $review['name'];?>"/>
        </div>
        <div class="form-group col-xs-6">
            <label for="email">User email</label>
            <input type="email" required="" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo $review['email'];?>"/>
        </div>
        <div class="form-group col-xs-6">
            <label for="review">Review</label>
            <textarea name="review" required="" id="review" placeholder="Review" class="form-control"><?php echo $review['review'];?></textarea>
        </div>
        <div class="form-group col-xs-3">
            <label for="admin_accepted">Published</label>
            <input type="checkbox" id="admin_accepted" name="admin_accepted" value="1" class="form-control" <?php if($review['admin_accepted']):?>checked<?php endif;?>/>
        </div>
        <div class="form-group col-xs-3">
            <label>Change by admin</label>
            <?php echo showBoolean($review['admin_updated']);?>
        </div>
        <div class="form-group col-xs-3">
            <label>Last date</label>
            <?php echo showDate($review['date']);?>
        </div>
        <div class="form-group col-xs-3">
            <button type="submit" class="btn btn-default">Update</button>
        </div>
        <div class="form-group col-xs-6">
            <a href="<?php echo App::getUrl('admin/index/delete?id='.$review['review_id']);?>"
               onclick="return confirm('Delete review?');" class="btn btn-default">Delete</a>
        </div>
    </form>
</div>