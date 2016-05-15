<?php

class IndexController
{
    protected $_model;

    public function __construct()
    {
        require_once(APP_ROOT.'/app/models/reviews.php');

        $this->_model = new reviewsModel();
    }

    public function indexAction()
    {
        App::setPageParams('reviews/list', $this, 'reviews/form');
        loadView('layout');
    }

    public function addAction()
    {
        $review = array(
            'review'            => clearString(Req::post('review')),
            'name'              => clearString(Req::post('name')),
            'email'             => clearString(Req::post('email')),
        );

        if(!$review['review'] || !$review['name'] || !$review['email']) {
            App::addMessage(array('message' => 'Not all review fields were filled', 'type' => 'danger'));
            return App::redirect();
        }

        if(isset($_FILES['image']['name'])) {
            require_once(APP_ROOT.'/app/libs/Image.php');

            if($imageName = Image::saveResizeImage()) {
                $review['image'] = $imageName;
            } else {
                App::addMessage(array('message' => 'File is not an image or it is too large', 'type' => 'danger'));
            }
        }

        $this->_model->addReview($review);

        App::addMessage(array('message' => 'Review successfully added, admin will check it and then it will be shown', 'type' => 'success'));
        return App::redirect();
    }

    public function getActiveReviewsCount()
    {
        return $this->_model->getActiveReviewsCount();
    }

    public function getActiveReviews()
    {
        $page = Req::get('p') ? Req::get('p') - 1 : 0;
        $limit = Req::get('limit') ? Req::get('limit') : reviewsModel::LIMIT;
        $start = $page * $limit;

        $sortField = Req::get('sort') ? Req::get('sort') : 'date';
        $sortDir = Req::get('dir') ? Req::get('dir') : 'DESC';
        $sort = $sortField.' '.$sortDir;

        return $this->_model->getActiveReviews($start, $limit, $sort);
    }
}