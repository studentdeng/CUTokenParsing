<?php

// $res = exec('scws -i /Users/yuguang/Desktop/data.txt -c utf8 -d /Users/yuguang/Desktop/dict.utf8.xdb:/Users/yuguang/Desktop/mydb.txt');

// echo $res;

// return;

$res =  file_get_contents("/Users/yuguang/Desktop/word.txt");
$tokenArray = explode(" ", $res);

function filter($arr) {
    $res = array();
    foreach ($arr as $item) {
        if ($item.length == 1) {
            continue;
        }

        if ($item == '？' || $item == '，' || $item == '！' || $item == '（' || $item == '）' || $item == '：' || $item == '。') {
            continue;
        }

        if (ord($item) < ord('a')) {
            continue;
        }

        if (in_array($item, array(
                '的',
                '了',
                '很',
                '个',
                '啊',
                '是',
                '一个',
                '一',
                '我',
                '和',
            ))) {
            continue;
        }

        $res[] = $item;
    }

    return $res;
}

$tokenArray = filter($tokenArray);

function sortByOrder($a, $b) {
    return $a['order'] - $b['order'];
}

sort($tokenArray);

foreach ($tokenArray as $item) {
    echo $item;
    echo ' ';
}