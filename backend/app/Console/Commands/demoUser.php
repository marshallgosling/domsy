<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;
use App\Constants\CompanyConstant;
use App\Constants\RoleConstant;
use Carbon\Carbon;

class demoUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:user {username?}';

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
        $username = $this->argument('username') ?? 'nathangao';

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
            'password' => Hash::make('password'),
            'emoji' => '',
            'email_verify_token' => 'dGVzdEBleGFtcGxlLmNvbQ==',
            'email_verified_at' => Carbon::now(),
        ]);
    }


}
