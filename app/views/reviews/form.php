<div class="col-xs-6">
    <form id="review-form" data-toggle="validator" role="form" action="<?php echo App::getUrl('index/add');?>" method="post" enctype="multipart/form-data">
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
            <a href="javascript:void(0)" onclick="preview();" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></a>
        </div>
    </form>
</div>

<div id="modal-preview" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Preview</h4>
            </div>
            <div class="modal-body"><div id="preview-content"></div></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function preview() {
        var form = $('#review-form');

        form.ajaxSubmit({
            url: '<?php echo App::getUrl('preview');?>',
            type: 'post',
            beforeSubmit: function() {
                form.validator('validate');
                if (form.find('div').hasClass('has-error') ||
                    form.find('div').hasClass('has-danger')) {
                    return false;
                } else {
                    return true;
                }
            },
            success: function(response) {
                $('#modal-preview #preview-content').html(response);
                $('#modal-preview').modal('show');
            }
        })
    }
</script>