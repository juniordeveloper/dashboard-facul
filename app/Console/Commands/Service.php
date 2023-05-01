<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Service extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name} {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a service - Nome Serviço, Modulo';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected $nameClass;
    protected $nameModule;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->nameClass = $this->argument('name');
        $this->nameModule = $this->argument('module');

        $isPathModule = app_path("Services/{$this->nameModule}");

        $files = [
            'service' => '',
            'service_interface' => '',
        ];
        $this->info('Criando Service...');
        $files['service'] = $this->getStubService();

        $this->info('Criando ServiceInterface...');
        $files['service_interface'] = $this->getStubServiceInterface();

        $this->createJson($files);
        return 0;
    }

    private function getStubService()
    {
        $namespace = $this->getDefaultNamespace();
        $classService = "{$this->nameClass}Service";

        $fullPath = $this->getFileName("");
        $fileName = "{$fullPath}/{$classService}.php";

        // dd($namespace, $classService, $fullPath, $fileName);

        if (!is_dir($fullPath)) {
            File::makeDirectory($fullPath, $mode = 0777, true, false);
        }

        if (is_file($fileName)) {
            $this->info('Service já existente...');
            return "{$namespace}\{$classService}";
        }

        $file = File::get(app_path('/Console/Commands/stubs/service.stub'));
        $file = str_replace("{{ namespace }}", $namespace, $file);
        $file = str_replace("{{ class }}", "{$classService}", $file);
        File::put($fileName, $file);
        $this->info('Service Criado');

        return "{$namespace}/{$classService}";
    }

    private function getStubServiceInterface()
    {
        $namespace = $this->getDefaultNamespace() . '\Contracts';
        $classService = "{$this->nameClass}ServiceInterface";

        $fullPath = $this->getFileName("Contracts");
        $fileName = "{$fullPath}/{$classService}.php";

        if (!is_dir($fullPath)) {
            File::makeDirectory($fullPath, $mode = 0777, true, false);
        }

        if (is_file($fileName)) {
            $this->info('ServiceInterface já existente...');
            return "{$namespace}\{$classService}";
        }

        $file = File::get(app_path('/Console/Commands/stubs/interface.stub'));
        $file = str_replace("{{ namespace }}", $namespace, $file);
        $file = str_replace("{{ class }}", $classService, $file);

        File::put($fileName, $file);
        $this->info('ServiceInterface Criado');

        return "{$namespace}/{$classService}";
    }

    private function getDefaultNamespace()
    {
        $moduleNameSpace = $this->argument('module');
        return 'App\Services\\' . $moduleNameSpace;
    }

    private function getFileName($path = '')
    {
        $moduleNameSpace = $this->argument('module');
        if (!empty($path)) {
            $path = "/{$path}";
        }
        return app_path("Services/{$moduleNameSpace}{$path}");
    }

    private function createJson($files)
    {
        $fileName = base_path('services_make.json');
        if (!is_file($fileName)) {
            File::put($fileName, "[]");
        }
        $read = json_decode(File::get($fileName), true);
        $read[] = $files;
        $classes = [];
        foreach ($read as $v) {
            if (class_exists($v['service'])) {
                $classes[] = $v;
            }
        }
        File::put($fileName, json_encode($classes, JSON_PRETTY_PRINT));
    }
}
