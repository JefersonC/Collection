<?php

namespace jefersonc\Collection;

abstract class Collection
{
    private $beginPointer;
    private $endPointer;
    private $counter = 0;

    /**
     * @param Linker $item
     */
    public function add(Linker $item)
    {
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

    /**
     * @return Linker
     */
    public function removeFromEnd() : Linker
    {
        if($this->counter > 0) {
            $item = $this->endPointer;
            $previous = $item->prev();
            $previous->cleanNext();
            $this->endPointer = $previous;
            $this->counter--;

            return $item;
        }

        throw new Exception('has no itens on collection');
    }

    /**
     * @return Linker
     */
    public function removeFromBegin() : Linker
    {
        if($this->counter > 0) {
            $item = $this->beginPointer;
            $next = $item->next();
            $next->cleanPrev();
            $this->beginPointer = $next;
            $this->counter--;

            return $item;
        }

        throw new Exception('has no itens on collection');
    }

    /**
     * @return int
     */
    public function count() : int
    {
        return $this->counter;
    }

    public function first() {
        return $this->beginPointer;
    }

    public function last() {
        return $this->endPointer;
    }

    /**
     * @param $value
     * @return void
     */
    public function push($value)
    {
        $item = new Node($value);

        $this->add($item);
    }

    /**
     * @return mixed
     */
    abstract public function retrive();
}
