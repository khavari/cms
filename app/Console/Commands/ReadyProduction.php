<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ReadyProduction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ready:production';

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
        $this->info('========================================');
        Artisan::call('package:discover');
        $this->info(Artisan::output());

        $this->info('========================================');
        Artisan::call('cache:clear');
        $this->info(Artisan::output());

        $this->info('========================================');
        Artisan::call('view:clear');
        $this->info(Artisan::output());

        $this->info('========================================');
        Artisan::call('config:clear');
        $this->info(Artisan::output());

        $this->info('========================================');
        Artisan::call('clear-compiled');
        $this->info(Artisan::output());


    }
}
