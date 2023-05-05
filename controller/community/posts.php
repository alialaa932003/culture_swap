<?php
$ASSET_URL = "/culture_swap/public/";

use core\Classes\Post;

// $posts = new Post();
// $postsCount = Post::count()['count'];
// $limit = 3;
// $offset = 0;
// $str = "";
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
$searchQuery = trim(filter_var($searchQuery, FILTER_SANITIZE_STRING));




// dd($posts);

$postsPerPage = 3;

// Retrieve the search query from the URL
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Sanitize and validate the search query
$searchQuery = trim(filter_var($searchQuery, FILTER_SANITIZE_STRING));

// Retrieve the current page number from the URL
$pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the results based on the page number
$offset = ($pageNumber - 1) * $postsPerPage;
// Perform the search query and retrieve the results
// This is just an example and will depend on your specific application
if (!empty($searchQuery)) {
    $results = Post::search($searchQuery, $offset, $postsPerPage);
    
    $totalResults = Post::count_posts($searchQuery)['count'];
} else {
    $results = Post::search($searchQuery, $offset, $postsPerPage);
    $totalResults = Post::count_posts($searchQuery)['count'];
}
// Calculate the total number of pages
$totalPages = ceil($totalResults / $postsPerPage);
// Generate the pagination links
$paginationLinks = array();
for ($i = 1; $i <= $totalPages; $i++) {
    $params = array('page' => $i);
    if (!empty($searchQuery)) {
        $params['search'] = $searchQuery;
    }
    $queryString = http_build_query($params);
    $paginationLinks[] = '<a href="./posts?' . $queryString . '" class="pagiItem">' . $i . '</a>';
}
>>>>>>> ed12184c675dc48f127b0e5aa22e9db20decb580
require base_path("views/community/posts.view.php");
