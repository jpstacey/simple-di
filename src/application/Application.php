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
     * Supply the service through constructor injection.
     *
     * @param ServiceInterface $service
     *   The service we rely on.
     */
    public function __construct(ServiceInterface $service) {
        $this->service = $service;
    }

    /**
     * Run the service we rely on.
     */
    public function runService()
    {
        return $this->service->run();
    }
}
