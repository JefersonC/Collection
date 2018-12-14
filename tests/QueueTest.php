<?php

use PHPUnit\Framework\TestCase;
use jefersonc\Collection\Queue;

final class QueueTest extends TestCase
{
    function testRemoveFromInitialInsertion()
    {
        $queue = new Queue;
        $queue->push('a');
        $queue->push('b');
        $queue->push('c');

        $this->assertEquals('a', $queue->retrive());
        $this->assertEquals('b', $queue->retrive());
    }

    function testInflate()
    {
        $payload = [
            'a',
            'b',
            'c',
            'd'
        ];

        $queue = Queue::inflate($payload);

        $this->assertEquals('a', $queue->retrive());
        $this->assertEquals('b', $queue->retrive());
        $this->assertTrue(empty($payload));
    }

    function testMultidimentionalValuesOnQueue() {
        $payload = [
            [
                'name' => 'Jeferson Capobianco',
                'email' => 'jefersoncapobianco@gmail.com'
            ],
            [
                'name' => 'John Doe',
                'email' => 'john.doe@doe.com'
            ]
        ];

        $queue = Queue::inflate($payload);

        $this->assertEquals('jefersoncapobianco@gmail.com', $queue->retrive()['email']);
    }

    function testEach() {
        $queue = new Queue;
        $queue->push(1);
        $queue->push(2);
        $queue->push(3);

        $sum = 0;

        $queue->each(function($value) use (&$sum) {
            $sum += $value;
        });

        $this->assertEquals(6, $sum);
    }
}
