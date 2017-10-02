<?php

namespace Application;

use Model\ServiceInterface;
use Model\DefaultService;

/**
 * The main application, to be tested.
 */
class Application
{
    /**
     * @var ServiceInterface
     */
    public $service;

    /**
     * Run the service we rely on.
     */
    public function runService()
    {
        if ($this->service instanceof ServiceInterface) {
            return $this->service->run();
        }
        throw new \Exception('Service has gone away');
    }
}
