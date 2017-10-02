<?php

namespace Model;

use Application\Application;

/**
 * This code tries to have (bad) side effects on the application.
 */
class DangerousCode
{
    /**
     * Try to do some bad things.
     */
    public function messWith(Application $application)
    {
        $application->service = new BrokenService();
    }
}
