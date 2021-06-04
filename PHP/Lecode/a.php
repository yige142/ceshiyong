<?php
//动态规划
 $nums=[-2,1,-3,4,-1,2,1,-5,4];

class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $maxNum = $nums[0];// 6                            // 最大和先记为数组第一个数；
        $tmp = $nums[0]; //  5                             // 子串序列和，从第一个数开始；
        $array_section=array();
        foreach($nums as $k => $v){//k=8
            if($k === 0){                               // 因为数组第一个数已经取出，所以跳过；
                continue;
            }

            if($tmp > 0){                               // 如果（子串序列和）大于0，说明此时子串序列可以继续往后加；
                $tmp = $tmp + $v;                       // 子串继续 + 下个数
            }else{
                $tmp = $v;                              // 如果（子串序列和）小于0，则当前位置开始取新的（子串序列和）
            }
            //$maxNum = max([$maxNum,$tmp]);              // 把当前最大值，和当前（字串序列和）比，取最大值
            $maxNum = $maxNum > $tmp ? $maxNum : $tmp;    // 三目运算比上面的内置函数快；
        }
        return $maxNum;
    }
}
$s=new Solution();
print_r($s->maxSubArray($nums));

