<?php

namespace App\Console\Commands;

use App\Setting;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class SetupSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:settings';

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
        if (Schema::hasTable('settings')) {

            Artisan::call('db:seed', ['--class' => 'SettingsTableSeeder']);
            $this->info(Artisan::output());
            $this->info('Settings rows recreated successfully.');
        } else {
            $this->warn("Settings table doesn't exist.");
            $this->warn("Please run setup:panel or migrate database.");
        }
        
    }
}
