<?php

namespace Model;

/**
 * Simple working service.
 */
class GermanService implements ServiceInterface
{
    /**
     * {@inheritDoc}
     */
    public function run()
    {
        return "ERFOLG";
    }
}
