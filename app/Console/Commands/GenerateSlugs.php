<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Project;
use App\Models\TeamMember;
use Illuminate\Support\Str;

class GenerateSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate slugs for existing projects and team members';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating slugs for existing records...');

        // Generate slugs for projects
        $projects = Project::whereNull('slug')->orWhere('slug', '')->get();
        $this->info("Found {$projects->count()} projects without slugs");

        foreach ($projects as $project) {
            $name = $project->getTranslation('name', 'en') ?: $project->getTranslation('name', 'ar') ?: 'project-' . $project->id;
            $slug = Str::slug($name);
            
            // Ensure uniqueness
            $counter = 1;
            $originalSlug = $slug;
            while (Project::where('slug', $slug)->where('id', '!=', $project->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            
            $project->update(['slug' => $slug]);
            $this->line("Generated slug '{$slug}' for project: {$name}");
        }

        // Generate slugs for team members
        $teamMembers = TeamMember::whereNull('slug')->orWhere('slug', '')->get();
        $this->info("Found {$teamMembers->count()} team members without slugs");

        foreach ($teamMembers as $member) {
            $name = $member->getTranslation('name', 'en') ?: $member->getTranslation('name', 'ar') ?: 'member-' . $member->id;
            $slug = Str::slug($name);
            
            // Ensure uniqueness
            $counter = 1;
            $originalSlug = $slug;
            while (TeamMember::where('slug', $slug)->where('id', '!=', $member->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            
            $member->update(['slug' => $slug]);
            $this->line("Generated slug '{$slug}' for team member: {$name}");
        }

        $this->info('Slug generation completed successfully!');
    }
}
