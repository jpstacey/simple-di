<?php

namespace Model;

/**
 * Simple broken service.
 */
class BrokenService implements ServiceInterface
{
    /**
     * {@inheritDoc}
     */
    public function run()
    {
        throw new \Exception('This service is broken!');
    }
}
