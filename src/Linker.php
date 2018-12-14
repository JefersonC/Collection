<?php

namespace jefersonc\Collection;

interface Linker
{
    public function __construct($guarded, Linker &$prevPointer = null, Linker &$nextPointer = null);

    public function value();

    public function prev() : ?Linker;

    public function next() : ?Linker;

    public function setPrev(Linker &$node = null);

    public function setNext(Linker &$node = null);

    public function cleanPrev();

    public function cleanNext();
}
