<?php

namespace App\Console\Commands;

use App\Province;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupProvinces extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:provinces';

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
        if(Province::all()->count()){
            $this->info('Provinces already exist.');
        }else {
            Artisan::call('db:seed', ['--class' => 'ProvincesTableSeeder']);
            $this->info(Artisan::output());
            $this->info('Provinces created successfully.');
        }
    }
}
