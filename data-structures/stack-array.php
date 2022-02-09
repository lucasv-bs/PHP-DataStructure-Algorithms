<?php

class Stack {
    private $items;

    public function __construct() {
        $this->items = [];
    }


    public function push($element) {
        array_push($this->items, $element);
    }


    public function pop() {
        return array_pop($this->items);
    }


    public function peek() {
        return $this->items[count($this->items) - 1];
    }


    public function isEmpty() {
        return count($this->items) === 0;
    }


    public function size() {
        return count($this->items);
    }


    public function clear() {
        $this->items = [];
    }


    public function toString() {
        if ($this->isEmpty()) {
            return '';
        }
        $result = $this->items[0];
        for ($i = 1; $i < count($this->items); $i++) {
            $result .= ', '.$this->items[$i];
        }
        return $result;
    }
}


$stack = new Stack;
echo $stack->size()."\n";
echo $stack->isEmpty() ? "empty\n" : "filled\n";

echo $stack->toString()."\n";

echo "\nInserting items\n";
$stack->push(5);
$stack->push(27);
$stack->push(32);

echo "\nChecking size\n";
echo $stack->size()."\n";
echo $stack->isEmpty() ? "empty\n" : "filled\n";

echo "\nPrinting items\n";
echo $stack->toString()."\n";

echo "\nRemove top item\n";
echo $stack->pop()."\n";

echo "\nGet top item\n";
echo $stack->peek()."\n";

echo "\nPrinting items\n";
echo $stack->toString()."\n";

echo "\nClearing stack\n";
$stack->clear();
echo $stack->size()."\n";
echo $stack->isEmpty() ? "empty\n" : "filled\n";