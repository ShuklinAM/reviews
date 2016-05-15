<?php

class reviewsModel
{
    protected $_table = 'reviews';

    const LIMIT = 10;

    public function getReview($reviewId)
    {
        return Db::getRowWhere($this->_table, array('review_id' => $reviewId));
    }

    public function getActiveReviews($start = 0, $limit = 10, $sort = 'date DESC')
    {
        $condition = array('admin_accepted' => 1);
        return Db::getRowsWhere($this->_table, $condition, array('start' => $start, 'limit' => $limit), $sort);
    }

    public function getReviews($start = 0, $limit = 10, $sort = 'date DESC')
    {
        return Db::getRowsWhere($this->_table, null, array('start' => $start, 'limit' => $limit), $sort);
    }

    public function getReviewsCount()
    {
        return Db::getRowsCount($this->_table);
    }

    public function getActiveReviewsCount()
    {
        $condition = array('admin_accepted' => 1);
        return Db::getRowsCount($this->_table, $condition);
    }

    public function deleteReview($id)
    {
        Db::deleteRow($this->_table, array('review_id' => $id));
    }

    public function updateReview($review)
    {
        $prevReview = $this->getReview($review['review_id']);

        if(!$prevReview) {
            return false;
        }

        if($prevReview['name'] != $review['name'] ||
            $prevReview['email'] != $review['email'] ||
            $prevReview['review'] != $review['review']) {
            $review['admin_updated'] = 1;
        }

        $review['date'] = date('Y-m-d H:i:s');
        unset($review['review_id']);
        Db::updateRow($this->_table, array('review_id' => $prevReview['review_id']), $review);

        return true;
    }

    public function addReview($review)
    {
        $review['date'] = date('Y-m-d H:i:s');
        Db::addRow($this->_table, $review);
    }
}