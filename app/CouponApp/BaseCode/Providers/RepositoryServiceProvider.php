<?php

namespace App\CouponApp\BaseCode\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class RepositoryServiceProvider extends ServiceProvider {

    public function register()
    {
        // Automatically bind repositories
        $this->bindRepositories();
    }

    public function boot()
    {
        //
    }

    protected function bindRepositories()
    {
        $basePath = app_path('CouponApp/Modules');
        $modules = File::directories($basePath);

        foreach ($modules as $modulePath) {
            $this->bindModuleRepositories($modulePath);
        }
    }

    protected function bindModuleRepositories($modulePath)
    {
        $webPath = "{$modulePath}/Web/Repositories";
        $apiPath = "{$modulePath}/Api/Repositories";

        if (File::exists($webPath)) {
            $this->bindRepositoriesInPath($webPath);
        }

        if (File::exists($apiPath)) {
            $this->bindRepositoriesInPath($apiPath);
        }
    }

    protected function bindRepositoriesInPath($path)
    {
        $files = File::allFiles($path);

        foreach ($files as $file) {
            $repositoryClass = str_replace(
                [base_path() . '/', '/', '.php'],
                ['', '\\', ''],
                $file->getRealPath()
            );

            if (preg_match('/(.*)Repository\.php$/', $file->getFilename(), $matches)) {
                $model = $matches[1];
                $interface = "{$repositoryClass}Interface";
                if (interface_exists($interface) && class_exists($repositoryClass)) {
                    $this->app->bind($interface, $repositoryClass);
                }
            }
        }
    }
}