<div class="col-xs-4">
    <form role="form" action="<?php echo App::getUrl('index/add');?>" method="post">
        <h4 class="form-signin-heading">Add review</h4>
        <div class="form-group col-xs-12">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control"/>
        </div>
        <div class="form-group col-xs-12">
            <label for="name">Name</label>
            <input type="text" required="" id="name" name="name" class="form-control" placeholder="Name"/>
        </div>
        <div class="form-group col-xs-12">
            <label for="email">Email</label>
            <input type="email" required="" id="email" name="email" class="form-control" placeholder="Email"/>
        </div>
        <div class="form-group col-xs-12">
            <label for="review">Review</label>
            <textarea name="review" required="" id="review" placeholder="Review" class="form-control"></textarea>
        </div>
        <div class="form-group col-xs-3">
            <button type="submit" class="btn btn-default">Add</button>
        </div>
        <div class="form-group col-xs-3">
            <a href="javascript:void(0)" onclick="previewReview();" class="btn btn-default">Preview</a>
        </div>
    </form>
</div>