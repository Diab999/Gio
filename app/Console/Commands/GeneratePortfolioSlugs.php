<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GeneratePortfolioSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-portfolio-slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate slugs for existing portfolios and add slug column if needed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking portfolio table structure...');

        // Check if slug column exists
        if (!Schema::hasColumn('portfolios', 'slug')) {
            $this->info('Adding slug column to portfolios table...');
            Schema::table('portfolios', function ($table) {
                $table->string('slug')->nullable()->after('id');
            });
            $this->info('Slug column added successfully!');
        } else {
            $this->info('Slug column already exists.');
        }

        // Generate slugs for existing portfolios
        $portfolios = Portfolio::whereNull('slug')->orWhere('slug', '')->get();
        $this->info("Found {$portfolios->count()} portfolios without slugs");

        foreach ($portfolios as $portfolio) {
            $name = $portfolio->getTranslation('name', 'en') ?: $portfolio->getTranslation('name', 'ar') ?: 'portfolio-' . $portfolio->id;
            $slug = Str::slug($name);
            
            // Ensure uniqueness
            $counter = 1;
            $originalSlug = $slug;
            while (Portfolio::where('slug', $slug)->where('id', '!=', $portfolio->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            
            $portfolio->update(['slug' => $slug]);
            $this->line("Generated slug '{$slug}' for portfolio: {$name}");
        }

        // Make slug column unique and not nullable
        if (Schema::hasColumn('portfolios', 'slug')) {
            $this->info('Making slug column unique and not nullable...');
            try {
                Schema::table('portfolios', function ($table) {
                    $table->string('slug')->unique()->nullable(false)->change();
                });
                $this->info('Slug column updated successfully!');
            } catch (\Exception $e) {
                $this->warn('Could not make slug column unique: ' . $e->getMessage());
            }
        }

        $this->info('Portfolio slug generation completed successfully!');
    }
}
