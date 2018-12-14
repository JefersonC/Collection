<?php

namespace jefersonc\Collection;

class Node implements Linker
{
    private $prevPointer;
    private $nextPointer;
    private $guarded;

    /**
     * Node constructor.
     * @param $guarded
     * @param Linker|null $prevPointer
     * @param Linker|null $nextPointer
     */
    public function __construct($guarded, Linker &$prevPointer = null, Linker &$nextPointer = null)
    {
        $this->guarded = $guarded;
        $this->prevPointer = $prevPointer;
        $this->nextPointer = $nextPointer;
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->guarded;
    }

    /**
     * @return Node
     */
    public function prev() : ?Linker
    {
        return $this->prevPointer;
    }

    /**
     * @return Node
     */
    public function next() : ?Linker
    {
        return $this->nextPointer;
    }

    /**
     * @param Linker|null $node
     */
    public function setPrev(Linker &$node = null)
    {
        $this->prevPointer = $node;
    }

    /**
     * @param Linker|null $node
     */
    public function setNext(Linker &$node = null)
    {
        $this->nextPointer = $node;
    }

    public function cleanPrev()
    {
        $this->prevPointer = null;
    }

    public function cleanNext()
    {
        $this->nextPointer = null;
    }
}
