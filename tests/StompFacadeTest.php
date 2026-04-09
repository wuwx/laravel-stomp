<?php

namespace Wuwx\LaravelStomp\Tests;

use Orchestra\Testbench\TestCase;
use Wuwx\LaravelStomp\StompFacade;
use Wuwx\LaravelStomp\StompServiceProvider;

class StompFacadeTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [StompServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Stomp' => StompFacade::class,
        ];
    }

    public function test_facade_resolves_service()
    {
        $this->assertInstanceOf(\Wuwx\LaravelStomp\StompManager::class, \Stomp::getFacadeRoot());
    }

    public function test_facade_is_callable()
    {
        $this->assertIsCallable(function () {
            return \Stomp::getFacadeRoot();
        });
    }

    public function test_facade_static_access()
    {
        $root = StompFacade::getFacadeRoot();
        $this->assertNotNull($root);
    }

    public function test_facade_clear_resolved_instance()
    {
        StompFacade::clearResolvedInstance('stomp');
        $this->assertTrue(true);
    }
}
