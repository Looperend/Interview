<?php
namespace SwordFingerOffer;
require dirname(__DIR__).'/vendor/autoload.php';
use SwordFingerOffer\BinaryTreeNode;
class Solution {
    /**
     * 根据前序遍历，中序遍历重构二叉树
     * @param array $pre
     * @param array $in
     * @return \SwordFingerOffer\BinaryTreeNode|null
     * @throws \Exception
     */
    public function constructBinaryTree(array $pre, array $in)
    {
        if (empty($pre) || empty($in) || count($pre) != count($in)) {
            return null;
        }
        return $this->constructCore($pre, 0, count($pre) - 1, $in , 0, count($in) - 1);
    }

    public function constructCore($list_pre, $start_pre, $end_pre, $list_in, $start_in, $end_in)
    {
        if ($start_pre > $end_pre || $start_in > $end_in) {
            return null;
        }
        //前序遍历第一个的值为根的值
        $root_value =$list_pre[$start_pre];
        //计算根节点的位置
        $index = $start_in;
        while ($index <= $end_in && $list_in[$index] != $root_value) {
            $index++;
        }
        if ($index > $end_in) {
            throw new \Exception("Invalid Input");
        }
        $node =  new BinaryTreeNode($root_value);
        //左子树的长度
        $left_length = $index - $start_in;
        //左子树的偏移位置
        $left_pre_end = $start_pre + $left_length;
        if ($left_length > 0) {
            $node->left = $this->constructCore($list_pre, $start_pre + 1, $start_pre + $left_length, $list_in, $start_in, $index - 1);
        }
        if ($left_length < $end_pre -  $start_pre) {
            //右子树的前序遍历起始位置为根节点+左子树的长度
            $node->right = $this->constructCore($list_pre, $left_pre_end + 1, $end_pre, $list_in, $index + 1, $end_in);
        }
        return $node;
    }

    /**
     * 用两个栈实现队列
     */
    public function StackQueue()
    {
        $queue = new StackQueue();
        //入队列
        $queue->appendTail(1);
        $queue->appendTail(2);
        $queue->deleteHead();
    }

    public function Fibonacci(int $n) {
        if ($n <= 0) {
            return 0;
        }
        if ($n == 1) {
            return 1;
        }
        return $this->Fibonacci($n - 1) + $this->Fibonacci($n -  2);
    }
}
$pre = [1, 2, 4, 7, 3, 5, 6, 8];
$in = [4, 7, 2, 1, 5, 3, 8, 6];


print_r((new Solution())->constructBinaryTree($pre, $in));
print_r((new Solution())->Fibonacci(4));