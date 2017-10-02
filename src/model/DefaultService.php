<?php

namespace Model;

/**
 * Simple working service.
 */
class DefaultService implements ServiceInterface
{
    /**
     * {@inheritDoc}
     */
    public function run()
    {
        return "SUCCESS";
    }
}
