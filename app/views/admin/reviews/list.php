<?php $params = App::getPageParams();?>
<?php $reviews = $params['controller']->getReviews();?>
<div class="row grid">
    <table class="table table-striped">
        <caption>
            Reviews
        </caption>
        <?php if($reviews):?>
            <thead>
            <tr>
                <th><?php echo showSortBy('#', 'id');?></th>
                <th><?php echo showSortBy('Review', 'review');?></th>
                <th>Image</th>
                <th><?php echo showSortBy('Name', 'name');?></th>
                <th><?php echo showSortBy('Email', 'email');?></th>
                <th><?php echo showSortBy('Date', 'date');?></th>
                <th><?php echo showSortBy('Change by admin', 'admin_updated');?></th>
                <th><?php echo showSortBy('Published', 'admin_accepted');?></th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($reviews as $review):?>
                <tr>
                    <th scope="row"><?php echo $review['review_id'];?></th>
                    <td><?php echo cutString($review['review']);?></td>
                    <td><?php echo showImage($review['image']);?></td>
                    <td><?php echo $review['name'];?></td>
                    <td><a href="mailto:<?php echo $review['email'];?>"><?php echo $review['email'];?></a></td>
                    <td><?php echo showDate($review['date']);?></td>
                    <td><?php echo showBoolean($review['admin_updated']);?></td>
                    <td><?php echo showBoolean($review['admin_accepted']);?></td>
                    <td>
                        <a href="<?php echo App::getUrl('admin/index/edit?id='.$review['review_id']);?>">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="<?php echo App::getUrl('admin/index/delete?id='.$review['review_id']);?>"
                           onclick="return confirm('Delete review?');">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="8">
                    <?php echo pagination(App::getUrl('admin'), $params['controller']->getReviewsCount());?>
                </td>
            </tr>
            </tfoot>
        <?php else:?>
            <tr>
                <td>Reviews are not exist</td>
            </tr>
        <?php endif;?>
    </table>
</div>