<?php
while($in=fgets(STDIN)){
    $time = new time();
    $time->start();
    // print_r(normal(10000));
    // print_r(eratosthenes($in));
    print_r(eratosthenes2($in));
    $time->stop();
    echo $time->get_time();
}

class time {
    private $time = 0;
    function start(){
        $this->time = microtime();
    }
    
    function stop() {
        $this->time = microtime() - $this->time;
    }
    function get_time() {
        return $this->time;
    }
    
}



/**
 * 1.とりあえず素数をとりあえず素数を出せる
 */
// function normal($max) {

//     $primeLists = array();

//     for ($i=2; $i<=$max; $i++) {
//         $isPrime = true;
//         for ($k=2; $k<$i; $k++) {
//             // 割り切れた数が存在したらアウト
//             if ($i % $k === 0) {
//                 $isPrime = false;
//                 break;
//             }
//         }
//         if ($isPrime) {
//             $primeLists[] = $i;
//         }
//     }
//     return $primeLists;
// }

/**
 * エラトステネスの篩（１）
 * ステップ 1 探索リストに2からxまでの整数を昇順で入れる。
 * ステップ 2 探索リストの先頭の数を素数リストに移動し、その倍数を探索リストから篩い落とす。
 * ステップ 3 上記の篩い落とし操作を探索リストの先頭値がxの平方根に達するまで行う。
 * ステップ 4 探索リストに残った数を素数リストに移動して処理終了。
 */
// function eratosthenes($max) {
//     $search_lists = array();
//     $primeLists = array();

//     // maxの平方根
//     $sqrt = floor(sqrt($max));

//     for ($i=2; $i<=$max; $i++) {
//         $search_lists[$i] = $i;
//     }

//     while ($val = array_shift($search_lists)) {
//         $primeLists[] = $val;
//         // maxの平方根に達したら終了
//         if ($val > $sqrt) {
//             break;
//         }
//         foreach ($search_lists as $key2 => $val2) {
//             if ($val2 % $val === 0) {
//                 unset($search_lists[$key2]);
//             }
//         }
//     }
//     $primeLists = array_merge($primeLists, $search_lists);
//     return $primeLists;
// }

/**
 * エラトステネスの篩（２）
 * ステップ 1 探索リストに2からxまでの整数を昇順で入れる。
 * ステップ 2 探索リストから探索リスト内の値の２倍以上の数を篩い落とす。
 * ステップ 3 上記の篩い落とし操作を探索リストの先頭値がxの平方根に達するまで行う。
 */
function eratosthenes2($max) {
    $search_lists = array();

    // maxの平方根
    $sqrt = floor(sqrt($max));

    for ($i=2; $i<=$max; $i++) {
        $search_lists[$i] = $i;
    }

    for ($i=2; $i<=$sqrt; $i++) {
        if (!isset($search_lists[$i])) {
            continue;
        }
        for ($j=$i*2; $j<=$max; $j+=$i) {
            unset($search_lists[$j]);
        }
    }
    return $search_lists;
}
