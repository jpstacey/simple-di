<?php

/**
 * Old-skool: run "tests" outside the PHPUnit framework.
 */

// Initialize our includes and create an application.
include("vendor/autoload.php");
$application = new Application\Application();

// 1. Assert that the default service runs fine.
print "Running service in simplest case: ";
$defaultService = new Model\DefaultService();
$application->setService($defaultService);
print $application->runService() . "\n\n";

// 2. Assert that an injected service runs fine.
print "Attempting to use a different service; German-language service says: ";
$germanService = new Model\GermanService();
$application->setService($germanService);
print $application->runService() . "\n\n";

// 3. Assert that 3rd-party code can't break the service.
print "Letting dangerous code try to break our service; result: ";
$dangerousCode = new Model\DangerousCode();
$dangerousCode->messWith($application);
print $application->runService() . "\n\n";

print "If none of the above cause errors, but they all say SUCCESS, something is wrong!\n";
