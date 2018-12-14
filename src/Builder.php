<?php

namespace jefersonc\Collection;

trait Builder
{
    /**
     * @param array $values
     * @return Builder
     */
    static function inflate(array &$values) {
        $collection = new self;

        while($item = array_shift($values)) {
            $collection->push($item);
        }

        return $collection;
    }
}
