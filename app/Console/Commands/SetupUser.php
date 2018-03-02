<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use App\User;
use Illuminate\Support\Facades\Schema;
use UserTableSeeder;

class SetupUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (Schema::hasTable('users')) {
            if (User::all()->count()) {
                $this->warn("Users table doesn't empty.");
                $this->warn("Please remove users, roles and permissions records manually, and setup:user again.");
            } else {
                Artisan::call('db:seed', ['--class' => 'UserTableSeeder']);
                $this->info(Artisan::output());
                $this->info('Permissions, roles and users created successfully.');
                $this->info("\n".'role : admin');
                $this->info('username : admin@asrenet.net');
                $this->info('password: 459963');
            }
        } else {
            $this->warn("Users table doesn't exist.");
            $this->warn("Please run setup:panel or migrate database.");
        }
    }
}
