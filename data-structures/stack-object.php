<?php

class Stack {
    private $items;
    private $count;

    public function __constructor() {
        $this->items = new StdClass;
        $this->count = 0;
    }

    
    public function push($element) {
        $this->count++;
        $this->items = (object) array_merge( (array)$this->items, array($this->count => $element) );        
    }

    
    public function size() {
        return $this->count;
    }


    public function isEmpty() {
        return !isset($this->count) || $this->count === 0 ? true : false;
    }


    public function pop() {
        if ($this->isEmpty()) {
            return null;
        }
        $this->count--;
        $result = $this->items->{$this->count};
        unset($this->items->{$this->count});
        return $result;
    }


    public function peek() {
        if ($this->isEmpty()) {
            return null;
        }
        return $this->items->{$this->count - 1};
    }


    public function clear() {
        $this->items = new StdClass;
        $this->count = 0;
    }


    public function toString() {
        if ($this->isEmpty()) {
            return '';
        }
        $result = $this->items->{'0'};
        for ($i = 1; $i < $this->count; $i++) {
            $result .= ', '.$this->items->$i;
        }
        return $result;
    }
}


$stack = new Stack;
echo $stack->isEmpty() ? "empty\n" : "filled\n";

$stack->push(10);
$stack->push(15);
$stack->push(22);

echo $stack->size()."\n";
echo $stack->isEmpty() ? "empty\n" : "filled\n";

echo $stack->pop()."\n";
echo $stack->pop()."\n";
echo $stack->pop()."\n";
echo $stack->pop()."\n";
echo $stack->size()."\n";

$stack->push(8);
$stack->push(12);
$stack->push(21);

echo $stack->peek()."\n";

$stack->clear();
echo $stack->size()."\n";
echo $stack->isEmpty() ? "empty\n" : "filled\n";

echo $stack->toString()."\n";

$stack->push(23);
$stack->push(31);
$stack->push(39);
$stack->push(45);

echo $stack->toString()."\n";