<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command
{
    protected $signature = 'make:service {name : The name of the service}';
    protected $description = 'Create a new service class';

    public function handle()
    {
        $name = $this->argument('name');
        $servicePath = app_path("Services/{$name}.php");

        if (File::exists($servicePath)) {
            $this->error("Service {$name} already exists!");
            return;
        }

        $stubPath = base_path('stubs/service.stub');
        $stub = File::get($stubPath);
        $stub = str_replace('{{name}}', $name, $stub);

        File::put($servicePath, $stub);

        $this->info("Service {$name} created successfully at {$servicePath}");
    }
}