<?php

namespace Hridoy\LaravelPolicyGenerator;

use Illuminate\Support\ServiceProvider;

class LaravelPolicyGeneratorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands(GeneratePolicyCommand::class);
    }
}
