<?php

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");


require_once('./data/dataObject.php');

$limit = 5;
$offset = 0;
if(isset($_GET['limit'])) {
    $limit = $_GET['limit'];
}
if(isset($_GET['offset'])) {
    $offset = $_GET['offset'];
}
$links = [
    'base' => 'http://localhost/projects/datatables/customPaginationPhpNode/api/php/api.php',
    'context' => '',
    'next' => "http://localhost/projects/datatables/customPaginationPhpNode/api/php/api.php?limit=$limit&offset=".$offset+$limit,
    'self' => 'http://localhost/projects/datatables/customPaginationPhpNode/api/php/api.php' 
];

if($offset>0) {
    $links['prev'] = "http://localhost/projects/datatables/customPaginationPhpNode/api/php/api.php?limit=$limit&offset=".$offset-$limit;
}


echo json_encode([
    'status' => 'success',
    '_links' => $links,
    'results' => array_slice($data, $offset, $limit),
    'count' => count($data),
    'curr'
]);


