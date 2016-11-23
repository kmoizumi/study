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
 * 1.�Ƃ肠�����f�����Ƃ肠�����f�����o����
 */
// function normal($max) {

//     $primeLists = array();

//     for ($i=2; $i<=$max; $i++) {
//         $isPrime = true;
//         for ($k=2; $k<$i; $k++) {
//             // ����؂ꂽ�������݂�����A�E�g
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
 * �G���g�X�e�l�X��⿁i�P�j
 * �X�e�b�v 1 �T�����X�g��2����x�܂ł̐����������œ����B
 * �X�e�b�v 2 �T�����X�g�̐擪�̐���f�����X�g�Ɉړ����A���̔{����T�����X�g����⿂����Ƃ��B
 * �X�e�b�v 3 ��L��⿂����Ƃ������T�����X�g�̐擪�l��x�̕������ɒB����܂ōs���B
 * �X�e�b�v 4 �T�����X�g�Ɏc��������f�����X�g�Ɉړ����ď����I���B
 */
// function eratosthenes($max) {
//     $search_lists = array();
//     $primeLists = array();

//     // max�̕�����
//     $sqrt = floor(sqrt($max));

//     for ($i=2; $i<=$max; $i++) {
//         $search_lists[$i] = $i;
//     }

//     while ($val = array_shift($search_lists)) {
//         $primeLists[] = $val;
//         // max�̕������ɒB������I��
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
 * �G���g�X�e�l�X��⿁i�Q�j
 * �X�e�b�v 1 �T�����X�g��2����x�܂ł̐����������œ����B
 * �X�e�b�v 2 �T�����X�g����T�����X�g���̒l�̂Q�{�ȏ�̐���⿂����Ƃ��B
 * �X�e�b�v 3 ��L��⿂����Ƃ������T�����X�g�̐擪�l��x�̕������ɒB����܂ōs���B
 */
function eratosthenes2($max) {
    $search_lists = array();

    // max�̕�����
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
