<?php

/**
 * @author  Shinji Takeuchi <takepan.gmail.com>
 * @date    2018/11/10
 */

require(__DIR__ . "/next_permutation.php");

// TimeStart
$timeStart = microtime(true);

$num = 8;

$q = range(0, $num - 1);
$cnt = 0;

while(true) {
    $flg = true;
    for ($i = 0; $i < $num; $i++) {
        for ($j = $i + 1; $j < $num; $j++) {
            if (abs($q[$i] - $q[$j]) == abs($i - $j)) {
                $flg = false;
                break 2;
            }
        }
    }
    if ($flg === true) {
        $cnt++;
    }

    $q = next_permutation($q);
    if ($q === false) {
        break;
    }
}

echo $cnt . PHP_EOL;

// TimeStart
$timeFinish = microtime(true);
// report
printf("Elapsed time: %.9f sec\n", $timeFinish - $timeStart);
