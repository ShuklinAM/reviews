<?php

class IndexController
{
    public function __construct()
    {
        Login::checkLogin();
        require_once(APP_ROOT.'/app/models/reviews.php');
    }

    public function indexAction()
    {
        App::setPageParams('reviews/list', $this);
        loadView('layout', true);
    }

    public function editAction()
    {
        App::setPageParams('reviews/form', $this);
        loadView('layout', true);
    }

    public function updateAction()
    {

    }

    public function deleteAction()
    {
        $reviewId = Req::get('id');
        if($reviewId) {
            $model = new reviewsModel();

            $review = $model->getReview($reviewId);
            if($review['image']) {
                unlink(APP_ROOT.'/images/'.$review['image']);
            }

            $model->deleteReview($reviewId);

            App::addMessage(array('message' => 'Review successfully deleted', 'type' => 'success'));
        }

        return App::redirect('admin');
    }

    public function getReviews()
    {
        $model = new reviewsModel();

        $page = Req::get('p') ? Req::get('p') - 1 : 0;
        $limit = Req::get('limit') ? Req::get('limit') : reviewsModel::LIMIT;
        $start = $page * $limit;

        $sortField = Req::get('sort') ? Req::get('sort') : 'date';
        $sortDir = Req::get('dir') ? Req::get('dir') : 'DESC';
        $sort = $sortField.' '.$sortDir;

        return $model->getReviews($start, $limit, $sort);
    }

    public function getReviewsCount()
    {
        $model = new reviewsModel();
        return $model->getReviewsCount();
    }
}