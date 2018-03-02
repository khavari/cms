<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:users';

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
        $question = 'Do you want to create a lot of test user with `user` permission now?';
        if ($this->confirm($question)) {
            if(User::all()->count() > 2){
                $this->info('Users already exist.');
            }else{
                Artisan::call('db:seed', ['--class' => 'UsersTableSeeder']);
                $this->info(Artisan::output());
                $this->info('Test users created successfully.');
            }
        }
    }
}