<?php

use PHPAutoloader\Contracts;
use Tests\TestState;

describe('autoloader tests', function () {


    test('Testing AutoloaderInstance::class', function () {
        expect(TestState::$autoloader)->toBeInstanceOf(Contracts\AutoloaderInstance::class);
    });

    test('Testing Autoloader::prefixes()', function () {
        $prefixes = TestState::$autoloader->prefixes();

        expect($prefixes)->toBeArray()->and($prefixes)->toHaveKey('App\\');
    });

    test('Testing Autoloader::getCLasses(...)', function () {
        $classes = TestState::$autoloader->getClasses();
        $fromSubnamespace = TestState::$autoloader->getClasses('App\Services');

        expect($classes)
            ->toContain('App\Modules\ExampleModule')
            ->and($fromSubnamespace)
            ->toContain('App\Services\ExampleService');
    });

    test('Testing Autoloader::getSubNamespaces(...)', function () {
        $namespaces = TestState::$autoloader->getSubNamespaces('App');

        expect($namespaces)->toContain('Modules', 'Services');
    });

    test('Testing Autoloader::getClassCount()', function () {
        $count = TestState::$autoloader->getClassCount();

        expect($count)->toBe(2);
    });

    test('Testing Autoloader::hasClass(...)', function () {
        $hasClass = TestState::$autoloader->hasClass('App\Modules\ExampleModule');

        expect($hasClass)->toBeTrue();
    });

    test('Testing Autoloader::getClassFile(...)', function () {
        $file = TestState::$autoloader->getClassFile('App\Modules\ExampleModule');

        expect($file)->toContain('tests\App\Modules\ExampleModule.php');
    });

    test('Testing Autoloader::addClassMap(...)', function () {
        TestState::$autoloader->addClassMap('NewClass', __DIR__ . '/../NewApp');
        $hasClass = TestState::$autoloader->hasClass('NewClass');
        $count = TestState::$autoloader->getClassCount();

        expect($count)->toBe(3)->and($hasClass)->toBeTrue();
    });

})->group('autoloader');
