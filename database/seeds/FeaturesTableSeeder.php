<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Feature;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $locales = collect(config('locales'))->where('approve',1)->pluck('key')->toArray();

        $features = collect(config('features'));

        foreach ($locales as $locale) {
            foreach ($features as $key => $value) {
                Feature::firstOrCreate(
                    [
                        'slug' => $value['slug'],
                        'lang' => $locale
                    ],
                    [
                        'slug' => $value['slug'],
                        'dimension' => $value['dimension'],
                        'lang' => $locale
                    ]);

            }
        }

    }
}
