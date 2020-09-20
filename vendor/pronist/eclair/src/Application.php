<?php

namespace Eclair;

use Eclair\Support\ServiceProvider;

class Application
{
    /**
     * @var ServiceProvider[] $providers
     */
    private $providers = [];

    /**
     * Create a App Instance
     *
     * @param ServiceProvider[] $providers
     *
     * @return Application
     */
    public function __construct($providers = [])
    {
        $this->providers = $providers;
        array_walk($this->providers, function ($provider) {
            $provider::register();
        });
    }

    /**
     * Run Application
     */
    public function boot()
    {
        array_walk($this->providers, function ($provider) {
            $provider::boot();
        });
    }
}
