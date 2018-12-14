<?php

use PHPUnit\Framework\TestCase;
use jefersonc\Collection\Stack;

final class StackTest extends TestCase
{
    function testRemoveFromInitialInsertion()
    {
        $stack = new Stack;
        $stack->push('a');
        $stack->push('b');
        $stack->push('c');

        $this->assertEquals('c', $stack->retrive());
        $this->assertEquals('b', $stack->retrive());
    }
}
