<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin user for the dashboard';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Check if admin user already exists
        $existingUser = User::where('email', 'admin@example.com')->first();
        
        if ($existingUser) {
            // Update existing user to be admin
            $existingUser->update(['is_admin' => true]);
            $this->info('Existing user updated to admin successfully!');
            $this->info('Email: ' . $existingUser->email);
            $this->info('Admin access: Granted');
        } else {
            // Create new admin user
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
            ]);
            
            $this->info('Admin user created successfully!');
            $this->info('Email: admin@example.com');
            $this->info('Password: admin123');
            $this->info('Admin access: Granted');
        }
    }
}
