<?php

class Queue {
    private $items;
    private $count;
    private $lowestCount;


    public function __constructor() {
        $this->items = new StdClass;
        $this->count = 0;
        $this->lowestCount = 0;
    }


    public function enqueue($element) {
        $this->count++;
        $this->items = (object) array_merge( (array)$this->items, array($this->count => $element) );        
    }


    public function isEmpty() {
        return $this->count - $this->lowestCount === 0 
            ? true 
            : false;
    }


    public function size() {
        return $this->count - $this->lowestCount;
    }


    public function dequeue() {
        if ($this->isEmpty()) {
            return null;
        }
        if (!isset($this->lowestCount)) {
            $this->lowestCount = 0;
        }
        $result = $this->items->{$this->lowestCount};
        unset($this->items->{$this->lowestCount});
        $this->lowestCount++;
        
        return $result;
    }


    public function toString() {
        if ($this->isEmpty()) {
            return '';
        }
        if (!isset($this->lowestCount)) {
            $this->lowestCount = 0;
        }
        $result = $this->items->{$this->lowestCount};
        for ($i = $this->lowestCount + 1; $i < $this->count; $i++) {
            $result .= ', '.$this->items->$i;
        }
        return $result;
    }
}


$queue = new Queue;
echo $queue->isEmpty() ? "empty\n" : "filled\n";

echo $queue->size()."\n";

$queue->enqueue(4);
$queue->enqueue(23);
$queue->enqueue(30);
$queue->enqueue(42);
$queue->enqueue(46);

echo $queue->isEmpty() ? "empty\n" : "filled\n";
echo $queue->size()."\n";
echo $queue->toString()."\n";

echo 'deleting: '.$queue->dequeue()."\n";
echo 'deleting: '.$queue->dequeue()."\n";
echo 'deleting: '.$queue->dequeue()."\n";
echo 'deleting: '.$queue->dequeue()."\n";
echo 'deleting: '.$queue->dequeue()."\n";

echo $queue->isEmpty() ? "empty\n" : "filled\n";
echo $queue->size()."\n";
echo $queue->toString()."\n";