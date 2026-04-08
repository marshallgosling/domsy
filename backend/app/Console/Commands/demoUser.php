<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;
use App\Constants\CompanyConstant;
use App\Constants\RoleConstant;
use App\Models\MenuItem;
use Carbon\Carbon;
use Illuminate\Support\Str;

class demoUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:user {username?} {password?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send registration email to the specified email address';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
    
        $username = $this->argument('username') ?? 'nathangao@centlt.com';
        $password = $this->argument('password') ?? Str::random(10);

        $this->info("Creating demo user: {$username}");

        // \App\Models\User::factory()->create([
        //     'name' => $username,
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('password'),
        // ]);

        User::create([
            'code' => 100000,
            'company_id' => CompanyConstant::INDEPENDENT_COMPANY_ID,
            'role_id' => RoleConstant::DEFAULT_ROLE_ID,
            'name' => $username,
            'email' => 'admin@example.com',
            'password' => Hash::make($password),
            'emoji' => '',
            'email_verify_token' => 'dGVzdEBleGFtcGxlLmNvbQ==',
            'email_verified_at' => Carbon::now(),
        ]);

        $this->info("Password for {$username}: {$password}");
    }


}
