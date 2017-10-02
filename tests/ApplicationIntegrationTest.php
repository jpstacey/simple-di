<?php

use Application\Application;
use PHPUnit\Framework\TestCase;

/**
 * Test: Application.
 */
class ApplicationIntegrationTest extends TestCase
{
    /**
     * Test: ::runService().
     */
    public function testRunService()
    {
        $application = new Application();

        // 1. Assert that the default service runs fine.
        $defaultService = new Model\DefaultService();
        $application->service = $defaultService;
        $this->assertEquals('SUCCESS', $application->runService());

        // 2. Assert that an injected service runs fine.
        $germanService = new Model\GermanService();
        $application->service = $germanService;
        $this->assertEquals('ERFOLG', $application->runService());

        // 3. Assert that 3rd-party code can't break the service.
        $dangerousCode = new Model\DangerousCode();
        $dangerousCode->messWith($application);
        $application->runService();
    }
}
