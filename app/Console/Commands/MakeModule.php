<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MakeModule extends Command
{
    protected $signature = 'crud:go';
    protected $description = 'Create a new module with web and API structure';

    protected $files;
    protected $table_name = null;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle()
    {

        $userProvidedTable = $this->ask('Do you want to provide a table name? Leave blank to select from list.');
        if ($userProvidedTable) {
            $module = $userProvidedTable;
        } else {
            $module = $this->choice(
                'Select the table name:',
                $this->getUserTableNames()
            );
        }
        $this->table_name = $module;


        $module = Str::singular(Str::studly($module));


        $modulePlural = Str::plural($module);
        $moduleKebab = Str::kebab($module);
        $this->info("Creating module: $module");

        $type = $this->choice(
            'Select type of files to generate:',
            ['Api', 'Web', 'both'],
            2
        );



        if ($type === 'both') {
            $this->createFiles($module, $modulePlural, $moduleKebab, 'Web');
            $this->createFiles($module, $modulePlural, $moduleKebab, 'Api');
        } else {
            $this->createFiles($module, $modulePlural, $moduleKebab, $type);
        }
    }

    protected function createFiles($module, $modulePlural, $moduleKebab, $portalType)
    {
        $basePath = base_path("app/CouponApp/Modules/{$modulePlural}/{$portalType}");

        $this->createDefaultDirs($basePath);

        $this->createFile("Models/{$module}.php", $basePath, 'Model', $portalType);
        $this->createFile("Repositories/{$module}Repository.php", $basePath, 'Repository', $portalType);
        $this->createFile("Repositories/{$module}RepositoryInterface.php", $basePath, 'RepositoryInterface', $portalType);
        $this->createFile("Services/{$module}Service.php", $basePath, 'Service', $portalType);

        $this->createFile("Requests/{$module}ListRequest.php", $basePath, 'Request', $portalType,
            $className = "{$module}ListRequest");
        $this->createFile("Requests/{$module}ShowRequest.php", $basePath, 'Request', $portalType,
            $className = "{$module}ShowRequest");
        $this->createFile("Requests/{$module}UpdateRequest.php", $basePath, 'Request', $portalType,
            $className = "{$module}UpdateRequest");
        $this->createFile("Requests/{$module}DeleteRequest.php", $basePath, 'Request', $portalType,
            $className = "{$module}DeleteRequest");
        $this->createFile("Requests/{$module}CreateRequest.php", $basePath, 'Request', $portalType,
            $className = "{$module}CreateRequest");

        $this->createFile("Controllers/{$module}Controller.php", $basePath, 'Controller', $portalType);

        if ($portalType === 'Web') {
            $this->addWebRoutes($moduleKebab, $modulePlural, $module);
        } elseif ($portalType === 'Api') {
            $this->addApiRoutes($moduleKebab, $modulePlural, $module);
        }
    }

    protected function createFile($filePath, $path, $fileType, $portalType, $className = null)
    {
        $fullPath = "{$path}/{$filePath}";

        $stub = $this->files->get(resource_path("stubs/{$portalType}{$fileType}.stub"));
        if (!$className) {
            $className = Str::studly(Str::singular($this->table_name)) . $fileType;
            if ($fileType == 'Model') {
                $className = Str::studly(Str::singular($this->table_name));
            }
        }

        $stub = str_replace('{{ moduleNameSingular }}', Str::studly(Str::singular($this->table_name)), $stub);
        $stub = str_replace('{{ className }}', $className, $stub);
        $stub = str_replace('{{ module }}', $className, $stub);

        $stub = str_replace('{{ portalType }}', $portalType, $stub);
        $stub = str_replace('{{ moduleCamel }}', Str::camel($className), $stub);
        $stub = str_replace('{{ modulePascal }}', Str::studly($className), $stub);
        $stub = str_replace('{{ modulePluralPascal }}', Str::studly(Str::plural($this->table_name)), $stub);

        $this->files->put($fullPath, $stub);

        $this->info("Created: {$fullPath}");
    }

    protected function addWebRoutes($moduleKebab, $modulePlural, $module)
    {
        $webRoutesPath = base_path('routes/web.php');
        $routeDefinition = "\nRoute::resource('{$moduleKebab}s', \\App\\CouponApp\\Modules\\{$modulePlural}\\Web\\Controllers\\{$module}Controller::class);";
        $this->files->append($webRoutesPath, $routeDefinition);
        $this->info("Added web route: {$routeDefinition}");
    }

    protected function addApiRoutes($moduleKebab, $modulePlural, $module)
    {
        $apiRoutesPath = base_path('routes/api.php');
        $routeDefinition = "\nRoute::apiResource('{$moduleKebab}s', \\App\\CouponApp\\Modules\\{$modulePlural}\\Api\\Controllers\\{$module}Controller::class);";
        $this->files->append($apiRoutesPath, $routeDefinition);
        $this->info("Added API route: {$routeDefinition}");
    }

    public function createDefaultDirs(string $basePath): void
    {
        if (!$this->files->exists($basePath)) {
            $this->files->makeDirectory($basePath, 0755, true);
        }
        $folders = [
            'Models',
            'Repositories',
            'Services',
            'Requests',
            'Controllers',
        ];
        foreach ($folders as $folder) {
            $folderPath = "{$basePath}/{$folder}";
            if (!$this->files->exists($folderPath)) {
                $this->files->makeDirectory($folderPath, 0755, true);
            }
        }
    }

    protected function getUserTableNames()
    {
        $allTables = DB::connection()->getDoctrineSchemaManager()->listTableNames();

        $laravelTables = [
            'migrations',
            'password_resets',
            'personal_access_tokens',
            'failed_jobs',
        ];
        return array_filter($allTables, function ($table) use ($laravelTables) {
            return !in_array($table, $laravelTables);
        });
    }
}
