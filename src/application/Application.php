<?php

namespace Application;

use Model\DefaultService;

class Application
{
    public function runService()
    {
        return (new DefaultService)->run();
    }
}
