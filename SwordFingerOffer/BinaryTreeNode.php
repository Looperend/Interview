<?php
namespace SwordFingerOffer;
class BinaryTreeNode {
    //节点的值
    public $value = null;
    //左节点
    public $left = null;
    //右节点
    public $right = null;

    public function __construct($value)
    {
        $this->value = $value;
    }
}