<?php

class previewController
{
    public function indexAction()
    {
        App::setPageParams(null, $this);
        loadView('preview');
    }

    public function getPreviewData()
    {
        $review = array(
            'review'            => clearString(Req::post('review')),
            'name'              => clearString(Req::post('name')),
            'email'             => clearString(Req::post('email')),
        );

        require_once(APP_ROOT.'/app/libs/Image.php');
        $image = (isset($_FILES['image']['tmp_name'])) ? $_FILES['image']['tmp_name'] : false;

        if($image && ($_FILES['image']['type'] == 'image/jpeg' ||
                $_FILES['image']['type'] == 'image/png' ||
                $_FILES['image']['type'] == 'image/gif')) {
            $imageData = base64_encode(file_get_contents($image));
            $review['image'] = 'data:image/'.mime_content_type($image).';base64,'.$imageData;
        }

        if(!$review['name'] || !$review['email'] || !$review['review']) {
            App::addMessage(array('message' => 'Not all required fields were filled', 'type' => 'danger'));
            return false;
        }

        return $review;
    }
}