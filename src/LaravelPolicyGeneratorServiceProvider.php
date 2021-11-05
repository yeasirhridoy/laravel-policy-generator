<?php

namespace Hridoy\LaravelPolicyGenerator;

use Illuminate\Support\ServiceProvider;

class LaravelPolicyGeneratorProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands(GeneratePolicyCommand::class);
    }
}
