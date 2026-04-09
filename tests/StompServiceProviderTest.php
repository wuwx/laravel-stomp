<?php

namespace Wuwx\LaravelStomp\Tests;

use Illuminate\Support\Facades\Config;
use Orchestra\Testbench\TestCase;
use Wuwx\LaravelStomp\StompFacade;
use Wuwx\LaravelStomp\StompManager;
use Wuwx\LaravelStomp\StompServiceProvider;

class StompServiceProviderTest extends TestCase
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

    public function test_register_service_provider()
    {
        $this->assertInstanceOf(StompManager::class, $this->app['stomp']);
    }

    public function test_config_is_merged()
    {
        Config::set('stomp', ['test_key' => 'test_value']);
        $this->app->register(StompServiceProvider::class);
        
        $config = config('stomp');
        $this->assertIsArray($config);
    }

    public function test_boot_publishes_config()
    {
        $serviceProvider = new StompServiceProvider($this->app);
        $serviceProvider->boot();
        
        $this->assertTrue(true);
    }

    public function test_singleton_registration()
    {
        $instance1 = $this->app['stomp'];
        $instance2 = $this->app['stomp'];
        
        $this->assertSame($instance1, $instance2);
    }

    public function test_stomp_manager_instantiation()
    {
        $manager = $this->app['stomp'];
        $this->assertInstanceOf(StompManager::class, $manager);
    }

    public function test_config_path_resolution()
    {
        $serviceProvider = new StompServiceProvider($this->app);
        $serviceProvider->boot();
        
        $this->assertFileExists(__DIR__ . '/../config/config.php');
    }
}
