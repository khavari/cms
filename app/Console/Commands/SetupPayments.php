<?php

namespace App\Console\Commands;

use App\Payment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupPayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:payments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a lot of test payments now';

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
        if (Payment::all()->count() > 0) {
            $this->info('Payments already exist.');
        } else {
            Artisan::call('db:seed', ['--class' => 'PaymentsTableSeeder']);
            $this->info(Artisan::output());
            $this->info('Test payments created successfully.');
        }
    }
}
