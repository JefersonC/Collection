<?php

namespace jefersonc\Collection;

class Queue extends Collection
{
    use Builder;

    /**
     * @return mixed
     */
    public function retrive()
    {
        $item = $this->removeFromBegin();

        return $item->value();
    }

    public function each(callable $fn, Linker $node = null, int $interactions = 1) {

        if(null === $node) {
            $node = $this->first();
        }

        $fn($node->value());

        if(
            null === $node->next() ||
            $interactions === $this->count()
        ) {
            return;
        }

        $this->each($fn, $node->next(), $interactions++);
    }
}
