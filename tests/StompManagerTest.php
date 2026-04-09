<?php

namespace Wuwx\LaravelStomp\Tests;

use Orchestra\Testbench\TestCase;
use Wuwx\LaravelStomp\StompManager;
use Wuwx\LaravelStomp\StompServiceProvider;

class StompManagerTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [StompServiceProvider::class];
    }

    public function test_manager_can_be_instantiated()
    {
        $manager = new StompManager([]);
        $this->assertInstanceOf(StompManager::class, $manager);
    }

    public function test_manager_can_be_instantiated_with_config()
    {
        $config = ['test' => 'value'];
        $manager = new StompManager($config);
        $this->assertInstanceOf(StompManager::class, $manager);
    }

    public function test_manager_can_be_instantiated_with_null_config()
    {
        $manager = new StompManager(null);
        $this->assertInstanceOf(StompManager::class, $manager);
    }

    public function test_manager_can_be_instantiated_from_app()
    {
        $manager = $this->app['stomp'];
        $this->assertInstanceOf(StompManager::class, $manager);
    }

    public function test_manager_is_singleton()
    {
        $manager1 = $this->app['stomp'];
        $manager2 = $this->app['stomp'];
        $this->assertSame($manager1, $manager2);
    }

    public function test_manager_class_exists()
    {
        $this->assertTrue(class_exists(StompManager::class));
    }

    public function test_manager_namespace()
    {
        $manager = new StompManager([]);
        $this->assertEquals('Wuwx\LaravelStomp\StompManager', get_class($manager));
    }
}
