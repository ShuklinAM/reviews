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
        $review = array(
            'review_id'         => (int)Req::get('id'),
            'review'            => clearString(Req::post('review')),
            'name'              => clearString(Req::post('name')),
            'email'             => clearString(Req::post('email')),
            'admin_accepted'    => (int)Req::post('admin_accepted'),
        );

        if(!$review['review_id']) {
            return App::redirect('admin');
        }

        if(!$review['review'] || !$review['name'] || !$review['email']) {
            App::addMessage(array('message' => 'Not all review fields were filled', 'type' => 'error'));
            return App::redirect('admin/index/edit?id='.$review['review_id']);
        }

        $model = new reviewsModel();
        $result = $model->updateReview($review);

        if(!$result) {
            return App::redirect('admin');
        }

        App::addMessage(array('message' => 'Review successfully updated', 'type' => 'success'));
        return App::redirect('admin/index/edit?id='.$review['review_id']);
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

    public function getReview()
    {
        $reviewId = Req::get('id');
        if($reviewId) {
            $model = new reviewsModel();
            $review = $model->getReview($reviewId);

            if($review) {
                return $review;
            }
        }

        return App::redirect('admin');
    }
}