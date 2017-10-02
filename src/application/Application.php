<?php

namespace Application;

use Model\DefaultService;

/**
 * The main application, to be tested.
 */
class Application
{
    /**
     * Run the service we rely on.
     */
    public function runService()
    {
        return (new DefaultService)->run();
    }
}
