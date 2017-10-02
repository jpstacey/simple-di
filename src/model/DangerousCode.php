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
        // Use reflection (ugh) to work out what we can break!
        $reflector = new \ReflectionClass($application);

        // Attempt to detect a public $service property; unset if so.
        try {
            $methodDetection = $reflector->getProperty('service');
            if ($methodDetection->isPublic()) {
                $application->service = null;
                return;
            }
        }
        // Property doesn't exist at all? Catch the exception.
        catch (\ReflectionException $e) {
        }

        // If we got this far, we have to give up!
    }
}
