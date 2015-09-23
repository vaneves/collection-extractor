<?php

namespace Vaneves\Doctrine;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class CollectionExtractor
{
    protected $hydrator;

    public function __construct(DoctrineHydrator $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    public function extract(array $data)
    {
        $result = [];

        foreach ($data as $entity) {
            array_push($result, $this->hydrator->extract($entity));
        }

        return $result;
    }
}
