<?php

namespace jefersonc\Collection;

class Collection
{
    private $beginPointer;
    private $endPointer;
    private $counter = 0;

    public function __construct()
    {

    }

    public function add(Item $item) {
        if (! $this->beginPointer) {
            $this->beginPointer = $item;
        }

        if (! $this->endPointer) {
            $this->endPointer = $item;
        }

        if($this->counter > 0) {
            $this->endPointer->setNext($item);
            $item->setPrev($this->endPointer);
            $this->endPointer = $item;
        }

        $this->counter++;
    }

    public function removeFromEnd() : Item {
        if($this->counter > 0) {
            $item = $this->endPointer;
            $previous = $item->prev();
            $previous->setNext(null);
            $this->endPointer = $previous;
            $this->counter--;

            return $item;
        }

        throw new Exception('has no itens on collection');
    }

    public function removeFromBegin() : Item {
        if($this->counter > 0) {
            $item = $this->beginPointer;
            $next = $item->next();
            $next->setPrev(null);
            $this->beginPointer = $next;
            $this->counter--;

            return $item;
        }

        throw new Exception('has no itens on collection');
    }
}
