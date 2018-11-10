<?php

/**
 * @author  Shinji Takeuchi <takepan.gmail.com>
 * @date    2018/11/10
 */

// $q = [3,4,5,1,2];
// $q = [2,3,4,0,1];
// $q = ['c','d','e','a','b'];
// $q = [5,7,9,1,3];
// $q = range(1, 3);
$q = range(1, 9, 2);

$eof = true;

while($eof) {
    echo implode(",", $q) . PHP_EOL;
    $q = next_permutation($q);
    if (!$q) {
        $eof = false;
    }
}

function next_permutation($arr) {
    $rev_count = 0;
    $arr_count = count($arr);
    for ($i = 0; $i < $arr_count - 1; $i++) {
        // printf ("%d %d\n", $arr[$arr_count - $i - 1], $arr[$arr_count - $i - 2]);
        if ($arr[$arr_count - $i - 1] < $arr[$arr_count - $i - 2]) {
            // echo "rev_count" . PHP_EOL;
            $rev_count++;
        } else {
            break;
        }
    }
    if ($rev_count === $arr_count - 1) {
        // echo "FALSE" . PHP_EOL;
        return false;
    // } elseif ($rev_count === 0) {
    //     // echo "regular" . PHP_EOL;
    //     $tmp = $arr[$arr_count - 1];
    //     $arr[$arr_count - 1] = $arr[$arr_count - 2];
    //     $arr[$arr_count - 2] = $tmp;
    //     return $arr;
    } else {
        // echo "other" . PHP_EOL;

        $target = $arr_count - $rev_count - 2;
        $arr2 = array_slice($arr, $target);
        sort($arr2);

        $old_num = $arr[$target];
        $order = array_search($arr[$target], $arr2);
        
        // 新しい数字を除外する
        if ($order !== false) {
            $arr[$target] = $arr2[$order + 1];
            unset($arr2[$order + 1]);
        } else {
            exit('ERR');
        }
        // 残りの配列をソートする
        sort($arr2);
        
        for ($i = 0; $i < count($arr2); $i++) {
            $arr[$target + 1 + $i] = $arr2[$i];                        
        }
        
        // echo implode(",", $arr) . PHP_EOL;

        return $arr;
    }

}