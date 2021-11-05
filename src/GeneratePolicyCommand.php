<?php

namespace Hridoy\LaravelPolicyGenerator;

use Illuminate\Console\Command;

class GeneratePolicyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:policy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate policy for all models';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = app_path() . "/Models";

        function getModels($path)
        {
            $out = [];
            $results = scandir($path);
            foreach ($results as $result) {
                if ($result === '.' or $result === '..') continue;
                $filename = $result;
                if (is_dir($filename)) {
                    $out = array_merge($out, getModels($filename));
                } else {
                    $out[] = substr($filename, 0, -4);
                }
            }
            return $out;
        }

        $models = (getModels($path));
        foreach ($models as $model) {
            $policyName = $model . "Policy";
            $command = 'make:policy ' . $policyName . ' --model=' . $model;
            \Illuminate\Support\Facades\Artisan::call($command);
        }
    }
}
