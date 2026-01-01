<?php
function normalize($list){
    $clean_methods = [
        'trim',
        'strip_tags',
        'htmlspecialchars',
    ];
    foreach($clean_methods as $method){
        $list = array_map($method, $list);
    }
    return $list;
}

function dd($x){
    echo '<pre>';
    print_r($x);
    echo '</pre>';
}