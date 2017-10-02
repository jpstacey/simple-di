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
    protected $service;

    /**
     * Supply the service through setter injection.
     *
     * @param ServiceInterface $service
     *   The service we rely on.
     */
    public function setService(ServiceInterface $service) {
        $this->service = $service;
    }

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
