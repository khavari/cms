<?php

namespace App\Console\Commands;

use App\Widget;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use App\User;

class SetupWidgets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:widgets';

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
        $locales = collect(config('locales'))->where('approve', 1)->pluck('key')->toArray();
        $widgets = collect(config('widgets'))->where('approve', 1);

        foreach ($locales as $locale) {
            foreach ($widgets as $index => $widget) {
                Widget::firstOrCreate(
                    [
                        'name' => $widget['name'],
                        'lang' => $locale,
                    ],
                    [
                        'name'   => $widget['name'],
                        'group'  => $widget['group'],
                        'path'    => $widget['path'],
                        'order'  => $index + 1,
                        'lang'   => $locale,
                        'active' => $widget['active'],
                    ]);
            }
        }

        $this->info('Widgets recreated successfully.');

    }
}
