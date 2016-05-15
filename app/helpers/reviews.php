<?php

function showSortBy($title, $field) {
    $currentOrder = (Req::get('sort')) ? Req::get('sort') : 'date';
    $currentDirection = (Req::get('dir')) ? Req::get('dir') : 'desc';

    $showArrow = ($currentOrder == $field) ? true : false;
    if($showArrow) {
        $direction = ($currentDirection == 'asc') ? 'desc' : 'asc';
        $showArrow = ($direction == 'asc') ? '<span class="glyphicon glyphicon-chevron-down"></span>' :
            '<span class="glyphicon glyphicon-chevron-up"></span>';
    } else {
        $direction = 'asc';
        $showArrow = false;
    }

    $params = 'sort='.$field.'&'.'dir='.$direction;
    $sortUrl = App::getUrl('admin').'?'.$params;

    return '<a href="'.$sortUrl.'">
                    '.$title.' '.$showArrow.'
                </a>';
}

function showImage($path) {
    if($path && file_exists(APP_ROOT.'/images/'.$path)) {
        $path = App::getUrl('images/'.$path);
        return '<img src="'.$path.'" width="100"/>';
    } else {
        return '-';
    }
}

function showDate($date) {
    return date('d.m.Y H:i:s', strtotime($date));
}

function showBoolean($boolean) {
    return ($boolean) ? 'Yes' : 'No';
}

function pagination($url, $total, $limit = reviewsModel::LIMIT) {
    $pages = ceil($total / $limit);

    $page = min($pages, filter_input(INPUT_GET, 'p', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));

    $offset = ($page - 1)  * $limit;

    $start = $offset + 1;
    $end = min(($offset + $limit), $total);

    $sort = (Req::get('sort')) ? Req::get('sort') : 'date';
    $dir = (Req::get('dir')) ? Req::get('dir') : 'desc';

    $prevLink = ($page > 1) ?
        '<a href="'.$url.'?p=1&sort='.$sort.'&dir='.$dir.'" title="First page">&laquo;</a><a href="'.$url.'?p='.($page - 1).'&sort='.$sort.'&dir='.$dir.'" title="Previous page">&lsaquo;</a>' :
        '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

    $nextLink = ($page < $pages) ?
        '<a href="'.$url.'?p='.($page + 1).'&sort='.$sort.'&dir='.$dir.'" title="Next page">&rsaquo;</a> <a href="'.$url.'?p='.$pages.'&sort='.$sort.'&dir='.$dir.'" title="Last page">&raquo;</a>' :
        '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

    return '
        <div class="pagination">
            <p>'.$prevLink.' Page '.$page.' of '.$pages.' pages, displaying '.$start.'-'.$end.' of '.$total.' results '.$nextLink.' </p>
        </div>';
}