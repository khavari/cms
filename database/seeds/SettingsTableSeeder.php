<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales = collect(config('locales'))->where('approve',1)->pluck('key')->toArray();

        $settings = collect(config('setting'));

        foreach ($locales as $locale) {
            foreach ($settings as $key => $value) {
                Setting::firstOrCreate(
                    [
                        'key' => $key,
                        'lang' => $locale
                    ],
                    [
                        'key' => $key,
                        'value' => $value['value'],
                        'type' => $value['type'],
                        'group' => $value['group'],
                        'lang' => $locale
                    ]);

            }
        }

    }
}
