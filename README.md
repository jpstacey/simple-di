# Simple DI

Simple dependency injection principles, demonstrated by a gradual process of improvement.

## Summary

Each branch solves dependency problems iteratively, by gradual improvement of the DI method.

* Get a feel for what's going on by studying (and running) `example.php`.
* Run `vendor/bin/phpunit tests/` to see the test results.

The key features of each branch are explained below.

## Branches

### 0.x: no injection

* *No DI:* scattered "new" statements.
* Vulnerable to: coupling; complexity; maintainability problems.

This code works in principle, but the Application is impossible to test in isolation from the DefaultService, or with a different service.

*Result: the test fails, because GermanService can't be injected.*

### 1.x: property injection.

* *DI:* property injection.
* Solves: decoupling; decomplexity; maintainability.
* Vulnerable to: arbitrary service unsetting/polluting with bad objects.

This code injects the service as a simple object property, but this leaves the Application vulnerable to arbitrary changes to its service later on, which DangerousCode exploits.

*Result: the test fails, because Application detects its service has been unset by DangerousCode, and raises an exception.*

### 2.x: setter injection

* *DI:* setter injection.
* Solves: all of 1.x, plus; service unsetting/polluting.
* Vulnerable to: service modification; re-injecting undesirable services.

This code only permits services which satisfy the ServiceInterface, but the application is still vulnerable to service swapping later on, which DangerousCode exploits.

*Result: the test fails, because Application runs BrokenService injected by DangerousCode, which itself then raises an exception.*

### 3.x: constructor injection

* *DI:* constructor injection.
* Solves: all of 2.x, plus: preventing re-injection.
* Vulnerable to: *none*.

In terms of dependency injection, this code is invulnerable to any of the above issues. DangerousCode attempts to detect a route in using reflection, fails to do so, and backs off.

*Result: test passes. DangerousCode must back off, and can no longer do any mischief.*
