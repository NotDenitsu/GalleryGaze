<?php
$visibleLinks = 5;

$startPage = max($currentPage - floor($visibleLinks / 2), 1);
$endPage = min($startPage + $visibleLinks - 1, $totalPages);

$prevPage = $currentPage - 1;
$nextPage = $currentPage + 1;

$output = '<div class="pagination">';
$output .= '<a href="' . checkParams() . 'page=1" class="pagination__link' . ($currentPage == 1 ? ' pagination__link--active' : '') . '">First</a>';

if ($prevPage >= 1) {
    $output .= '<a href="' . checkParams() . 'page=' . $prevPage . '" class="pagination__link">&lt;</a>';
}

for ($i = $startPage; $i <= $endPage; $i++) {
    $output .= '<a href="' . checkParams() . 'page=' . $i . '" class="pagination__link' . ($currentPage == $i ? ' pagination__link--active' : '') . '">' . $i . '</a>';
}

if ($nextPage <= $totalPages) {
    $output .= '<a href="' . checkParams() . 'page=' . $nextPage . '" class="pagination__link">&gt;</a>';
}

$output .= '<a href="' . checkParams() . 'page=' . $totalPages . '" class="pagination__link' . ($currentPage == $totalPages ? ' pagination__link--active' : '') . '">Last</a>';
$output .= '</div>';

echo $output;

function checkParams()
{
    $queryString = '';
    if (count($_GET) > 0) {
        $queryString .= '?';
        foreach ($_GET as $key => $value) {
            if ($key !== 'page') {
                $queryString .= $key . '=' . $value . '&';
            }
        }
    } else {
        $queryString .= $_SERVER['QUERY_STRING'] ? $_SERVER['QUERY_STRING'] . '&' : '?';
    }

    return $queryString;
}
?>
