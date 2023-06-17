<?php
$visibleLinks = 5;

$startPage = max($currentPage - floor($visibleLinks / 2), 1);
$endPage = min($startPage + $visibleLinks - 1, $totalPages);

$prevPage = $currentPage - 1;
$nextPage = $currentPage + 1;

echo '<a href="?page=1" class="pagination__link' . ($currentPage == 1 ? ' pagination__link--active' : '') . '">First</a>';

if ($prevPage >= 1) {
    echo '<a href="?page=' . $prevPage . '" class="pagination__link">&lt;</a>';
}

for ($i = $startPage; $i <= $endPage; $i++) {
    echo '<a href="?page=' . $i . '" class="pagination__link' . ($currentPage == $i ? ' pagination__link--active' : '') . '">' . $i . '</a>';
}

if ($nextPage <= $totalPages) {
    echo '<a href="?page=' . $nextPage . '" class="pagination__link">&gt;</a>';
}

echo '<a href="?page=' . $totalPages . '" class="pagination__link' . ($currentPage == $totalPages ? ' pagination__link--active' : '') . '">Last</a>';
?>