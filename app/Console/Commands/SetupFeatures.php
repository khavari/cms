<?php

namespace App\Console\Commands;

use App\Feature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class SetupFeatures extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:features';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import sample data to features and links table from features.sql';

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
        if (Schema::hasTable('features')) {
            Artisan::call('db:seed', ['--class' => 'FeaturesTableSeeder']);
            $this->info(Artisan::output());
            $this->info('Features rows recreated successfully.');
        } else {
            $this->warn("Features table doesn't exist.");
            $this->warn("Please run setup:panel or migrate database.");
        }
    }
}
