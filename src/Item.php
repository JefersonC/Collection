<?php

namespace jefersonc\Collection;

class Item
{
    private $prev;
    private $next;
    private $value;

    public function __construct($value, &$prev = null, &$next = null)
    {
        $this->value = $value;
        $this->prev = $prev;
        $this->next = $next;
    }
}
