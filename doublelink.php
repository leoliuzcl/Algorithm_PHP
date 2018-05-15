<?php


class Node {
   public $prev = null;
   public $next = null;
   public $data = null;
   public $key = null;

   function __construct($key, $data) {
        $this->data = $data;
        $this->key = $key;
   }
}

class DoubleLinkList  {
    private $head = null;
    private $tail = null;
    private $current = null;
    private $size = 0;

    public function isEmpty() {
        return $this->size == 0 ? true : false;
    }

    //头插
    public function addFromHead($key, $data) {
        if ($this->isEmpty()) {
            $newNode = new Node($key, $data);
            $this->head = $this->tail = $newNode;
        } else {
            $newNode = new Node($key, $data);
            $newNode->next = $this->head;
            $this->head->prev = $newNode;
            $this->head = $newNode;
        }
        $this->size++;
    }

    //尾插
    public function addFromLast($key ,$data) {
         if ($this->isEmpty()) {
            $newNode = new Node($key, $data);
            $this->head = $this->tail = $this->current = $newNode;
        } else {
            $newNode = new Node($key, $data);
            $newNode->prev = $this->tail;
            $this->tail->next = $newNode;
            $this->tail = $newNode;
        }
        $this->size++;
    }

    //查询
    public function findByKey($key) {
        if ($this->isEmpty()) {
            return false;
        }
        $tmp = $this->head;
        while ($tmp) {
            if ($tmp->key == $key) {
                return $tmp;
            }
            $tmp = $tmp->next;
        }
        return false;
    }

    //删除
    public function delete($key) {
        $searchNode = $this->findByKey($key);
        if (empty($searchNode)) {
            return false;
        }
        if ($searchNode == $this->tail) {
            $searchNode->prev->next = null;
            $this->tail = $searchNode->prev;
        } elseif ($searchNode == $this->head) {
            $searchNode->next->prev = null;
            $this->head = $searchNode->next;
        } else {
            $searchNode->prev->next = $searchNode->next;
            $searchNode->next->prev = $searchNode->prev;
        }
        unset($searchNode);
        $this->size--;
    }

    //修改
    public function modify($key, $newKey, $newData) {
        if ($this->isEmpty()) {
            return false;
        }
        $tmp = $this->findByKey($key);
        if (empty($tmp)) {
            return false;
        }
        $tmp->key = $newKey;
        $tmp->data = $newData;
        return true;
    }

    public function getHead() {
        if ($this->isEmpty()) {
            return;
        }
        return $this->head;
    }

    public function readAll() {
        if ($this->size == 0) {
            return false;
        }
        $tmp = $this->head;
        while ($tmp) {
            echo $tmp->key.'---'.$tmp->data.PHP_EOL;
            $tmp = $tmp->next;
        }
    }

    public function readFromLast() {
        if ($this->size == 0) {
            return false;
        }
        $tmp = $this->tail;
        while ($tmp) {
            echo $tmp->key.'---'.$tmp->data.PHP_EOL;
            $tmp = $tmp->prev;
        }
    }
}
$list = new DoubleLinkList();
$list->addFromHead('one', 1);
$list->addFromHead('two', 2);
$list->addFromLast('three', 3);
$list->delete('three');
$list->modify('one', 'four', 4);
$list->readAll();

