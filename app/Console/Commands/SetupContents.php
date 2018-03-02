<?php

namespace App\Console\Commands;

use App\Content;
use ContentsTableSeeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class SetupContents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:contents';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import sample data to vocabularies , categories and contents table from contents.sql';

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
        if (Schema::hasTable('contents')) {

            if (Content::all()->count()) {
                $this->warn("Contents table doesn't empty.");
                $this->warn("Please remove contents records manually, and setup:contents again.");
            } else {
                Artisan::call('db:seed', ['--class' => 'ContentsTableSeeder']);
                $this->info(Artisan::output());
                $this->info('Contents created successfully.');
            }
        } else {
            $this->warn("Contents table doesn't exist.");
            $this->warn("Please run setup:panel or migrate database.");
        }
    }
}
