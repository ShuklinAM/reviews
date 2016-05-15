<?php

function showSortBy($title, $field, $admin = false) {
    $currentOrder = (Req::get('sort')) ? Req::get('sort') : 'date';
    $currentDirection = (Req::get('dir')) ? Req::get('dir') : 'desc';
    $page = (Req::get('p')) ? Req::get('p') : 1;

    $showArrow = ($currentOrder == $field) ? true : false;
    if($showArrow) {
        $direction = ($currentDirection == 'asc') ? 'desc' : 'asc';
        $showArrow = ($direction == 'asc') ? '<span class="glyphicon glyphicon-chevron-down"></span>' :
            '<span class="glyphicon glyphicon-chevron-up"></span>';
    } else {
        $direction = 'asc';
        $showArrow = false;
    }

    $params = 'sort='.$field.'&'.'dir='.$direction.'&p='.$page;
    $admin = ($admin) ? 'admin' : '';
    $sortUrl = App::getUrl($admin).'?'.$params;

    return '<a href="'.$sortUrl.'">
                    '.$title.' '.$showArrow.'
                </a>';
}

function showImage($path, $maxWidth = false, $maxHeight = false, $temp = false) {
    if($path && (file_exists(APP_ROOT.'/images/'.$path) || $temp)) {
        $path = (!$temp) ? App::getUrl('images/'.$path) : $path;

        $styles = '';
        if($maxWidth || $maxHeight) {
            $style = 'style="';

            if($maxWidth) {
                $style .= 'max-width: '.$maxWidth.'px;';
            }
            if($maxHeight) {
                $style .= 'max-height: '.$maxHeight.'px;';
            }

            $style .= '"';
        }

        return '<img src="'.$path.'" '.$style.'/>';
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

function cutString($string) {
    return strlen($string) > 30 ? substr($string, 0, 30).'...' : $string;
}

function clearString($string) {
    return trim(strip_tags($string));
}