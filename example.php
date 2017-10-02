<?php

include("vendor/autoload.php");

$application = new Application\Application();

print "Running service in simplest case: ";
print $application->runService() . "\n\n";

print "Attempting to use a different service; German-language service says: ";
$germanService = new Model\GermanService();
$application->service = $germanService;
print $application->runService() . "\n\n";

print "Letting dangerous code try to break our service; result: ";
$dangerousCode = new Model\DangerousCode();
$dangerousCode->messWith($application);
print $application->runService() . "\n\n";

print "If none of the above cause errors, and they all say SUCCESS, something is wrong!\n";
