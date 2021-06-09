<?php
namespace SwordFingerOffer;
use SplStack;

/**
 * 用两个栈实现队列
 * Class StackQueue
 * @package SwordFingerOffer
 */
class StackQueue {
    public $stack1;
    public $stack2;

    public function __construct() {
        $this->stack1 = new SplStack();
        $this->stack2 = new SplStack();
    }
    public function appendTail($element) {
        $this->stack1->push($element);
    }

    public function deleteHead() {
        if ($this->stack2->count() <= 0) {
            while ($this->stack1->count() > 0) {
                $data = $this->stack1->pop();
                $this->stack2->push($data);
            }
        }
        if ($this->stack2->count() == 0) {
            throw new Exception("queue is empty");
        }
        return $this->stack2->pop();
    }
}