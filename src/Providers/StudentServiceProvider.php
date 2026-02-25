<?php

namespace Student\Providers;

use Illuminate\Support\ServiceProvider;
use Student\Domain\Models\Student;

class StudentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register model bindings
        $this->app->bind(Student::class, function ($app) {
            return new Student();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../Database/migrations');

        // Publish migrations
        $this->publishes([
            __DIR__ . '/../Database/migrations' => database_path('migrations'),
        ], 'student-migrations');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'student');

        // Publish views
        $this->publishes([
            __DIR__ . '/../Resources/views' => resource_path('views/vendor/student'),
        ], 'student-views');

        // Load translations
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'student');

        // Publish config
        $this->publishes([
            __DIR__ . '/../Config/student.php' => config_path('student.php'),
        ], 'student-config');

        // Merge config
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/student.php',
            'student'
        );
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [
            Student::class,
        ];
    }
}
