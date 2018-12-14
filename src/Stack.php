<?php

namespace jefersonc\Collection;

class Stack extends Collection
{
    use Builder;

    /**
     * @return mixed
     */
    public function retrive()
    {
        $item = $this->removeFromEnd();

        return $item->value();
    }
}
