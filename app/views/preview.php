<?php $params = App::getPageParams();?>
<?php $review = $params['controller']->getPreviewData();?>
<?php if($review):?>
    <table class="table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Review</th>
            <th>Date</th>
            <th>Change by admin</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo showImage($review['image'], Image::MAX_WIDTH, Image::MAX_HEIGHT, true);?></td>
                <td><?php echo $review['name'];?></td>
                <td><a href="mailto:<?php echo $review['email'];?>"><?php echo $review['email'];?></a></td>
                <td><?php echo $review['review'];?></td>
                <td><?php echo showDate(date('Y-m-d H:i:s'));?></td>
                <td><?php echo showBoolean(0);?></td>
            </tr>
        </tbody>
    </table>
<?php endif;?>