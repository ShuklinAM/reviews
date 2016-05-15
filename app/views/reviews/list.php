<?php $params = App::getPageParams();?>
<?php $reviews = $params['controller']->getActiveReviews();?>

<h4>Reviews</h4>

<?php if($reviews):?>

    <div class="row grid reviews-list">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th><?php echo showSortBy('Name', 'name');?></th>
                    <th><?php echo showSortBy('Email', 'email');?></th>
                    <th><?php echo showSortBy('Review', 'review');?></th>
                    <th><?php echo showSortBy('Date', 'date');?></th>
                    <th><?php echo showSortBy('Change by admin', 'admin_updated');?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($reviews as $review):?>

                <tr>
                    <td><?php echo showImage($review['image']);?></td>
                    <td><?php echo $review['name'];?></td>
                    <td><a href="mailto:<?php echo $review['email'];?>"><?php echo $review['email'];?></a></td>
                    <td><?php echo $review['review'];?></td>
                    <td><?php echo showDate($review['date']);?></td>
                    <td><?php echo showBoolean($review['admin_updated']);?></td>
                </tr>

            <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6"><?php echo pagination(App::getUrl(), $params['controller']->getActiveReviewsCount());?></td>
                </tr>
            </tfoot>
        </table>
    </div>

<?php else:?>
    <p><strong>Reviews are not exist</strong></p>
<?php endif;?>