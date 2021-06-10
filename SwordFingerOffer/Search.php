<?php
class Search {
    /**
     * 每一步将一个待排序的数据插入到前面已经排好序的有序序列中，直到插完所有元素为止。
     * @param $nums
     * @return array
     */
    public function insertSort($nums) : array
    {
        if (empty($nums) || !is_array($nums)) {
            return [];
        }
        $count = count($nums);
        //默认第一个元素为已排好序的元素
        for ($i =  1; $i < $count; $i++) {
            //如果当前元素比上一个元素小，则需要插入到有序序列中
            if ($nums[$i] < $nums[$i - 1]) {
                //当前元素-锚点
                $x = $nums[$i];
                $nums[$i] = $nums[$i  - 1];
                //从上一个元素开始往有序序列开头查找
                for ($j = $i - 1; $j >= 0 && $x < $nums[$j]; $j--) {
                    $nums[$j + 1] = $nums[$j];
                }
                $nums[$j + 1] = $x;
            }
        }
        return $nums;
    }
}
print_r((new Search())->insertSort([5, 3, 2, 1]));