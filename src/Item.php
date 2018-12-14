<?php

namespace jefersonc\Collection;

class Item
{
    private $prevPointer;
    private $nextPointer;
    private $guarded;

    public function __construct(mixed $guarded, Item &$prevPointer = null, Item &$nextPointer = null)
    {
        $this->guarded = $guarded;
        $this->prevPointer = $prevPointer;
        $this->nextPointer = $next;
    }

    public function value() : mixed
    {
        return $this->guarded;
    }

    public function prev() : Item
    {
        return $this->prevPointer;
    }

    public function next() : Item
    {
        return $this->nextPointer;
    }

    public function setPrev(Item &$item = null)
    {
        $htis->prevPointer = $item;
    }

    public function setNext(Item &$item = null)
    {
        $htis->nextPointer = $item;
    }
}
