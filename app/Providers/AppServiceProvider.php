<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Handle file upload errors gracefully
        \Illuminate\Support\Facades\Event::listen(
            \Illuminate\Foundation\Events\ExceptionReported::class,
            function ($event) {
                if ($event->exception instanceof \League\Flysystem\UnableToRetrieveMetadata) {
                    // Log the error but don't crash the application
                    \Illuminate\Support\Facades\Log::warning('File metadata retrieval failed: ' . $event->exception->getMessage());
                }
            }
        );

        // Clean up temporary files periodically
        if (app()->environment('local')) {
            $tempPath = storage_path('app/livewire-tmp');
            if (is_dir($tempPath)) {
                $files = glob($tempPath . '/*');
                $now = time();
                foreach ($files as $file) {
                    if (is_file($file) && ($now - filemtime($file)) > 3600) { // 1 hour old
                        @unlink($file);
                    }
                }
            }
        }
    }
}
