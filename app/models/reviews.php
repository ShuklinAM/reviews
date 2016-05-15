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

    public function deleteReview($id)
    {
        Db::deleteRow($this->_table, array('review_id' => $id));
    }
}